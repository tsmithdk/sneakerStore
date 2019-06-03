<?php
// ini_set('display_errors', 1);
session_start();
require_once __DIR__.'/../mysql-database.php';

$sOrderId = $_POST['orderId'];

try{
    $sQuery = $db->prepare("DELETE FROM `shopping_cart` WHERE `order_id` = :sOrderId");

$sQuery->bindValue(':sOrderId',$sOrderId );
$sQuery->execute();
if( !$sQuery->rowCount() ){
    echo '{"status":0, "message":"could not remove item from shopping cart"}';
    exit;
  }
  echo '{"status":1, "message":"item from shopping cart is now removed"}';

}catch(PDOException $ex){
    echo '{"status":0, "message":"error to display shopping cart", "code":"001"'.$ex.'}';
}



