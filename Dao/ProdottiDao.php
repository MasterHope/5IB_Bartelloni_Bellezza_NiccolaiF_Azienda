<?php
require_once'Dao.php';
require_once'bean/Prodotto.php';
/**
 * Classe Dao utilizzata per gestire i prodotti presenti nella base di dati.
 *
 * @author Bartelloni-Bellezza-NiccolaiF
 */
class ProdottiDao extends Dao{
    /**
     * Metodo che ritorna tutti i prodotti presenti nel database.
     * @return \Prodotto Array di prodotti presenti nella base di dati.
     */
    function findAll(){
        $prodotti=array();
        $connection=parent::getConnection();
        $sql="select * from Prodotti";
        $result=$connection->query($sql);
        while($row = $result->fetch_array()){
            $codice_prodotto=$row['codice_prodotto'];
            $denominazione=$row['denominazione'];
            $descrizione=$row['descrizione'];
            $prezzo=$row['prezzo'];
            $quantita=$row['quantita'];
            $prodotto=new Prodotto($codice_prodotto,$denominazione,
                    $descrizione,$prezzo, $quantita);
            $prodotti[]=$prodotto;
        }
        return $prodotti;
    }
}
