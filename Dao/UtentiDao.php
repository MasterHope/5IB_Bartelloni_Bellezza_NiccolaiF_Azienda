<?php

require_once("Dao.php");

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
        if (!$this->exists($utente)) {
            $password = md5($password);
            $con = parent::getConnection();
            $codiceUtente = md5($utente);
            $sql = "insert into Utenti values('$codiceUtente', '$utente', '$password', $idRuolo)";
            $con->query($sql);
            if ($con->affected_rows==1) {
                return $idRuolo;
            } else {
                return false;
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
        $ok=true;
        $sql = "select * from Utenti where Utenti.username='$utente'";
        $con = parent::getConnection();
        $result = $con->query($sql);
        if (!$result || $result->num_rows==0) {
            $ok=false;
        }
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
        $ok=false;
        if ($this->exists($user)) {
            $sql = "select * from Utenti where username=" . "'$user'";
            $con = parent::getConnection();
            $result = $con->query($sql);
            $rows = $result->fetch_array();
            $password = md5($password);
            if ($password == $rows['password']) {
                $ok = true;
            }
        parent::closeConnection($con);
        }
        return $ok;
    }

    /**
     * Funzione che dato un codice di un utente, ritorna il codice del cliente corrispondente.
     * @param string $codice_utente Codice del cliente.
     * @return String null se il cliente non viene trovato, stringa identificativa del codice altrimenti.
     */
    public function getCliente($codice_utente) {
        $codice_cliente = null;
        $connection = parent::getConnection();
        $sql = "select codice_cliente from Clienti natural join Utenti";
        $result = $connection->query($sql);
        if ($result->num_rows != 0) {
            $row = $result->fetch_array();
            $codice_cliente = $row['codice_cliente'];
        }
        parent::closeConnection($connection);
        return $codice_cliente;
    }

}
