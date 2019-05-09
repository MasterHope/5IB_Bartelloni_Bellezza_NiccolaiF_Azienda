<?php
/**
 * Description of Prodotto
 *
 * @author Bartelloni_Bellezza_NiccolaiF
 */
class Prodotto {
    private $codice_prodotto;
    private $denominazione;
    private $descrizione;
    private $prezzo;
    private $quantita;
    /**
     * Metodo costruttore di Prodotto.
     * @param string $codice_prodotto Codice del prodotto.
     * @param string $denominazione Nome del prodotto.
     * @param type $descrizione Descrizione del prodotto.
     * @param type $prezzo Prezzo del prodotto.
     * @param type $quantita Quantità del prodotto presente nel magazzino.
     */
    function __construct($codice_prodotto, $denominazione, $descrizione, $prezzo, $quantita) {
        $this->codice_prodotto = $codice_prodotto;
        $this->denominazione = $denominazione;
        $this->descrizione = $descrizione;
        $this->prezzo = $prezzo;
        $this->quantita = $quantita;
    }
    /**
     * Metodo getter del codice del prodotto.
     * @return string Ritorna il codice del prodotto.
     */
    function getCodice_prodotto() {
        return $this->codice_prodotto;
    }

    /**
     * Metodo getter del titolo del prodotto.
     * @return string Ritorna il titolo del prodotto.
     */
    function getDenominazione() {
        return $this->denominazione;
    }
    /**
     * Metodo getter della descrizione del prodotto.
     * @return string Ritorna la descrizione del prodotto.
     */
    function getDescrizione() {
        return $this->descrizione;
    }

    /**
     * Metodo getter del prezzo del prodotto.
     * @return float Ritorna il prezzo del prodotto.
     */
    function getPrezzo() {
        return $this->prezzo;
    }
    /**
     * Metodo getter della quantità del prodotto.
     * @return int Ritorna il numero di prodotti disponibili.
     */
    function getQuantita() {
        return $this->quantita;
    }
    
    /**
     * Metodo setter che consente di impostare il titolo del prodotto.
     * @param string $denominazione Stringa che indica il titolo del prodotto.
     */
    function setDenominazione($denominazione) {
        $this->denominazione = $denominazione;
    }
    /**
     * Metodo setter che consente di impostare la descrizione del prodotto.
     * @param string $descrizione Stringa che indica la descrizione del prodotto.
     */
    function setDescrizione($descrizione) {
        $this->descrizione = $descrizione;
    }
    
    /**
     * Metodo setter che consente di impostare il prezzo del prodotto.
     * @param float $prezzo Prezzo in euro del prodotto.
     */
    function setPrezzo($prezzo) {
        $this->prezzo = $prezzo;
    }
    
    /**
     * Metodo setter che consente di impostare le quantità del prodotto presente in magazzino.
     * @param int $quantita Numero di prodotti presenti nel magazzino disponibili.
     */
    function setQuantita($quantita) {
        $this->quantita = $quantita;
    }


}
