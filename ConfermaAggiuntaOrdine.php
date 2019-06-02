<?php
include_once 'bean/Acquisto.php';
include_once 'Dao/AcquistiDao.php';
include_once'Dao/ProdottiDao.php';
include_once'bean/Prodotto.php';


if(isset($_REQUEST['data-ordine'])){
	$dataOrdine= filter_input(INPUT_POST, "data-ordine",FILTER_SANITIZE_STRING);
	$data_spedizione= strtotime ( '+1 week' , strtotime ( $dataOrdine ) ) ;
	$data_spedizionedef=date("Y-m-d", $data_spedizione);
	$quantita= filter_input(INPUT_POST, "quantita", FILTER_SANITIZE_NUMBER_INT);
	$codiceProdotto=filter_input(INPUT_POST, "prodotto", FILTER_SANITIZE_STRING);
	$prodottiDao=new ProdottiDao();
	$prezzo=$prodottiDao->getProdotto($codiceProdotto)->getPrezzo();
	$importo=$prezzo*$quantita;
	$codiceUtente=filter_input(INPUT_POST, "cliente", FILTER_SANITIZE_STRING);
	$acquisto=new Acquisto($dataOrdine,$data_spedizionedef,$quantita,$codiceProdotto,$codiceUtente,$importo);
	$dao=new AcquistiDao();
	$ok=$dao->aggiungiSpedizione($acquisto);
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include_once 'head.php' ?>
		<meta charset="UTF-8">
		<title>Conferma Ordine</title>
	</head>
	<body>
		<?php include_once'header.php'?>
		<div class="container" style="margin-top:150px">
			<?php if ($ok==1) {?>

			<div style="z-index: 1000;" id="errore">
				<div class="alert-success"><h6 style="text-align: center;font-family: inherit">
						Ordine avvenuto con successo!</h6></div>
			</div>
<?php
	} else {
		if($ok<=-1){?>
		<div style="z-index: 1000;" id="errore">
			<div class="alert-danger"><h6 style="text-align: center;font-family: inherit">
					Prodotto non disponibile nella quantita richiesta!</h6></div>
		</div>
<?php } else {
if($ok==false){?>
<div style="z-index: 1000;" id="errore">
	<div class="alert-danger"><h6 style="text-align: center;font-family: inherit">
			Errore nell'ordine!</h6></div>
</div>
<?php } ?>
<?php }
	} 
}?>

		</div>

		<?php include_once 'footer.php' ?>
	</body>
</html>
