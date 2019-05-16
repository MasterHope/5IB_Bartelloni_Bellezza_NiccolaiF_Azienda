<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bartelloni-Bellezza-Niccolai Azienda</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Sublime project">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
        <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
        <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
        <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
        <link rel="stylesheet" type="text/css" href="styles/responsive.css">
    </head>
    <body>
        <div class="super_container">
            <?php
            require_once './bean/Cliente.php';
            require_once'./Dao/ClientiDao.php';
            
            ?>
            <?php include_once 'header.php'; ?>
            <!-- Home -->

            <div class="home">
                <div class="home_slider_container">

                    <!-- Home Slider -->
                    <div class="owl-carousel owl-theme home_slider">

                        <!-- Slider Item -->
                        <div class="owl-item home_slider_item">
                            <div class="home_slider_background" style="background-image:url(images/home_slider_1.jpg)"></div>
                            <div class="home_slider_content_container">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
                                                <div class="home_slider_title">Nuovo shop</div>
                                                <div class="home_slider_subtitle">Il nostro shop e' il migliore nell'universo. Acquista da noi!</div>
                                                <div class="button button_light home_button"><a href="Prodotti.php">Acquista ora</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slider Item -->
                        <div class="owl-item home_slider_item">
                            <div class="home_slider_background" style="background-image:url(images/home_slider_1.jpg)"></div>
                            <div class="home_slider_content_container">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
                                                <div class="home_slider_title">Miglior Progetto di sempre</div>
                                                <div class="home_slider_subtitle">Solo i migliori prodotti</div>
                                                <div class="button button_light home_button"><a href="#">Acquista Ora</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slider Item -->
                        <div class="owl-item home_slider_item">
                            <div class="home_slider_background" style="background-image:url(images/home_slider_1.jpg)"></div>
                            <div class="home_slider_content_container">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
                                                <div class="home_slider_title">Acquista</div>
                                                <div class="home_slider_subtitle">Il migliore shop</div>
                                                <div class="button button_light home_button"><a href="#">Acquista ora</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Home Slider Dots -->

                    <div class="home_slider_dots_container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="home_slider_dots">
                                        <ul id="home_slider_custom_dots" class="home_slider_custom_dots">
                                            <li class="home_slider_custom_dot active">01.</li>
                                            <li class="home_slider_custom_dot">02.</li>
                                            <li class="home_slider_custom_dot">03.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>	
                    </div>

                </div>
            </div>

            <!-- Products -->

            <div class="products">
                <div class="container">
                    <div class="row">
                        <div class="col">

                            <div class="product_grid">

                                <!-- Product -->
                                <div class="product">
                                    <div class="product_image"><img src="images/product_1.jpg" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_title"><a href="product.html">Smart Phone</a></div>
                                        <div class="product_price">$670</div>
                                    </div>
                                </div>

                                <!-- Product -->
                                <div class="product">
                                    <div class="product_image"><img src="images/product_2.jpg" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_title"><a href="product.html">Smart Phone</a></div>
                                        <div class="product_price">$670</div>
                                    </div>
                                </div>

                                <!-- Product -->
                                <div class="product">
                                    <div class="product_image"><img src="images/product_3.jpg" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_title"><a href="product.html">Smart Phone</a></div>
                                        <div class="product_price">$670</div>
                                    </div>
                                </div>

                                <!-- Product -->
                                <div class="product">
                                    <div class="product_image"><img src="images/product_4.jpg" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_title"><a href="product.html">Smart Phone</a></div>
                                        <div class="product_price">$670</div>
                                    </div>
                                </div>

                                <!-- Product -->
                                <div class="product">
                                    <div class="product_image"><img src="images/product_5.jpg" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_title"><a href="product.html">Smart Phone</a></div>
                                        <div class="product_price">$670</div>
                                    </div>
                                </div>

                                <!-- Product -->
                                <div class="product">
                                    <div class="product_image"><img src="images/product_6.jpg" alt=""></div>
                                    <div class="product_extra product_hot"><a href="categories.html">Hot</a></div>
                                    <div class="product_content">
                                        <div class="product_title"><a href="product.html">Smart Phone</a></div>
                                        <div class="product_price">$670</div>
                                    </div>
                                </div>

                                <!-- Product -->
                                <div class="product">
                                    <div class="product_image"><img src="images/product_7.jpg" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_title"><a href="product.html">Smart Phone</a></div>
                                        <div class="product_price">$670</div>
                                    </div>
                                </div>

                                <!-- Product -->
                                <div class="product">
                                    <div class="product_image"><img src="images/product_8.jpg" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_title"><a href="product.html">Smart Phone</a></div>
                                        <div class="product_price">$670</div>
                                    </div>
                                </div>

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