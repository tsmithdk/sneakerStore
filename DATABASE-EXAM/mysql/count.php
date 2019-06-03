<?php
require_once __DIR__.'/connect.php';


try{

        $sQuery = $db->prepare('SELECT COUNT(user_id)
        FROM users;');
       
        $sQuery->execute();
        $aSneakers=$sQuery->fetchAll();

        echo json_encode($aSneakers);


}catch( PDOException $e ){
  echo '{"status":0, "message":"error to signUp", "code":"001"'.$e.'}';
}
