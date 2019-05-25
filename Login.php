<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <?php include_once 'head.php'; ?>
    </head>

    <body> 
        <?php include_once 'header.php'; ?>
	<?php if($_REQUEST["error"]) ?>
        <form action="ConfermaLogin.php" method="POST">
            <div class="container" style="margin-top: 150px">
                <h1>Accedi</h1>
                <div class="row">
                    <div class="col-md-6">
                        <h3>Username</h3>
                        <input type="text" name="username" value="" />
                    </div>
                    <div class="col-md-6">
                        <h3>Password</h3>
                        <input type="password" name="password" value="" />
                    </div>
                </div>
                <!--		<div class="row" style="margin-top: 10px">
                                    <h3>Ruolo</h3>
                                </div>
                                <div class="row align-items-center" style="margin-top: 20px;margin-bottom: 10px">
                                    <div class="col-md-2">
                                        <input type="radio" name="ruolo" value="cliente" checked="checked" />
                                        Cliente
                                    </div>
                                    <div class="col-md-2">
                                        <input type="radio" name="ruolo" value="marketing"  />
                                        Responsabile Marketing
                                    </div>
                                    <div class="col-md-2">
                                        <input type="radio" name="ruolo" value="responsabile-clienti"  />
                                        Responsabile Clienti
                                    </div>
                                    <div class="col-md-2">
                                        <input type="radio" name="ruolo" value="responsabile-spedizioni"  />
                                        Responsabile Spedizioni
                                    </div>
                                    <div class="col-md-2">
                                        <input type="radio" name="ruolo" value="responsabile-magazzino"  />
                                        Responsabile del Magazzino
                                    </div>
                                </div>-->
                <div class="row" style="margin-top: 50px">
                    <div class="col-md-6">
                        <input type="submit" />
                    </div>
                    <div class="col-md-6">
                        <input type="reset">
                    </div>
                </div>
            </div>
        </form>
        <?php include_once 'footer.php'; ?>
    </body>
</html>
