<?php

if(array_key_exists('mod',$_POST)){
    //allora è modalità modifica
    session_start();
    $_SESSION['data'] = $_POST['mod'];
    header("Location: view_universal/modifyPhp.php");

}else{
    //modalità elimina
    session_start();
    $_SESSION['data'] = $_POST['del'];

    $data = json_decode($_SESSION['data'], true);
    //stabilire qui la condizione di eliminazione (WHERE $cond) perchè i dati variano da tabella a tabella
    $cond = "id_tessera = '".$data['row']['id_tessera']."' AND id_regalo = ".$data['row']['id_regalo'];
    $_SESSION['cond'] = $cond;
    $_SESSION['tab'] = $data['tab'];
    $_SESSION['header'] = "../../../index.php";

    ?>
    <div>
        <p> Stai per eliminare un regalo dalla lista dei regali ritirati</p>
        <form action="view_universal/deletePhp.php" method="POST">
            <p>Sei sicuro di voler continuare?</p>
            <input type="submit" name="submit" value="Elimina">
            <input type="submit" name="submit" value="Annulla">
        </form>
    </div>
    <?php
}
?>
