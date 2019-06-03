<?php
require_once __DIR__.'/connect.php';

try{

        $sQuery = $db->prepare("SELECT sneakers.sneaker_id, sneakers.gender, brand_names.brand_name FROM sneakers
                                INNER JOIN brand_names ON brand_name_fk = brand_name_id
                                where brand_name='nike' AND (sneakers.gender=0 OR sneakers.gender=1)");

        $sQuery->execute();
        $aSneakers=$sQuery->fetchAll();

        echo json_encode($aSneakers);


}catch( PDOException $e ){
  echo '{"status":0, "message":"error to signUp", "code":"001"'.$e.'}';
}

