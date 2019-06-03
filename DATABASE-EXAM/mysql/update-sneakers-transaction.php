<?php
ini_set('display_errors', 1);
require_once __DIR__.'/connect.php';


$db->beginTransaction();
$iBrandID = 1;
$sBrandName = "Nike";

$iSneakerID = 2;
$sName = "SneakerX1X";
$sGender = 0;
$sDescription = "blablablablabla";
$sPrice = 2500;
$sDiscount = 0;

$iSizeId = 2;
$sSize = 50.0;


/**************** UPDATE BRAND *******************/
try{
  $sQuery = $db->prepare("UPDATE brand_names SET brand_name =:sBrandName WHERE brand_name_id= LAST_INSERT_ID(:iBrandID)");

  $sQuery->bindValue(':sBrandName', $sBrandName);
  $sQuery->bindValue(':iBrandID', $iBrandID);
  $sQuery->execute();
  $iBrandUPDATEID = $db->lastInsertId();
  if(!$sQuery->rowCount()){
    $db->rollBack();
    echo '{"status":0, "message":"error to Update", "code":"000"}';
    exit;
  }
  echo '{"status":1, "message":"half success "}';

}catch( PDOException $e ){
  echo '{"status":0, "message":"error to Update", "code":"001"'.$e.'}';
  $db->rollBack();
  exit;
 }



/**************** UPDATE SNEAKERS *******************/
try{

      $sQuery = $db->prepare("UPDATE sneakers
                              SET
                              sneakers.brand_name_fk = :iSneakersBrandID,
                              sneakers.sneaker_name = :sSneakersName,
                              sneakers.gender = :sSneakersGender,
                              sneakers.description = :sSneakersDescription,
                              sneakers.price = :sSneakersPrice

                              WHERE sneakers.sneaker_id = LAST_INSERT_ID(:iSneakerId)");


$sQuery->bindValue(':iSneakerId', $iSneakerID);
$sQuery->bindValue(':sSneakersName', $sName);
$sQuery->bindValue(':iSneakersBrandID', $iBrandUPDATEID );
$sQuery->bindValue(':sSneakersGender', $sGender);
$sQuery->bindValue(':sSneakersDescription', $sDescription);
$sQuery->bindValue(':sSneakersPrice', $sPrice);
$sQuery->execute();
$iSneakerIDforFK = $db->lastInsertId();
if(!$sQuery->rowCount()){
  $db->rollBack();
  exit;
}
echo '{"status":1, "message":"full success"}';
}catch( PDOException $e ){
  echo '{"status":0, "message":"error to Update", "code":"001"'.$e.'}';
  $db->rollBack();
  exit;
}



/**************** UPDATE SIZES *******************/

//$iSizeId = 4;
//$sSize = 36.3;
//$iSneakerID

try{
  $sQuery = $db->prepare("UPDATE `sizes` SET `sneaker_fk`= :iSneakerFK ,`size`=:sSize WHERE `size_id`=:iSizeId");
  $sQuery->bindValue(':iSizeId', $iSizeId);
  $sQuery->bindValue(':iSneakerFK', $iSneakerIDforFK);
  $sQuery->bindValue(':sSize', $sSize);
  $sQuery->execute();
  echo $sQuery->rowCount();
  if(!$sQuery->rowCount()){
    $db->rollBack();
    exit;
  }
  echo '{"status":1, "message":"full full success"}';
  $db->commit();
  exit;

}catch( PDOException $e ){
  echo '{"status":0, "message":"error to Update", "code":"002"'.$e.'}';
  $db->rollBack(); // don't add anything
  exit;
}

