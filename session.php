<?php 
session_start();
if (!isset($_SESSION['utente'])) {
	/* header("Location:".$_SERVER['DOCUMENT_ROOT']."/Login.php"); */
	header("Location:Login.php");
}
