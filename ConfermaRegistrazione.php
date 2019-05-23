<html>
    <head>
	    <?php include_once 'head.php' ?>
	<title>ConfermaRegistrazione</title>
    </head>
    <body>
	    <?php
	    require_once 'Dao/UtentiDao.php';
            require_once'header.php';
	    $user = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
	    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
	    $ruolo = filter_input(INPUT_POST, "ruolo", FILTER_SANITIZE_STRING);
	    $ruoli = array("cliente" => 1, "marketing" => 2, "responsabile-clienti" => 3, "responsabile-spedizioni" => 4, "responsabile-magazzino" => 5);
	    $utenti = new UtentiDao();
	    if ($utenti->insert($user, $password, $ruoli[$ruolo])) {
		    ?><center><h1 style="margin-top: 150px">Registrazione avvenuta con successo!</h1></center><?php
	    }else{
		    echo "Errore".$user." ".$password." ";
	    }
	?>
	    <?php include_once 'footer.php' ?>
    </body>

</html>
