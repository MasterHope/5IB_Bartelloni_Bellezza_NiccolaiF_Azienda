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

$codice = $_REQUEST['codice'];
$quantita = $_REQUEST['quantita'];
$dao = new ProdottiDao();
if ($dao->aggiornaQuantita($codice, $quantita)) {
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
