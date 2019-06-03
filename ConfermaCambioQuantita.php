<?php
include_once "session.php";
require_once 'Dao/UtentiDao.php';
require_once 'Dao/ProdottiDao.php';
require_once 'bean/Prodotto.php';
require_once 'isResponsabileMagazzino.php';


if (!isset($_REQUEST['quantita']) || !isset($_REQUEST['codice'])) {
	//ERRORE
}

$codice_prodotto = filter_input(INPUT_GET,"codice",FILTER_SANITIZE_STRING);
$quantita = filter_input(INPUT_POST,"quantita",FILTER_SANITIZE_NUMBER_INT);
$dao = new ProdottiDao();
if ($dao->aggiungiQuantita($codice_prodotto, $quantita)) {
    ?><center><div style="margin-top:150px">Quantita aggiornata</div></center><?php
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Conferma Cambio Quantità</title>
	</head>
	<body>
	</body>
</html>
