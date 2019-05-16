<?php

require_once'Dao.php';
require_once'bean/Prodotto.php';

/**
 * Classe Dao utilizzata per gestire i prodotti presenti nella base di dati.
 *
 * @author Bartelloni-Bellezza-NiccolaiF
 */
class ProdottiDao extends Dao {

    /**
     * Metodo che ritorna tutti i prodotti presenti nel database.
     * @return \Prodotto Array di prodotti presenti nella base di dati.
     */
    function findAll() {
        $prodotti = array();
        $connection = parent::getConnection();
        $sql = "select * from Prodotti";
        $result = $connection->query($sql);
        while ($row = $result->fetch_array()) {
            $codice_prodotto = $row['codice_prodotto'];
            $denominazione = $row['denominazione'];
            $descrizione = $row['descrizione'];
            $prezzo = $row['prezzo'];
            $quantita = $row['quantita'];
            $prodotto = new Prodotto($codice_prodotto, $denominazione, $descrizione, $prezzo, $quantita);
            $prodotti[] = $prodotto;
        }
        $result->free();
        $connection->close();
        return $prodotti;
    }

    /**
     * Metodo per l'aggiornamento della quantità dei prodotti.
     * @param int $quantita Quantità dei prodotti nuova del database.
     * @return int 0 se la quantità non è stata aggiornata, -1 se la query
     * non è stata eseguita, 1 se è stata eseguita correttamente.
     */
    function aggiornaQuantita($codice, $quantita) {
        $ok = 1;
        $sql = "update Prodotti set quantita=? where codice_prodotto=?";
        $connection = parent::getConnection();
        $st = $connection->prepare($sql);
        $st->bind_param("is", $quantita, $codice);
        if (!$st->execute()) {
            $ok = -1;
        } else {
            if ($st->affected_rows == 0) {
                $ok = 0;
            }
        }
        $st->close();
        $connection->close();
        return $ok;
    }

    /**
     * Metodo utilizzato per inserire un nuovo prodotto.
     * @param Prodotto $prodotto prodotto Inserito nel database
     * @return int 0 se la quantità non è stata aggiornata, -1 se la query
     * non è stata eseguita, 1 se è stata eseguita correttamente.
     */
    function inserisciProdotto($prodotto) {
        $ok = 1;
        $sql = "insert into Prodotti values(?,?,?,?,?)";
        $connection = parent::getConnection();
        $st=null;
        if (!$this->exists($prodotto)) {
            $st = $connection->prepare($sql);
            $codice_prodotto = $prodotto->getCodice_prodotto();
            $denominazione = $prodotto->getDenominazione();
            $descrizione = $prodotto->getDescrizione();
            $prezzo = $prodotto->getPrezzo();
            $quantita = $prodotto->getQuantita();
            $st->bind_param("sssdi", $codice_prodotto, $denominazione, $descrizione, $prezzo, $quantita);
            if (!$st->execute()) {
                $ok = -1;
            }
        } else {
            $ok = 0;
        }
        $st->close();
        $connection->close();
        return $ok;
    }
    /**
     * Metodo utilizzato per verificare se il prodotto esiste o meno nel database. 
     * Ritorna bool True se esiste, false altrimenti.
     */
    function exists($prodotto){
        $exist=true;
        $sql="select * from Prodotti where codice_prodotto=?";
        $connection=parent::getConnection();
        $st=$connection->prepare($sql);
        $codice_prodotto=$prodotto->getCodice_prodotto();
        $st->bind_param("s", $codice_prodotto);
        $result=$st->execute();
        $rows=$st->num_rows;
        if($rows==0){
            $exist=false;
        }
        $st->close();
        $connection->close();
        return $exist;
    }
}
