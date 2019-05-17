<?php

require_once'Dao.php';

/**
 * Classe che rappresenta un utente
 *
 * @author Bartelloni-Bellezza-NiccolaiF
 */
class UtentiDao extends Dao {

	/**
	 * Metodo per l'inserimento di un nuovo utente
	 * @param String $utente Utente da inserire
	 * @param String $password Password da inserire
	 * @param String $ruolo Ruolo dell'utente da inserire
	 * @return boolean Se la query e' andata a buon fine
	 * @throws Exception Eccezione in casi di fallimento
	 */
	public function insert($utente, $password, $idRuolo) {
		if ($this->exists($utente)) {
			$password = crypt($password);
			$sql = "insert into Utenti values(?,?,?,?)";
			$con = parent::getConnection();
			$st = $con->prepare($sql);
			$codiceUtente = md5("ciaocome");
			$st->bind_param("sssi", $codiceUtente, $utente, $password, $idRuolo);
			if ($st->execute()) {
				return true;
			} else {
				throw new Exception("Query non andata a buon fine", $code, $previous);
			}
		}
	}

	/**
	 *  Metodo per sapere se un utente esiste 
	 * @param type $utente Utente interessato
	 * @return 
	 */
	public function exists($utente) {
		$sql = "select * from Utenti where Utenti.username=?";
		$con = parent::getConnection();
		$st = $con->prepare($sql);
		$st->bind_param("s", $utente);
		return $st->execute();
	}

	/**
	 * Metodo per controllare la correttezza dell'username e della password immesse
	 * @param type $user
	 * @param type $password
	 * @return boolean
	 */
	public function checkLogin($user, $password) {
		if ($this->exists($user)) {
			$sql = "select * from Utenti where username=" . "'$user'";
			$con = parent::getConnection();
			$result = $con->query($sql);
			$rows = $result->fetch_array();
			$password = crypt($password);
			if ($password == $rows['password']) {
				$ok = true;
			}
		} else {
			$ok = false;
		}
		return $ok;
	}

}
