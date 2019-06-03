<?php
require_once __DIR__.'/connect.php';
$sEmail = "v@v.com";
$sPassword = "123456";

try{
  $sQuery = $db->prepare('
    SELECT * FROM users WHERE email = :sEmail AND
    password = :sPassword LIMIT 1
  ');
  $sQuery->bindValue(':sEmail', $sEmail);
  $sQuery->bindValue(':sPassword', $sPassword);
  $sQuery->execute();
  $aUsers = $sQuery->fetchAll();
  if( $sQuery->rowCount() ){
    echo '{"status":1, "message":"login success"}';
    exit;
  }
  /* if( count($aUsers) ){
    session_start();
    $_SESSION['jUser'] = $aUsers[0];
    echo '{"status":1, "message":"login success"}';
    exit;
  } */
  echo '{"status":0, "message":"cannot login"}';

}catch(PDOException $exception){
  echo '{"status":0, "message":"cannot login"}';
}








