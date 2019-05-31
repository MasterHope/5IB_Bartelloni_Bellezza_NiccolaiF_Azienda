<!DOCTYPE html>
<?php
require_once 'session.php';
require_once 'bean/Prodotto.php';
require_once 'Dao/ProdottiDao.php';
require_once 'Dao/UtentiDao.php';
require_once 'isResponsabileMagazzino.php';
$prodottiDao = new ProdottiDao();
$prodotti = $prodottiDao->findAll();
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Modifica quantita' dei prodotti</title>
		<?php include_once 'head.php'; ?>
	</head>
	<body>
	    <?php include_once 'header.php'; ?>
		<div class="container" style="margin-top: 150px">
				<div class="row">
					<div class="col-md-4"><h4><b>Codice Prodotto</b></h4></div>
					<div class="col-md-4"><h4><b>Prezzo</b></h4></div>
					<div class="col-md-4"><h4><b>Quantità</b></h4></div>
				</div>
		    <?php foreach ($prodotti as $prodotto) { ?>
				<div class="row">
					<div class="col-md-4"><a href="CambioQuantitaProdotto.php?prodotto=<?php echo $prodotto->getCodice_prodotto() ?>"> <?php echo $prodotto->getCodice_prodotto() ?></a></div>
					<div class="col-md-4"><?php echo $prodotto->getPrezzo() ?></div>
					<div class="col-md-4"><?php echo $prodotto->getQuantita() ?></div>
				</div>

				<?php
			}
			?>
		</div>
		<?php include_once 'footer.php'; ?>
	</body>
</html>
