<?php 
session_start();
if (!isset($_SESSION['username'])) {
	header("Location:".$_SERVER['workdir']."/Login.php");
	die;
}
