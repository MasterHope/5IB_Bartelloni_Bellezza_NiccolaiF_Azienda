<?php
include_once "session.php";
require_once 'Dao/UtentiDao.php';
require_once 'Dao/ProdottiDao.php';
require_once 'bean/Prodotto.php';

$dao = new UtentiDao();
$ruolo = $dao->getRuolo(md5($_SESSION['utente']));
//DA CAMBIARE
if (!$ruolo == "responsabile-magazzino") {
	header("Location:index.php");
	die;
}

if (!isset($_REQUEST['quantita']) || !isset($_REQUEST['codice'])) {
	//ERRORE
}

$codice_prodotto = filter_input(INPUT_POST,"codice",FILTER_SANITIZE_STRING);
$quantita = filter_input(INPUT_POST,"quantita",FILTER_SANITIZE_NUMBER_INT);
$dao = new ProdottiDao();
if ($dao->aggiornaQuantita($codice_prodotto, $quantita)) {
	?><div style="margin-top:150px">Quantita aggiornata</div><?php
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
<?php ?>
	</body>
</html>
