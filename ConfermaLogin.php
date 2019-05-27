<?php
require_once 'Dao/UtentiDao.php';
session_start();
session_unset();
session_destroy();
$user = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$utenti=new UtentiDao();
if($utenti->checkLogin($user,$password)){
        session_start();
	$_SESSION['utente']=$user;
	$_SESSION['password']=md5($password);

}else{
	header("Location:Login.php?error=true");
	die;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include_once 'head.php' ?>
		<meta charset="UTF-8">
		<title>ConfermaLogin</title>
	</head>
	<body>
		<?php include_once 'header.php' ?>
<div style="margin-top:150px">
    <center><h1>Loggato</h1></center>

</div>
		<?php include_once 'footer.php' ?>
	</body>
</html>
