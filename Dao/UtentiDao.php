<?php

require_once'Dao.php';
/**
 * Classe che rappresenta un utente
 *
 * @author Bartelloni-Bellezza-NiccolaiF
 */
class UtentiDao extends Dao{
	public function insert($utente,$password,$ruolo){
		if($this->exists($utente)){
			$password=crypt($password,0);
			$sql="insert into Utenti values(?,?,?,?)";
			$con=parent::getConnection();
			$st=$con->prepare($sql);
			$st->bind_param("sssi", $codiceUtente,$utente,$password,$idRuolo);
			if($st->execute()){
				return true;
			}else{
				throw new Exception("Query non andata a buon fine", $code, $previous);
			}
		}


	}
	public function exists($utente){
		$sql="select * from Utenti where Utenti.username=?";
		$con=parent::getConnection();
		$st=$con->prepare($sql);
		$st->bind_param("s", $utente);
		return $st->execute();

	}


	
}
