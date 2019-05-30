<?php
include_once 'Dao/Acquisto.php';
include_once 'Dao/AcquistiDao.php';




$dataOrdine=$_REQUEST['data-ordine'];
$data_spedizione= strtotime ( '+1 week' , strtotime ( $data_ordine ) ) ;
$data_spedizionedef=date("Y-m-d", $data_spedizione);
$quantita=$_REQUEST['quantita'];
$importo=$_REQUEST['importo'];
$codiceProdotto=$_REQUEST['prodotto'];
$codiceCliente=$_REQUEST['cliente'];
$acquisto=new Acqiosto($dataOrdine,$data_spedizione,$quantita,$codiceProdotto,$codiceUtente,$importo);

$dao=new AcquistiDao();
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include_once 'head.php' ?>
		<meta charset="UTF-8">
		<title>Conferma Ordine</title>
	</head>
	<body>
		<?php include_once 'header.php' ?>
		<div class="container" style="margin-top:150px">
<?php if ($dao->insert($acquisto)) {


?><h1>Ordine Aggiunto Correttamente</h1>
<?php
} ?>

		</div>

		<?php include_once 'footer.php' ?>
	</body>
</html>
