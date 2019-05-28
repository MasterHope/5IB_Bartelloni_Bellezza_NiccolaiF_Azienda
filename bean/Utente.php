<?php

/**
 * Classe che rappresenta un utente.
 *
 * @author Bartelloni-Bellezza-NiccolaiF
 */
class Utente {
    protected $codice_utente;
    protected $username;
    protected $password;
    protected $id_ruolo;
    /**
     * Metodo costruttore dell'utente.
     * @param string $codice_utente Stringa identificativa del codice.
     * @param string $username Stringa identificativa dell'utente.
     * @param string $password Stringa che rappresenta la password.
     * @param int $id_ruolo Intero che rappresenta l'id del ruolo dell'utente.
     Il ruolo può essere: Cliente, Responsabile del Magazzino, Responsabile
     della Spedizione, Responsabile del Marketing.
     */
    function __construct($codice_utente, $username, $password,$id_ruolo) {
        $this->codice_utente = $codice_utente;
        $this->username = $username;
        $this->password = $password;
        $this->id_ruolo = $id_ruolo;
    }
    function getCodice_utente() {
	    return $this->codice_utente;
    }

    function getUsername() {
	    return $this->username;
    }

    function getPassword() {
	    return $this->password;
    }

    function getId_ruolo() {
	    return $this->id_ruolo;
    }

    function setCodice_utente($codice_utente) {
	    $this->codice_utente = $codice_utente;
    }

    function setUsername($username) {
	    $this->username = $username;
    }

    function setPassword($password) {
	    $this->password = $password;
    }

    function setId_ruolo($id_ruolo) {
	    $this->id_ruolo = $id_ruolo;
    }


}
