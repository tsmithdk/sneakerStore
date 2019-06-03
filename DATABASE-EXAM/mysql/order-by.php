<?php
require_once __DIR__.'/connect.php';

try{

        $sQuery = $db->prepare('SELECT * FROM users
        ORDER BY name, last_name, email;');
     
        $sQuery->execute();
        $aSneakers=$sQuery->fetchAll();

        echo json_encode($aSneakers);


}catch( PDOException $e ){
  echo '{"status":0, "message":"error to signUp", "code":"001"'.$e.'}';
}
