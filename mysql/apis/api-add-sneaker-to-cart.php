<?php
session_start();
$user = $_SESSION['jUser'];
if (!isset($user)){
  echo '{"status":0, "message":"You have to log in to make a purchase", "code":"001"'.$e.'}';
  exit;
}
require_once __DIR__.'/../mysql-database.php';
$sSneakerId = $_POST['sneaker_id'];
$sSize = $_POST['sneaker_size'];
$jUser = $_SESSION['jUser']['user_id'];
// $cartObject->sneaker_id=$sSneakerId; 
// $cartObject->size=$sSize; 
// $cartObject->user_id=$jUser; 
// $jCartObject= json_encode($cartObject);
// echo $jCartObject;

try{

      $sQuery = $db->prepare("INSERT INTO shopping_cart VALUES (null,:sUserId,:sSneakerId,:sSize,0)");
        $sQuery->bindValue(':sUserId', $jUser);
        $sQuery->bindValue(':sSneakerId', $sSneakerId);
        $sQuery->bindValue(':sSize', $sSize);
        $sQuery->execute();
        

        if( $sQuery->rowCount() ){
            echo '{"status":1, "message":"order added to shopping cart"}';
            exit;
          }
          echo '{"status":0, "message":"error"}';
}catch( PDOException $e){
          echo '{"status":0, "message":"error", "code":"001", "line":'.$e.' }';
        
}




