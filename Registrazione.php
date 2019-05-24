<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registrazione Utente</title>
	<?php include_once 'head.php'; ?>
    </head>
    <body>
	    <?php include_once 'header.php'; ?>

	<form action="ConfermaRegistrazione.php" method="POST">
	    <div class="container">
		<div class="row align-items-center" style="margin-top: 150px">
		    <h1>Registrati</h1>
		</div>
		<div class="row align-items-center" >
		    <div class="col-md-6">
			<h2>Username</h2>
			<input type="text" name="username" value="" required="true"/>
		    </div>
		    <div class="col-md-6">
			<h2>Password</h2>
			<input type="password" name="password" value="" required="true"/>
		    </div>
		</div>
<!--		<div class="row align-items-center" style="margin-top: 20px;margin-bottom: 10px">
		    <h2>Ruoli</h2><br>
		</div>-->
<!--		<div class="row align-items-center" style="margin-top: 20px;margin-bottom: 10px">
		    <div class="col-md-2">
			<input type="radio" name="ruolo" value="cliente" checked="checked" />
			Cliente
		    </div>
		    <div class="col-md-2">
			<input type="radio" name="ruolo" value="marketing"  />
			Responsabile Marketing
		    </div>
		    <div class="col-md-2">
			<input type="radio" name="ruolo" value="responsabile-clienti"  />
			Responsabile Clienti
		    </div>
		    <div class="col-md-2">
			Responsabile Spedizioni
			<input type="radio" name="ruolo" value="responsabile-spedizioni"  />
		    </div>
		    <div class="col-md-2">
			Responsabile del Magazzino
			<input type="radio" name="ruolo" value="responsabile-magazzino"  />
		    </div>
		</div>-->

<input type="submit" style="margin-top: 10px" />
	    </div>
	</form>
    </body>
    <?php include_once 'footer.php'; ?>
</html>
