<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ConfermaLogin</title>
    </head>
    <body>
	    <?php

	    require_once 'Dao/UtentiDao.php';
	    $user = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
	    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
	    $utenti=new UtentiDao();
	    echo $utenti->checkLogin($user,$password);

	    


	    ?>
    </body>
</html>
