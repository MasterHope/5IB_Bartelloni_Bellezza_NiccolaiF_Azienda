<?php
//Questo file viene utilizzato per verificare se una determinata persona è un cliente o meno.
require_once"Dao/UtentiDao.php";
if(!isset($_SESSION)){
    session_start();
}
$utentiDao=new UtentiDao();
$utente=$_SESSION['utente'];
$ruolo=$utentiDao->getRuolo(md5($utente));
if($ruolo=="responsabile-magazzino"){
    $ok=true;
} else {
    $ok=false;
}
?>
<!DOCTYPE html>
<html>
    <head><?php include_once'head.php'?></head>
    <body>
        <?php include_once'header.php'?>
            <?php if(!$ok){?>
        <div style="z-index: 1000;">
        <div class="alert-danger"><h6 style="text-align: center;font-family: inherit">
                L'utente loggato non è un responsabile del magazzino! Impossibile accedere a quest'area!</h6></div>
        </div>
            <?php die;} ?>
        </div>
    </body>
</html>