<?php
require_once __DIR__.'/connect.php';
$sBrand = 'nike';
try{

        $sQuery = $db->prepare('call getProductsFromOneBrand(:sBrand)');
        $sQuery->bindValue(':sBrand', $sBrand);
        $sQuery->execute();
        $aSneakers=$sQuery->fetchAll();

        echo json_encode($aSneakers);


}catch( PDOException $e ){
  echo '{"status":0, "message":"error to signUp", "code":"001"'.$e.'}';
}
