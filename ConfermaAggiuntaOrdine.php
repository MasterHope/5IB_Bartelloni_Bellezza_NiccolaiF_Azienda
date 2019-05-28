<?php





$dataOrdine=$_REQUEST['data-ordine'];
$quantita=$_REQUEST['quantita'];
$importo=$_REQUEST['importo'];
$codiceProdotto=$_REQUEST['prodotto'];
$codiceCliente=$_REQUEST['cliente'];
$acquisto=

$dao=new AcquistiDao();
if($dao->insert($acquisto))
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
	    <?php
	    // put your code here
	    ?>
	</body>
</html>
