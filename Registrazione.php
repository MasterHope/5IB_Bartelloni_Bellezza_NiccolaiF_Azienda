<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registrazione Utente</title>
	<?php include_once 'head.php'; ?>
    </head>
    <body>
	    <?php include_once 'header.php'; ?>
<?php include 'ConfermaRegistrazione.php';?>
	<form action="" method="POST">
	    <div class="container">
		<div class="row align-items-center" style="margin-top: 150px">
		    <h1>Registrati</h1>
		</div>
		<div class="row align-items-center" >
		    <div class="col-md-6">
			<h2>Username</h2>
			<input type="text" name="username" value="" required="true" minlength="4" maxlength="40"/>
		    </div>
		    <div class="col-md-6">
			<h2>Password</h2>
                        <input type="password" name="password" value="" required="true" minlength="8" maxlength="40"/>
		    </div>
		</div>
                <div class="row">
                    <div class="col-md-6">
                        <h3>Nome</h3>
                        <input type="text" name="nome" value="" required minlength="4" maxlength="40"/>
                    </div>
                    <div class="col-md-6">
                        <h3>Cognome</h3>
                        <input type="text" name="cognome" value="" required minlength="4" maxlength="40"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h3>Indirizzo</h3>
                        <input type="text" name="indirizzo" value="" required minlength="4" maxlength="40"/>
                    </div>
                    <div class="col-md-6">
                        <h3>Città</h3>
                        <input type="text" name="citta" value="" required minlength="4" maxlength="40"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h3>Cellulare</h3>
                        <input type="text" name="telefono" pattern="\d{10}" 
                               title="Il numero di telefono deve contenere 10 cifre" value="" required/>
                    </div>
                    <div class="col-md-6">
                        <h3>CAP</h3>
                        <input type="text" name="cap" value="" pattern="\d{5}" 
                               title="Il CAP è composto obbligatoriamente da 5 cifre" required/>
                    </div>
                </div>
                

<input type="submit" style="margin-top: 10px" />
	    </div>
	</form>
    </body>
    <?php include_once 'footer.php'; ?>
</html>
