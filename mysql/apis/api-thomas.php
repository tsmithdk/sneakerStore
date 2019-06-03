<?php
require_once __DIR__.'/../mysql-database.php';

try{

        $sQuery = $db->prepare("SELECT sneakers.sneaker_id,sneakers.sneaker_name, sneakers.gender, sneakers.description,
                                    sneakers.price, brand_names.brand_name FROM sneakers
                                    INNER JOIN brand_names ON brand_name_fk = brand_name_id

        ");

        $sQuery->execute();
        $aSneakers=$sQuery->fetchAll();
        
        echo json_encode($aSneakers);


}catch( PDOException $e ){
  echo '{"status":0, "message":"error to signUp", "code":"001"'.$e.'}';
}
