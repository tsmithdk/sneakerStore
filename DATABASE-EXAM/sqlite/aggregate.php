<?php
require_once __DIR__.'/connect.php';

try{

        $sQuery = $db->prepare("SELECT length(content) FROM news");

        $sQuery->execute();
        $aSizes=$sQuery->fetchAll();

        echo json_encode($aSizes);


}catch( PDOException $e ){
  echo '{"status":0, "message":"error", "code":"001"'.$e.'}';
}
