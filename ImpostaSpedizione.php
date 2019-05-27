<?php
require_once'session.php';
require_once'Dao/AcquistiDao.php';
require_once'Dao/UtentiDao.php';
require_once'bean/Acquisto.php';
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
            function loadDoc() {
   var xhttp = new XMLHttpRequest();
   var acquisto=document.getElementById("codice").value;
   var elementi=acquisto.split(";");
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("ordine").innerHTML =
      "<table border='1' cellspacing='10' cellpadding='10'><tr><td>Data Ordine</td><td>Data Spedizione</td><td>Quantità</td><td>Importo</td></tr>"+
      "<tr><td>" + elementi[3]+"</td>" + "<td>" + elementi[4]+"</td>" +"<td>" + elementi[6]+"</td>" +"<td>" + elementi[5]+"</td>"+
      "</tr></table>"
      }
  };
  xhttp.open("GET", "ImpostaSpedizione.php", true);
  xhttp.send();
}
</script>
    </head>
    <body>
        <div class="super_container" style="margin-top: 150px;">
        <?php include_once 'header.php'; ?>
            <div class='container' style='margin-left: 50px;'>
                    <?php if ($idruolo == 4) { ?>
                    <h1>Acquisti</h1>        
                    <select name="codice_spedizione" id='codice'>
                        <option selected="selected">--- Seleziona Codice Acquisto ---</option>
                        <?php foreach ($acquisti as $acquisto) {
                            $codice = $acquisto->getCodice_acquisto()
                            ?>
                        
                            <option value="<?php echo($acquisto); ?>" onclick="loadDoc();">

        <?php echo($codice); ?>
                            </option>
                            

    <?php } ?>
                    </select> 
                    
                </div>
                <div>
                    <div class='container' id="ordine" style="margin-top: 50px">
                        	
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
