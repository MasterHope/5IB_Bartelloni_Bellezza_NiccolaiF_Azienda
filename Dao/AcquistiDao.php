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
    
}
