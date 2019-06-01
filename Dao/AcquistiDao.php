<?php

require_once ("Dao.php");
require_once("ProdottiDao.php");

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
     * @return int 0 se la quantità non è stata aggiornata, -number se la query
     * ha prodotto risultati negativi, 1 se è stata eseguita correttamente.
     * Ritorna false se la query non viene eseguita correttamente.
     */
    function aggiungiSpedizione($ordine) {
        $ok = 1;
        $data_ordine = $ordine->getData_ordine();
        $data_spedizione = $ordine->getData_spedizione();
        $quantita = $ordine->getQuantita();
        $codice_prodotto = $ordine->getCodice_prodotto();
        $codice_utente = $ordine->getCodice_utente();
        $importo = (double) $ordine->getImporto();
        $prodottiDao = new ProdottiDao();
        $ok = $prodottiDao->aggiornaQuantitaProdotto($codice_prodotto, $quantita);
        if ($ok == 1) {
            $sql = "insert into Acquisti values(null,'$data_ordine'"
                    . ",'$data_spedizione',$quantita,'$codice_prodotto','$codice_utente',$importo)";
            $connection = parent::getConnection();
            if (!$this->exists($ordine)) {
                if (!$connection->query($sql)) {
                    $ok = false;
                }
            } else {
                $ok = 0;
            }
            $connection->close();
        }
        return $ok;
    }

    /**
     * Metodo che controlla se l'acquisto esiste nel database.
     * @return Ritorna bool True se esiste, false altrimenti.
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
     * Metodo che ritorna tutti gli acquisti.
     * @return lista contente tutti gli acquisti
     */
    public function findAll() {
        $list = array();
        $ok = 1;
        $sql = "select * from Acquisti";
        $conn = parent::getConnection();
        $result = $conn->query($sql);
        while ($row = $result->fetch_array()) {
            $codice_acquisto = $row['codice_acquisto'];
            $data_ordine = $row['data_ordine'];
            $data_spedizione = $row['data_spedizione'];
            $quantita = $row['quantita'];
            $codice_prodotto = $row['codice_prodotto'];
            $codice_utente = $row['codice_utente'];
            $importo = $row['importo'];
            $acquisto = new Acquisto($data_ordine, $data_spedizione
                    , $quantita, $codice_prodotto, $codice_utente, $importo);
            $acquisto->setCodice_acquisto($codice_acquisto);
            $list[] = $acquisto;
        }
        return $list;
    }

}
