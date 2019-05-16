<?php
require_once'Dao.php';
/**
 * Classe utilizzata per la gestione dei dati inerenti agli acquisti.
 *
 * @author Bartelloni-Bellezza-NiccolaiF
 */
class AcquistiDao extends Dao{
    /**
     * Metodo che consente di modificare la data di spedizione di un acquisto.
     * @param string $codice Codice dell'acquisto
     * @param string $data_spedizione Data dell'effettiva spedizione
     * @return int 0 se la quantità non è stata aggiornata, -1 se la query
     * non è stata eseguita, 1 se è stata eseguita correttamente.
     */
    function modificaSpedizione($codice,$data_spedizione){
        $ok=1;
        $sql="update Acquisti set data_spedizione=? where codice_acquisto=?";
        $connection=parent::getConnection();
        $st=$connection->prepare($sql);
        $st->bind_param("ss", $data_spedizione,$codice);
        if(!$st->execute()){
            $ok=-1;
        } else {
            if($st->affected_rows==0){
                $ok=0;
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
    function aggiungiSpedizione($ordine){
        $ok=1;
        $sql="insert into Acquisti values(?,?,?,?,?,?,?)";
        $connection=parent::getConnection();
        if(!self::exists($ordine)){
            $st=$connection->prepare($sql);
            $codice_acquisto=$ordine->getCodice_acquisto();
            $data_ordine=$ordine->getData_ordine();
            $quantita=$ordine->gerQuantita();
            $codice_prodotto=$ordine->getCodice_prodotto();
            $codice_cliente=$ordine->getCodice_cliente();
            $importo=$ordine->getImporto();
            $st->bind_param("sssissd", $codice_acquisto,$data_ordine,$quantita
                    ,$codice_prodotto,$codice_cliente,$importo);
            if(!$st->execute()){
                $ok=-1;
            }
            $st->close();
            $connection->close();
        } else {
            $ok=0;
        }
        return $ok;
    }
    /**
     * Metodo che controlla se l'acquisto esiste nel database.
     * Ritorna bool True se esiste, false altrimenti.
     */
    function exists($ordine){
        $exist=true;
        $sql="select * from Acquisti where codice_acquisto=?";
        $connection=parent::getConnection();
        $st=$connection->prepare($sql);
        $codice_acquisto=$ordine->getCodice_acquisto();
        $st->bind_param("s", $codice_acquisto);
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
