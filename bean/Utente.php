<?php

/**
 * Classe che rappresenta un utente.
 *
 * @author Bartelloni-Bellezza-NiccolaiF
 */
class Utente {
    private $codice_utente;
    private $username;
    private $password;
    private $id_ruolo;
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
        $this->ruolo = $ruolo;
    }

}
