<?php
require_once __DIR__.'/connect.php';

try{

        $sQuery = $db->prepare('SELECT title as news_title FROM news');

        $sQuery->execute();
        $aSneakers=$sQuery->fetchAll();

        echo json_encode($aSneakers);


}catch( PDOException $e ){
  echo '{"status":0, "message":"error", "code":"001"'.$e.'}';
}
