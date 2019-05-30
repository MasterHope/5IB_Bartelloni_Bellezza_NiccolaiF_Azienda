<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <?php include_once 'head.php'; ?>
    </head>

    <body> 
        <?php include_once 'header.php'; ?>
        
        <?php if(isset($_GET["error"])){ ?>
            <div style="z-index: 1000;">
            <div class="alert-danger"><h6 style="text-align: center;font-family: inherit">Nome Utente o Password errati!</h6></div></div>
        <?php } ?>
        <form action="ConfermaLogin.php" method="POST">
            <div class="container" style="margin-top: 150px">
                <h1>Accedi</h1>
                <div class="row">
                    <div class="col-md-6">
                        <h3>Username</h3>
                        <input type="text" name="username" value="" required/>
                    </div>
                    <div class="col-md-6">
                        <h3>Password</h3>
                        <input type="password" name="password" value="" required/>
                    </div>
                </div>
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
