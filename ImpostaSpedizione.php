<?php
require_once'session.php';
require_once'Dao/AcquistiDao.php';
require_once'Dao/UtentiDao.php';
require_once'bean/Acquisto.php';
require_once'ModificaSpedizione.php';
if (!isset($_SESSION)) {
    session_start();
}
$utente = $_SESSION['utente'];
$codice_utente = md5($utente);
$utentiDao = new UtentiDao();
$acquistiDao = new AcquistiDao();
$ruolo = $utentiDao->getRuolo($codice_utente);
$ruoli = array("cliente" => 1, "marketing" => 2, "responsabile-clienti" => 3, "responsabile-spedizioni" => 4, "responsabile-magazzino" => 5);
$idruolo = $ruoli["$ruolo"];
$daoAcquisti = new AcquistiDao();
$acquisti = $daoAcquisti->findAll();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bartelloni-Bellezza-Niccolai Azienda</title>
        <?php include_once 'head.php'; ?>
        <script>
            function isDataCorrect() {
                var result = true;
                var data_spedizione = document.getElementById("data_spedizione").value;
                var data_ordine = document.getElementById("data_ordine").value;
                var d_spedizione = new Date(data_spedizione);
                var d_ordine = new Date(data_ordine);
                var rSped = d_spedizione.getTime();
                var rOrdine = d_ordine.getTime();
                if (rSped <= rOrdine) {
                    displayError();
                    result = false;
                } else{
                    hideError();
                }
                return result;
            }
            function displayError() {
                document.getElementById('errore').style.visibility="visible";
            }
            function hideError(){
                document.getElementById('errore').style.visibility="hidden";
            }
            function loadDoc() {
                var xhttp = new XMLHttpRequest();
                var acquisto = document.getElementById("codice").value;
                var elementi = acquisto.split(";");
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("ordine").innerHTML =
                                "<table border='1' cellspacing='10' cellpadding='10'>"+
                        "<tr><td>Data Ordine</td><td>Data Spedizione</td><td>Quantità</td><td>Importo</td></tr>" +
                                "<tr><td>" + elementi[3] + "</td>" + "<td>" 
                                + elementi[4] + "</td>" + "<td>" + elementi[6] 
                                + "</td>" + "<td>" + elementi[5] + "</td>" +
                                "</tr></table><br><br>";

                        document.getElementById('data_spedizione').value = elementi[4];
                        document.getElementById('code').value = elementi[0];
                        document.getElementById('data_ordine').value = elementi[3];
                    }
                };
                xhttp.open("POST", "ImpostaSpedizione.php", true);
                xhttp.send();
            }
        </script>
    </head>
    <body>
        
                    <div style="z-index: 1000;visibility: hidden;" id="errore">
                        <div class="alert-danger"><h6 style="text-align: center;font-family: inherit">
                                La data di spedizione deve essere maggiore della data dell'ordine!</h6></div>
                    </div>
        <div class="super_container" style="margin-top: 150px;">
            <?php include_once 'header.php'; ?>
            <div class='container' style='margin-left: 50px;'>
                <?php if ($idruolo == 4) { ?>
                    <h1>Acquisti</h1>        
                    <select name="codice_spedizione" id='codice'>
                        <option selected="selected">--- Seleziona Codice Acquisto ---</option>
                        <?php
                        foreach ($acquisti as $acquisto) {
                            $codice_prodotto = $acquisto->getCodice_acquisto()
                            ?>

                            <option value="<?php echo($acquisto); ?>" onclick="loadDoc();">

                                <?php echo($codice_prodotto); ?>
                            </option>


                        <?php } ?>
                    </select> 

                </div>
                <div>
                    <div class='container' id="ordine" style="margin-top: 50px;margin-left:50px;color: black;">

                    </div>
                    <div class='container' style='margin-left:50px;'> 
                        <form action='' name='aggiorna' method='POST' onsubmit="return isDataCorrect()"> 
                            <label style='color: black;'>Modifica Data di Spedizione</label>
                            <input type='date' name='data_spedizione' id='data_spedizione' value=''> 
                            <input type='hidden' id='data_ordine' value=''>              
                            <input type='hidden' name='codice' id='code' value=''><br> 
                            <input type='submit' value='Aggiorna Data Spedizione'> 
                        </form> 
                    </div> 
                <?php } else {
                    ?> 
                    <div style="z-index: 1000;">
                        <div class="alert-danger"><h6 style="text-align: center;font-family: inherit">Operazione non permessa!</h6></div>
                    </div>
                <?php } ?>  
                <?php include_once 'footer.php'; ?>
            </div>
    </body>
</html>
