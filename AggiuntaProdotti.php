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
	<div class="container  col-10 justify-content-center" style="margin-top: 150px">
	    <form action="ConfermaAggiuntaProdotto.php">
		<div class="row">
		    <div class="col-md-4">
			<h3>Denominazione</h3>
			<input name="denominazione" type="text">
		    </div>
		    <div class="col-md-4">
			<h3>Prezzo</h3>
			<input name="prezzo" type="number">
		    </div>
		    <div class="col-md-4">
			<h3>Quantita</h3>
			<input name="quantita" type="number">
		    </div>
		</div>
		<div class="row" style="margin-top: 10px">
		    <center>
			<div class="col-md-12">
			    <textarea style="col-md-12" name="descrizione"></textarea>
		    </div>
		    </center>
		</div>
		<div class="row" style="margin-top: 10px">
		    <div class="col-md-6"><input type="submit"></div>
		</div>


	    </form>
	</div>

	<?php include_once 'footer.php'; ?>
    </body>
</html>