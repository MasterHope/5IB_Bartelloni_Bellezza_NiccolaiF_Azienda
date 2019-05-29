<html>
    <head>
        <?php include_once 'head.php' ?>
        <title>ConfermaRegistrazione</title>
    </head>
    <body>
        <?php
        require_once 'Dao/ClientiDao.php';
        require_once 'bean/Cliente.php';
        require_once 'Dao/UtentiDao.php';
        require_once'header.php';
        if (isset($_REQUEST['username'])) {
            $user = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
            $indirizzo = filter_input(INPUT_POST, "indirizzo", FILTER_SANITIZE_STRING);
            $citta = filter_input(INPUT_POST, "citta", FILTER_SANITIZE_STRING);
            $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING);
            $cognome = filter_input(INPUT_POST, "cognome", FILTER_SANITIZE_STRING);
            $cellulare = filter_input(INPUT_POST, "telefono", FILTER_SANITIZE_STRING);
            $CAP = filter_input(INPUT_POST, "cap", FILTER_SANITIZE_STRING);
            $cliente = new Cliente($cognome, $nome, $indirizzo, $citta, $CAP, $cellulare, md5($user));
            $clientiDao = new ClientiDao();
            $ok = $clientiDao->insert($cliente, $user, $password);
            if ($ok == 1) {
                ?><center><h1 style="margin-top: 150px">Registrazione Avvenuta Con Successo!!</h1></center><?php
            } else {
                if ($ok == -1) {
                    ?>
                <div style="z-index: 1000">
                    <div class="alert-danger" style="margin-top:0px;text-align: center;">Errore nella registrazione! Utente già esistente!</div>
                </div>
            <?php
            }
        }
    }
    ?>
<?php include_once 'footer.php' ?>
</body>

</html>
