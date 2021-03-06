<?php
include_once "session.php";
include_once "ConfermaAggiuntaOrdine.php";
require_once 'Dao/UtentiDao.php';
require_once 'Dao/AcquistiDao.php';
require_once 'bean/Acquisto.php';
require_once 'bean/Prodotto.php';
require_once 'bean/Utente.php';
require_once 'Dao/ProdottiDao.php';
if(!isset($_SESSION)){
    session_start();
}
$dao = new UtentiDao();
$ruolo = $dao->getRuolo(md5($_SESSION['utente']));
$dao = new ProdottiDao();
$prodotti = $dao->findAll();
$dao=new UtentiDao();
$clienti=$dao->findAll();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Aggiungi un Ordine</title>
		<?php include_once 'head.php'; ?>
	</head>
	<body>
            <?php include_once 'header.php' ?>
		<div class="container" style="margin-top: 150px">
			<h1>Aggiunta Ordine</h1><br><br>
			<form action="" method="POST">
				<div class="row">
					<div class="col-md-6">
						<h3>Data Ordine</h3>
						<input type="date" name="data-ordine" value="<?php echo date("Y-m-d"); ?>">
					</div>

					<div class="col-md-6">
						<h3>Quantità</h3>
						<input type="number" name="quantita">
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h3>Prodotto</h3>
						<select name="prodotto">
						    <?php foreach ($prodotti as $prodotto) { ?>
								<option value="<?php echo $prodotto->getCodice_prodotto(); ?>">
                                                                    <?php echo $prodotto->getDenominazione(); ?></option>
							<?php } ?>
						</select>

					</div>

					<div class="col-md-6">
						<h3>Cliente</h3>
						<select name="cliente">
						    <?php foreach ($clienti as $cliente) { ?>
							<option value="<?php echo $cliente->getCodice_utente(); ?>">
                                                        <?php echo $cliente->getUsername(); ?></option>
							<?php } ?>
						</select>

					</div>
				</div>
				<br>
				<div class="row">
					<input type="submit" value="Aggiungi">
				</div>

			</form>
		</div>



		<?php include_once 'footer.php'; ?>
	</body>
</html>
