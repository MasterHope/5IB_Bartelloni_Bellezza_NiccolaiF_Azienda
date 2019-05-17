<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bartelloni-Bellezza-Niccolai Azienda</title>
        <?php include_once 'head.php'; ?>
        <?php
        require_once 'bean/Prodotto.php';
        require_once 'Dao/prodottiDao.php';
        ?>
    </head>
    <body>
        <div class="super_container">
            <?php include_once 'header.php'; ?>
            <!-- Products -->

            <div class="products">
                <div class="container">
                    <div class="row">
                        <div class="col">

                            <div class="product_grid">
                                <?php
                                $prodottiDao = new ProdottiDao();
                                $prodotti = $prodottiDao->findAll();
                                foreach ($prodotti as $prodotto) {
                                    ?>
                                    <!-- Product -->
                                    <div class="product">
                                        <div class="product_content">
                                            <div class="product_title">
                                                <?php $prod=$prodotto->getCodice_prodotto(); ?>
                                                <a href="product.html?prodotto= <?php print($prod); ?>">
                                                     <?php print($prodotto->getDenominazione()); ?></a></div>
                                            <div class="product_price"><?php print($prodotto->getPrezzo() . '€'); ?></div>
                                        </div>
                                    </div>
                            </div>            
                               <?php } ?>



                            </div>

                        </div>
                    </div>
                </div>
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