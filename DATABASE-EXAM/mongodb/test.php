<?php

require_once 'db.php';
$db->beginTransaction();

try{

  $sQuery = $db->prepare("INSERT INTO sneakers VALUES(null,'x','xx',1)");


  $sQuery->execute();

  $prices = $db->lastInsertId();

  if(!$sQuery->rowCount()){
      $db->rollBack();
    echo '{"status":0,"message":"error 1"}';
    exit;
  }

  echo json_encode($prices);//'{"status":1,"message":"correct first"}';


}catch(MongoException $e){
    echo "error $e";
    $db->rollBack();

}



try{

    $sQuery = $db->prepare("UPDATE `sneakers` SET price = price+1000");

    $sQuery->execute();
    if($sQuery->rowCount()){

        echo '{"status":1,"message":"correct second"}';
        exit;
    };
    $db->rollBack();

  }catch(MongoException $e){
      echo "error $e";
      $db->rollBack();

  }



  try{

    $sQuery = $db->prepare("DELETE * FROM sneakers WHERE price > 1500");

    $sQuery->execute();
    if(!$sQuery->rowCount()){
        $db->rollBack();
        echo '{"status":0,"message":"error second"}';
        exit;
    };

    $db->commit();
    echo '{"status":1,"message":"correct second"}';
    exit;

  }catch(MongoException $e){
      echo "error $e";
      $db->rollBack();

  }