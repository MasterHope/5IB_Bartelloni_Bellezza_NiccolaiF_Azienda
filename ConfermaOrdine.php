<?php
require_once'Dao/AcquistiDao.php';
require_once'Dao/ProdottiDao.php';
require_once'bean/Prodotto.php';
require_once'bean/Acquisto.php';
require_once'Dao/UtentiDao.php';
if (isset($_POST['quantita']) && isset($_GET['codice'])) {
    $quantita = $_POST['quantita'];
    $codice = $_GET['codice'];
    $daoAcquisti = new AcquistiDao();
    session_start();
    $utente = $_SESSION['utente'];
    $codice_utente = md5($utente);
    $daoUtenti = new UtentiDao();
    $codice_cliente = $daoUtenti->getCliente($codice_utente);
    if ($codice_cliente != null) {
        $ordine = new Acquisto(date("Y-m-d"), null, $quantita, $codice, $codice_cliente, $importo);
        $daoAcquisti->aggiungiSpedizione($ordine);
    }
    //Cliente non esiste!!!
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo"$sas";
        ?>
    </body>
</html>
