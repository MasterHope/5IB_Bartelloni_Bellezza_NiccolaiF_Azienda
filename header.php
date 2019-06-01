<?php
require_once 'Dao/UtentiDao.php';
require_once 'Dao/ProdottiDao.php';
require_once 'bean/Prodotto.php';

if(!isset($_SESSION)){
        session_start();
}
if(isset($_SESSION['utente'])){
	$dao = new UtentiDao();
	$ruolo = $dao->getRuolo(md5($_SESSION['utente']));
}
?>
<!-- Header -->

<header class="header">
	<div class="header_container">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_content d-flex flex-row align-items-center justify-content-start">
						<div class="logo"><a href="index.php">Azienda Commercio</a></div>
						<nav class="main_nav">
							<ul>
								<li>   <a href="index.php">Home</a></li>
								<li><a href="Prodotti.php">Prodotti</a></li>
<?php
if(isset($_SESSION['utente'])){
	if ($ruolo == "responsabile-marketing") {
		?><li><a href="AggiuntaProdotti.php">Aggiungi Prodotti</a></li>	<?php

	}
	if ($ruolo == "responsabile-magazzino") {
		?><li><a href="Magazzino.php">Magazzino</a></li>	<?php

	}
	if ($ruolo == "responsabile-spedizioni") {
		?><li><a href="ImpostaSpedizione.php">Modifica spedizione</a></li>	<?php

	}
	if ($ruolo == "responsabile-clienti") {
		?><li><a href="AggiuntaOrdine.php">Aggiungi ordine</a></li>	<?php

	}
}
if (!isset($_SESSION['utente'])) {
?>
<li><a href="Registrazione.php">Registrati</a></li>
<li><a href="Login.php">Login</a></li>
<?php } else {
?>
<li><a href="#"><b><?php print($_SESSION['utente']); ?></b></a></li>
<li><a href="Logout.php"</li>Logout</a></li>
<?php } ?>
							</ul>
						</nav>
						<div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>


	<!-- Social -->
	<div class="header_social">
		<ul>
			<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
			<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
			<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
			<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
		</ul>
	</div>
</header>

<!-- Menu -->

<div class="menu menu_mm trans_300">
	<div class="menu_container menu_mm">
		<div class="page_menu_content">

			<div class="page_menu_search menu_mm">
				<form action="#">
					<input type="search" required="required" class="page_menu_search_input menu_mm" placeholder="Search for products...">
				</form>
			</div>
			<ul class="page_menu_nav menu_mm">
				<li class="page_menu_item has-children menu_mm">
					<a href="index.html">Home</a>
					<a href="Prodotti.php">Prodotti</a>
					<a href="Registrazione.php">Registrati</a>
					<a href="Login.php">Login</a>

				</li>
			</ul>
		</div>
	</div>

	<div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>

	<div class="menu_social">
		<ul>
			<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
			<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
			<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
			<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
		</ul>
	</div>
</div>
