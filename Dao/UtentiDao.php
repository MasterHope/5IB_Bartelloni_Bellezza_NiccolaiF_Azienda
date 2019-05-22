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
                        parent::closeConnection($con);
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
		$ok=$st->execute();
                parent::closeConnection($con);
                return $ok;
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
                parent::closeConnection($con);
		return $ok;
	}
        /**
         * Funzione che dato un codice di un utente, ritorna il codice del cliente corrispondente.
         * @param string $codice_utente Codice del cliente.
         * @return String null se il cliente non viene trovato, stringa identificativa del codice altrimenti.
         */
        public function getCliente($codice_utente){
            $codice_cliente=null;
            $connection=parent::getConnection();
            $sql="select codice_cliente from Clienti c, Utenti u where c.codice_utente=u.codice_utente"
                    . " and c.codice_utente=$codice_utente";
            $result=$connection->query($sql);
            if($result->num_rows!=0){
                $row=$result->fetch_array();
                $codice_cliente=$row['codice_cliente'];
            }
            parent::closeConnection($connection);
            return $codice_cliente;
        }

}
