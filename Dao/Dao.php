<?php

/**
 * Classe che permette di gestire la connessione al database
 */
class Dao {

	private $hostname="localhost";
	private $user="root";
	private $password="";
	private $database="Azienda";

	/**
	 * Funzione per ottenere la connessione al database
	 * @return la connesione avvenuta con successo o meno
	 */
	public function getConnection(){
		$conn=new mysqli($this->hostname,$this->user,$this->password,$this->database);
		return $conn;
	}
	
	/**
	 * Funzione per poter chiudere la connessione
	 */
	public function closeConnection($conn){
		$conn->close();
	}
}
?>
