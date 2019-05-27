<!DOCTYPE html>
<?php
include_once "session.php";
require_once 'Dao/UtentiDao.php';
require_once 'Dao/ProdottiDao.php';
require_once 'bean/Prodotto.php';

$dao = new UtentiDao();
$ruolo = $dao->getRuolo(md5($_SESSION['utente']));
if (!$ruolo == "responsabile-marketing") {
	header("Location:index.php");
	die;
}

$denominazione = $_REQUEST["denominazione"];
$prezzo = $_REQUEST["prezzo"];
$quantita = $_REQUEST["quantita"];
$descrizione = $_REQUEST["descrizione"];
$codice_prodotto = md5($denominazione . $prezzo . $quantita . $denominazione);
$prodotto = new Prodotto($codice_prodotto, $denominazione, $descrizione, $prezzo, $quantita);
$dao = new ProdottiDao();
if ($dao->inserisciProdotto($prodotto)) {
	?><h1 style="margin-top: 150px">Prodotto Aggiunto Correttamente</h1><?php
} else {
	?><h1 style="margin-top: 150px">Errore nell'aggiunta del prodotto</h1><?php
}
?>
<html>
    <head>
	<?php include_once 'head.php'; ?>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
	<?php include_once 'header.php'; ?>
	<?php
	?>
	<?php include_once 'footer.php'; ?>
    </body>
</html>
