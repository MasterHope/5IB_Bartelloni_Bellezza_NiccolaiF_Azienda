<?php
require_once'session.php';
require_once'Dao/AcquistiDao.php';
require_once'Dao/UtentiDao.php';
require_once'bean/Acquisto.php';
if (!isset($_SESSION)) {
    session_start();
}
$utente = $_SESSION['utente'];
$codice_prodotto = md5($utente);
$utentiDao = new UtentiDao();
$acquistiDao = new AcquistiDao();
$ruolo = $utentiDao->getRuolo($codice_prodotto);
$ruoli = array("cliente" => 1, "marketing" => 2, "responsabile-clienti" => 3, "responsabile-spedizioni" => 4, "responsabile-magazzino" => 5);
$idruolo = $ruoli["$ruolo"];
$daoAcquisti=new AcquistiDao();
$acquisti=$daoAcquisti->findAll();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bartelloni-Bellezza-Niccolai Azienda</title>
        <?php include_once 'head.php'; ?>
    </head>
    <body>
        <div class="super_container">
            <?php include_once 'header.php'; ?>
        </div>
        <?php if ($idruolo == 4) {
            
        } else {
            ?> 
            <div style="z-index: 1000;">
                <div class="alert-danger"><h6 style="text-align: center;font-family: inherit">Operazione non permessa!</h6></div>
            </div>
<?php } ?>  
            <?php include_once 'footer.php'; ?>
    </body>
</html>
