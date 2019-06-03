<?php
require_once __DIR__.'/../mysql-database.php';

try{
  // $sQuery = $db->prepare('
  //   SELECT * FROM users WHERE email = :sEmail AND
  //   password = :sPassword LIMIT 1
  // ');
  $sQuery = $db->prepare('CALL login(:sEmail, :sPassword)');
  $sQuery->bindValue(':sEmail', $_POST['txtEmail']);
  $sQuery->bindValue(':sPassword', $_POST['txtPassword']);
  $sQuery->execute();
  $aUsers = $sQuery->fetchAll();
  if( count($aUsers) ){
    session_start();
    $_SESSION['jUser'] = $aUsers[0];
    echo '{"status":1, "message":"login success"}';
    exit;
  }
  echo '{"status":0, "message":"cannot login"}';

}catch(PDOException $exception){
  echo '{"status":0, "message":"cannot login"}';
}








