<?php
require_once 'session.php';
require_once 'Dao/ProdottiDao.php';
require_once 'bean/Prodotto.php';
if (isset($_REQUEST['prodotto'])) {
	$codice_prodotto = filter_input(INPUT_GET, "prodotto",FILTER_SANITIZE_STRING);
	$daoProdotti = new ProdottiDao();
	$prodotto = $daoProdotti->getProdotto($codice_prodotto);
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Product</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Sublime project">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
		<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
		<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
		<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
		<link rel="stylesheet" type="text/css" href="styles/product.css">
		<link rel="stylesheet" type="text/css" href="styles/product_responsive.css">
	</head>
	<body>

		<?php include_once 'header.php'; ?>
		<div class="super_container" style="margin-top: 150px">
			<!-- Product Details -->
			<form action="ConfermaCambioQuantita.php?codice=<?php echo $codice_prodotto ?>" method="POST" name="quant">
				<div class="product_details">
					<div class="container">
						<div class="row details_row">
							<!-- Product Content -->
							<div class="col-lg-6">
								<div class="details_content">
									<div class="details_name"><?php print($prodotto->getDenominazione()); ?></div>
									<div class="details_price"><?php print($prodotto->getPrezzo()); ?>€</div>
									<!-- Product Quantity -->
									<div class="product_quantity_container">
										<div class="product_quantity clearfix">
											<span>Qty</span>
											<input id="quantity_input" name="quantita" type="text" value=" <?php echo $prodotto->getQuantita(); ?> ">
											<div class="quantity_buttons">
												<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
												<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
											</div>
										</div>
										<div class="button cart_button" onclick="document.forms['quant'].submit();">
											<p>Modifica</p></div>
									</div>
								</div>
							</div>
						</div>

						<div class="row description_row">
							<div class="col">
								<div class="description_title_container">
									<div class="description_title">Descrizione</div>
								</div>
								<div class="description_text">
								    <?php print($prodotto->getDescrizione()); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>

			<br><br>

			<!-- Footer -->



			<?php include_once 'footer.php'; ?>
			<script src="js/jquery-3.2.1.min.js"></script>
			<script src="styles/bootstrap4/popper.js"></script>
			<script src="styles/bootstrap4/bootstrap.min.js"></script>
			<script src="plugins/greensock/TweenMax.min.js"></script>
			<script src="plugins/greensock/TimelineMax.min.js"></script>
			<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
			<script src="plugins/greensock/animation.gsap.min.js"></script>
			<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
			<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
			<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
			<script src="plugins/easing/easing.js"></script>
			<script src="plugins/parallax-js-master/parallax.min.js"></script>
			<script src="js/product.js"></script>
	</body>
</html>
