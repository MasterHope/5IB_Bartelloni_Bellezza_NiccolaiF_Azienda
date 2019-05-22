<?php 
session_start();
if (!isset($_SESSION['username'])) {
	header('Location:http://localhost:8000/Login.php');
	die;
}
