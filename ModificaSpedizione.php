<?php
require_once"Dao/AcquistiDao.php";
require_once"isResponsabileSpedizione.php";

if(isset($_POST['codice']) && isset($_POST['data_spedizione'])){
    $codice_prodotto=$_POST['codice'];
    $data_spedizione=$_POST['data_spedizione'];
    $acquistiDao=new AcquistiDao();
    $ok=$acquistiDao->modificaSpedizione($codice_prodotto, $data_spedizione);
} else {
    $ok=-2;
    //-2=utente non ha ancora settato il codice e la data di spedizione!
}
?>
<!DOCTYPE html>
<html>
    <body>
        <?php
        if($ok==1){?>
        <div style="z-index: 1000;">
        <div class="alert-success"><h6 style="text-align: center;font-family: inherit">Modifica effettuata con successo!</h6></div>
        </div>
        <?php } ?>
            <?php if($ok==-1){?>
        <div style="z-index: 1000;">
        <div class="alert-danger"><h6 style="text-align: center;font-family: inherit">Errore nella modifica!</h6></div>
        </div>
            <?php }if($ok==0){?>
                <div style="z-index: 1000;">
        <div class="alert-warning"><h6 style="text-align: center;font-family: inherit">
                La data della spedizione è uguale a quella precedente! Inserirne una diversa!</h6></div>
            <?php } ?>
        </div>
    </body>
</html>
