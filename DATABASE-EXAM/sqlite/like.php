<?php
require_once __DIR__.'/connect.php';

$sSearch = '%t%';
// Search for sneaker name
try{

        $sQuery = $db->prepare('SELECT * FROM news WHERE title LIKE :sSearch');
        $sQuery->bindValue(':sSearch', $sSearch);
        $sQuery->execute();
        $aSneakers=$sQuery->fetchAll();

        echo json_encode($aSneakers);


}catch( PDOException $e ){
  echo '{"status":0, "message":"error", "code":"001"'.$e.'}';
}
