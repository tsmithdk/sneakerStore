<?php
require_once __DIR__.'/connect.php';

$sBrandName = "BrandXXX";

$sSneakerName = "sneakeRXXX";
$sGender = 1;
$sDescription = "blablablablabla";
$sPrice = 3000;
$sDiscount = 0;


$sSize = 50.5;

$db->beginTransaction();
/**************** INSERT BRAND *******************/
try{

      $sQuery = $db->prepare("INSERT INTO brand_names
        VALUES (null, :sBrandName)");
        $sQuery->bindValue(':sBrandName', $sBrandName);
        $sQuery->execute();
        $iBrandId = $db->lastInsertId();

        echo '{"status":1, "message":"brand inserted succesfully"}';
}catch( PDOException $e ){
  echo '{"status":0, "message":"error inserting Brand", "code":"001"'.$e.', "line":'.__LINE__.'}';
  $db->rollBack(); 
  exit;
}

/**************** INSERT SNEAKER *******************/
try{

  $sQuery = $db->prepare("INSERT INTO sneakers
    VALUES (null, :sBrandNameFK, :sSneakerName, :sGender, :sDescription, :sPrice)");


    $sQuery->bindValue(':sBrandNameFK', $iBrandId);
    $sQuery->bindValue(':sSneakerName', $sSneakerName);
    $sQuery->bindValue(':sGender', $sGender);
    $sQuery->bindValue(':sDescription', $sDescription);
    $sQuery->bindValue(':sPrice', $sPrice);
    $sQuery->execute();
    $iSneakerId = $db->lastInsertId();
echo $iSneakerId;
    echo '{"status":1, "message":"Sneakers inserted succesfully"}';
}catch( PDOException $e ){
echo '{"status":0, "message":"error inserting Sneakers", "code":"001"'.$e.', "line":'.__LINE__.'}';
$db->rollBack(); 
exit;
}

/**************** INSERT SIZES *******************/


try{
  $sQuery = $db->prepare("INSERT INTO sizes
    VALUES (null, :sSneakerFK, :sSize)");

    $sQuery->bindValue(':sSneakerFK', $iSneakerId);
    $sQuery->bindValue(':sSize', $sSize);
    $sQuery->execute();
    $iBrandId = $db->lastInsertId();
    if(!$sQuery->rowCount()){
      $db->rollBack();
      exit;
  }
    echo '{"status":1, "message":"Size inserted succesfully"}';
    $db->commit();
    exit;
}catch( PDOException $e ){
echo '{"status":0, "message":"error inserting Size", "code":"001"'.$e.', "line":'.__LINE__.'}';
$db->rollBack(); 
exit;
}

