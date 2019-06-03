<?php
require_once __DIR__.'/connect.php';

try{

        $sQuery = $db->prepare('SELECT sneaker_name as item_name FROM sneakers');

        $sQuery->execute();
        $aSneakers=$sQuery->fetchAll();

        echo json_encode($aSneakers);


}catch( PDOException $e ){
  echo '{"status":0, "message":"error to signUp", "code":"001"'.$e.'}';
}
