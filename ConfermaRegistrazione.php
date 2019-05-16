	    <?php
	    require_once 'Dao/UtentiDao.php';
	    $user=$_REQUEST["username"];
	    $password=$_REQUEST["password"];
	    $ruolo=$_REQUEST["ruolo"];
	    $ruoli=array("cliente"=>1,"marketing"=>2,"responsabile-clienti"=>3,"responsabile-spedizioni"=>4,"responsabile-magazzino"=>5);
	    $utenti=new UtentiDao();
	    //METTERRE CONTROLLI
	    if($utenti->insert($user, $password, $ruoli[$ruolo])){
		    echo "FEEEEEES";
	    }

	    ?>
