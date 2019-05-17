<?php
require_once 'Utente.php';
/**
 * Classe che rappresenta un Cliente.
 *
 * @author Bartelloni-Bellezza-NiccolaiF
 */
class Cliente{
    private $codice_utente;
    private $cognome;
    private $nome;
    private $indirizzo;
    private $citta;
    private $CAP;
    private $telefono;
    /**
     * Metodo costruttore che imposta i dati del cliente.
     * @param type $cognome
     * @param type $nome
     * @param type $indirizzo
     * @param type $citta
     * @param type $CAP
     * @param type $telefono
     * @param type $codice_utente
     */
    function __construct($cognome, $nome, $indirizzo, $citta, $CAP, $telefono,$codice_utente) {
        $this->codice_utente=$codice_utente;
        $this->cognome = $cognome;
        $this->nome = $nome;
        $this->indirizzo = $indirizzo;
        $this->citta = $citta;
        $this->CAP = $CAP;
        $this->telefono = $telefono;
    }
    /**
     * Metodo che ritorna il cognome del cliente.
     * @return string Cognome del cliente.
     */
    function getCognome() {
        return $this->cognome;
    }
    /**
     * Metodo che ritorna il nome del cliente.
     * @return string Nome del cliente.
     */
    function getNome() {
        return $this->nome;
    }
    /**
     * Metodo che ritorna l'indirizzo.
     * @return string Indirizzo del cliente.
     */
    function getIndirizzo() {
        return $this->indirizzo;
    }
    /**
     * Metodo che ritorna la città di domicilio.
     * @return string Città del cliente.
     */
    function getCitta() {
        return $this->citta;
    }
    /**
     * Metodo che ritorna il CAP.
     * @return string CAP della città del cliente.
     */
    function getCAP() {
        return $this->CAP;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getCodice_utente(){
        return $this->codice_utente;
    }
    
    function setCognome($cognome) {
        $this->cognome = $cognome;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setIndirizzo($indirizzo) {
        $this->indirizzo = $indirizzo;
    }

    function setCitta($citta) {
        $this->citta = $citta;
    }

    function setCAP($CAP) {
        $this->CAP = $CAP;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }



}
