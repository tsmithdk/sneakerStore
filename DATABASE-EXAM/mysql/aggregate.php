<?php
ini_set('display_errors', 1);
require_once __DIR__.'/connect.php';


try{
    $sQuery = $db->prepare("SELECT sneaker_name, AVG(price) FROM sneakers GROUP BY sneaker_name");


    $sQuery->execute();
    $aAggregate=$sQuery->fetchAll();

    echo json_encode($aAggregate);


  }catch( PDOException $e ){
    echo '{"status":0, "message":"error to signUp", "code":"001"'.$e.'}';

  }






