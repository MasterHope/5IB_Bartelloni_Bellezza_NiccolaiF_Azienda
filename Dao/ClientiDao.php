<?php

require_once("Dao.php");
require_once("bean/Cliente.php");
require_once("UtentiDao.php");

/**
 * Classe Dao dedita alla gestione dei dati inerenti ai clienti.
 *
 * @author Bartelloni-Bellezza-NiccolaiF
 */
class ClientiDao extends Dao {

    /**
     * Metodo utilizzato per inserire un nuovo cliente.
     * @param Cliente $cliente Cliente inserito nel database
     * @return int 0 se l'informazione sul cliente non è stata aggiornata, -1 se la query
     * non è stata eseguita, 1 se è stata eseguita correttamente.
     */
    function insert($cliente, $utente, $password) {
        $ok = 1;
        $UtentiDao = new UtentiDao();
        if ($UtentiDao->insert($utente, $password)) {
            $cognome = $cliente->getCognome();
                $nome = $cliente->getNome();
                $indirizzo = $cliente->getIndirizzo();
                $citta = $cliente->getCitta();
                $CAP = $cliente->getCAP();
                $telefono = $cliente->getTelefono();
                $hash = $cognome . $nome . $indirizzo . $citta . $CAP . $telefono;
                $codice_utente = $cliente->getCodice_utente();
                $codice_cliente = md5($hash);
            if (!$this->exists($codice_cliente)) {
                $sql = "insert into Clienti values(?,?,?,?,?,?,?,?)";
                $connection = parent::getConnection();
                $st = $connection->prepare($sql);
                $st->bind_param("ssssssss", $codice_cliente, $codice_utente
                        , $cognome, $nome, $indirizzo, $citta, $CAP, $telefono);
                if (!$st->execute()) {
                    $ok = -1;
                }
            } else {
                $ok = 0;
            }
        } else {
            $ok=-1;
        }
        return $ok;
    }

    /**
     * Metodo utilizzato per verificare se il cliente esiste o meno nel database. 
     * Ritorna bool True se esiste, false altrimenti.
     */
    function exists($codice_cliente) {
        $exists = true;
        $sql = "select * from Clienti where codice_cliente=?";
        $connection = parent::getConnection();
        $st = $connection->prepare($sql);
        $st->bind_param("s", $codice_cliente);
        $st->execute();
        $result = $st->get_result();
        if ($result->num_rows == 0) {
            $exists = false;
        }
        $connection->close();
        return $exists;
    }

}
