<?php
require_once __DIR__.'/../mysql-database.php';

try{

        $sQuery = $db->prepare("SELECT size FROM sizes WHERE sneaker_fk = :sId

        ");
          $sQuery->bindValue(':sId', $_POST['id']);

        $sQuery->execute();
        $aSizes=$sQuery->fetchAll();
        
        echo json_encode($aSizes);


}catch( PDOException $e ){
  echo '{"status":0, "message":"error to signUp", "code":"001"'.$e.'}';
}
