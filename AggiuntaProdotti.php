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
$prodotti = new ProdottiDao();
$listaProdotti = $prodotti->findAll();
?>
<html>
    <head>
	<?php include_once 'head.php'; ?>
        <meta charset="UTF-8">
        <title>Aggiungi Prodotti</title>
    </head>
    <body>
	<?php include_once 'header.php'; ?>
	
	<?php include_once 'footer.php'; ?>
    </body>
</html>
