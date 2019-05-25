<?php
require_once'Dao/AcquistiDao.php';
require_once'Dao/ProdottiDao.php';
require_once'bean/Prodotto.php';
require_once'bean/Acquisto.php';
require_once'Dao/UtentiDao.php';
$ok=1;
if (isset($_POST['quantita']) && isset($_GET['codice'])) {
    $quantita = $_POST['quantita'];
    $codice_prodotto = $_GET['codice'];
    $daoAcquisti = new AcquistiDao();
    session_start();
    $utente = $_SESSION['utente'];
    $codice_utente = md5($utente);
    $daoUtenti = new UtentiDao();
    $codice_cliente = $daoUtenti->getCliente($codice_utente);
    $daoProdotti = new ProdottiDao();
    $prodotto = $daoProdotti->getProdotto($codice_prodotto);
    $prezzo=$prodotto->getPrezzo();
    $importo=$prodotto->getPrezzo()*$quantita;
    if ($codice_cliente != null) {
        $data_ordine=date("Y-m-d");
        $data_spedizione= strtotime ( '+1 week' , strtotime ( $data_ordine ) ) ;
        $data_spedizionedef=date("Y-m-d", $data_spedizione);
        $ordine = new Acquisto($data_ordine, $data_spedizionedef, $quantita, $codice_prodotto, $codice_utente, $importo);
        $ok=$daoAcquisti->aggiungiSpedizione($ordine);
    } else {
        $ok=-2;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ordine</title>
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
        <?php
        if($ok==1){
        ?>
        <div style="z-index: 1000;">
        <div class="alert-success"><h6 style="text-align: center;font-family: inherit">Ordine effettuato con successo!</h6></div>
        </div>
        <div class="super_container" style="margin-top: 150px">
            <!-- Product Details -->
            <div class="product_details">
                <div class="container">
                    <div class="row details_row">
                        <!-- Product Content -->
                        <div class="col-lg-6">
                            <div class="details_content">
                                <div class="details_name"><?php print($prodotto->getDenominazione()); ?></div>
                                <div class="details_price"><?php echo"$prezzo" .
                                        " x" . "$quantita" . "<br>Totale="  ."$importo"?></div>
                                
                            <div class="description_text">
                                <?php print($prodotto->getDescrizione()); ?>
                                
<?php echo($ok);?>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        <?php }else{
            if($ok==-2){
                ?><div style="z-index: 1000;">
        <div class="alert-danger"><h6 style="text-align: center;font-family: inherit">Devi essere un cliente per ordinare!</h6></div>
                </div>
            <?php } else { if($ok==-1){?>
        <div style="z-index: 1000;">
            <div class="alert-danger"><h6 style="text-align: center;font-family: inherit">Errore nell'inserimento, riprovare!</h6></div></div>
            <?php }} ?>
        <?php } ?>
        
            
</div>

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

