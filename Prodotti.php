<?php
require_once 'session.php';
require_once 'bean/Prodotto.php';
require_once 'Dao/ProdottiDao.php';
require_once 'Dao/UtentiDao.php';
$dao = new UtentiDao();
$ruolo = $dao->getRuolo(md5($_SESSION['utente']));
$prodottiDao = new ProdottiDao();
$prodotti = $prodottiDao->findAll();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bartelloni-Bellezza-Niccolai Azienda</title>
        <?php include_once 'head.php'; ?>
    </head>
    <body>
    <center>
        <div class="container" style="margin-top: 150px;">
            <?php include_once 'header.php'; ?>
            <!-- Products -->




            <?php
            foreach ($prodotti as $prodotto) {
                $prod = $prodotto->getCodice_prodotto();
                ?>
                <!-- Product -->
                <div class="row" style='font-size: 12pt'>
                    <div class="col-md-6">
                        <?php ?>
                        <a href="Prodotto.php?prodotto=<?php print($prod); ?>">
                            <?php print($prodotto->getDenominazione()); ?></a></div>
                    <div class="col-md-6"><?php print($prodotto->getPrezzo() . '€'); ?></div>
                </div>
            <?php } ?>

        </div>

    </center>

    <?php
//Controllo il ruolo dell'utente e aggiunta del bottone 
    if ($ruolo == "responsabile-marketing") {
        ?><center><a href="AggiuntaProdotti.php">Aggiungi un prodotto</a></center><?php
    }
    ?>
</div>


<!-- Icon Boxes -->
<div class="icon_boxes">
    <div class="container">
        <div class="row icon_box_row">

            <!-- Icon Box -->
            <div class="col-lg-4 icon_box_col">
                <div class="icon_box">
                    <div class="icon_box_image"><img src="images/icon_1.svg" alt=""></div>
                    <div class="icon_box_title">Spedizione Gratuita in tutto il mondo</div>
                    <div class="icon_box_text">
                        <p>La spedizione e' gratuita. Acquista subito!</p>
                    </div>
                </div>
            </div>

            <!-- Icon Box -->
            <div class="col-lg-4 icon_box_col">
                <div class="icon_box">
                    <div class="icon_box_image"><img src="images/icon_2.svg" alt=""></div>
                    <div class="icon_box_title">Ritorno dei Prodotti gratuito</div>
                    <div class="icon_box_text">
                        <p>I nostri prodotti sono garantiti con 3 anni di garanzia</p>
                    </div>
                </div>
            </div>

            <!-- Icon Box -->
            <div class="col-lg-4 icon_box_col">
                <div class="icon_box">
                    <div class="icon_box_image"><img src="images/icon_3.svg" alt=""></div>
                    <div class="icon_box_title">24 ore di supporto al giorno</div>
                    <div class="icon_box_text">
                        <p>Supporto sempre attivo, chiamaci se hai problemi</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include_once 'footer.php'; ?>
</body>
</html>