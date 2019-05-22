<?php

require_once ("Dao.php");

/**
 * Classe utilizzata per la gestione dei dati inerenti agli acquisti.
 *
 * @author Bartelloni-Bellezza-NiccolaiF
 */
class AcquistiDao extends Dao {

    /**
     * Metodo che consente di modificare la data di spedizione di un acquisto.
     * @param string $codice Codice dell'acquisto
     * @param string $data_spedizione Data dell'effettiva spedizione
     * @return int 0 se la quantità non è stata aggiornata, -1 se la query
     * non è stata eseguita, 1 se è stata eseguita correttamente.
     */
    function modificaSpedizione($codice, $data_spedizione) {
        $ok = 1;
        $sql = "update Acquisti set data_spedizione=? where codice_acquisto=?";
        $connection = parent::getConnection();
        $st = $connection->prepare($sql);
        $st->bind_param("ss", $data_spedizione, $codice);
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
     * Metodo utilizzato per aggiungere un ordine al database.
     * @param Acquisto $ordine Ordine del cliente.
     * @return int 0 se la quantità non è stata aggiornata, -1 se la query
     * non è stata eseguita, 1 se è stata eseguita correttamente.
     */
    function aggiungiSpedizione($ordine) {
        $ok = 1;
        $data_ordine = $ordine->getData_ordine();
        $data_spedizione = $ordine->getData_spedizione();
        $quantita = $ordine->getQuantita();
        $codice_prodotto = $ordine->getCodice_prodotto();
        $codice_cliente = $ordine->getCodice_cliente();
        $importo = (double) $ordine->getImporto();
        $sql = "insert into Acquisti values(null,'$data_ordine'"
                . ",null,$quantita,'$codice_prodotto','$codice_cliente',$importo)";
        $connection = parent::getConnection();
        if (!$this->exists($ordine)) {
            if (!$connection->query($sql)) {
                $ok = -1;
            }
        } else {
            $ok = 0;
        }
        $connection->close();
        $this->aggiornaQuantitaProdotto($codice_prodotto,$quantita);
        return $ok;
    }

    /**
     * Metodo che controlla se l'acquisto esiste nel database.
     * Ritorna bool True se esiste, false altrimenti.
     */
    function exists($ordine) {
        $exist = true;
        $sql = "select * from Acquisti where codice_acquisto=?";
        $connection = parent::getConnection();
        $st = $connection->prepare($sql);
        $codice_acquisto = $ordine->getCodice_acquisto();
        $st->bind_param("s", $codice_acquisto);
        $result = $st->execute();
        $rows = $st->num_rows;
        if ($rows == 0) {
            $exist = false;
        }
        $st->close();
        $connection->close();
        return $exist;
    }
    /**
     * Metodo che aggiorna la quantità dei prodotti disponibili in magazzino.
     * @param string $codice_prodotto Codice del prodotto.
     * @param int $quantita Quantita da rimuovere dal magazzino.
     * @return bool True se il prodotto è stato aggiornato, false altrimenti.
     */
    public function aggiornaQuantitaProdotto($codice_prodotto, $quantita) {
        $ok=true;
        $sql="update Prodotti set quantita=quantita - ? where codice_prodotto=?";
        $connection=parent::getConnection();
        $st=$connection->prepare($sql);
        $st->bind_param("is", $quantita,$codice_prodotto);
        if(!$st->execute()){
            $ok=false;
        }
        return $ok;
    }

}
