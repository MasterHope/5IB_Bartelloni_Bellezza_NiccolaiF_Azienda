<?php

/**
 * Classe che identifica un acquisto.
 *
 * @author Bartelloni-Bellezza-NiccolaiF
 */
class Acquisto {

    private $codice_acquisto;
    private $data_ordine;
    private $data_spedizione;
    private $quantita;
    private $codice_prodotto;
    private $codice_utente;
    private $importo;

    /**
     * Metodo costruttore di Acquisto.
     * @param string $data_ordine Data dell'ordine.
     * @param string $data_spedizione Data di spedizione dell'ordine.
     * @param int $quantita Quantita di prodotti comprata.
     * @param string $codice_prodotto Codice del prodotto comprato.
     * @param string $codice_cliente Codice del cliente che ha comprato un prodotto.
     * @param float $importo Costo dell'acquisto effettuato.
     */
    function __construct($data_ordine, $data_spedizione, $quantita, $codice_prodotto, $codice_utente, $importo) {
        $this->data_ordine = date("Y-m-d", strtotime($data_ordine));
        $this->data_spedizione = date("Y-m-d", strtotime($data_spedizione));
        $this->quantita = $quantita;
        $this->codice_prodotto = $codice_prodotto;
        $this->codice_utente = $codice_utente;
        $this->importo = $importo;
    }

    /**
     * Metodo che ritorna la data dell'ordine.
     * @return date Data dell'ordine.
     */
    function getData_ordine() {
        return $this->data_ordine;
    }

    /**
     * Metodo che ritorna il codice dell'acquisto.
     * @return int Codice dell'acquisto.
     */
    function getCodice_acquisto() {
        return $this->codice_acquisto;
    }

    /**
     * Metodo che ritorna la data della spedizione.
     * @return date Data della spedizione.
     */
    function getData_spedizione() {
        return $this->data_spedizione;
    }

    /**
     * Metodo che ritorna la quantità di prodotti comprati.
     * @return date Numero di prodotti acquistati.
     */
    function getQuantita() {
        return $this->quantita;
    }

    /**
     * Metodo che ritorna la spesa totale dell'acquisto.
     * @return float Costo della spesa dell'acquisto.
     */
    function getImporto() {
        return $this->importo;
    }
    /**
     * Metodo getter del codice utente.
     * @return type
     */
    function getCodice_utente() {
        return $this->codice_utente;
    }

        /**
     * Metodo che consente di settare la data dell'ordine.
     * @param string $data_ordine Data dell'ordine.
     */
    function setData_ordine($data_ordine) {
        $this->data_ordine = date("Y-m-d", strtotime($data_ordine));
    }

    /**
     * Metodo che consente di settare la data della spedizione.
     * @param string $data_spedizione Data della spedizione dell'acquisto.
     */
    function setData_spedizione($data_spedizione) {
        $this->data_spedizione = date("Y-m-d", strtotime($data_spedizione));
    }

    /**
     * Metodo che consente di settare la quantità del prodotto acquistato.
     * @param int $quantita Numero di prodotti acquistati.
     */
    function setQuantita($quantita) {
        $this->quantita = $quantita;
    }

    /**
     * Metodo che consente di settare l'importo dell'acquisto.
     * @param int $importo Importo dell'acquisto.
     */
    function setImporto($importo) {
        $this->importo = $importo;
    }
    /**
     * Metodo che consente di settare il codice dell'acquisto.
     * @param int Codice dell'acquisto.
     */
    function setCodice_acquisto($codice_acquisto) {
        $this->codice_acquisto = $codice_acquisto;
    }

    /**
     * Metodo che ritorna il codice del prodotto.
     * @return string Codice del prodotto.
     */
    function getCodice_prodotto() {
        return $this->codice_prodotto;
    }


}
