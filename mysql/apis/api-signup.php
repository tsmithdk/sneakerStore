<?php
require_once __DIR__.'/../mysql-database.php';
// $name = $_POST['sName'];
// echo $name;


try{
  $sQuery = $db->prepare('
  INSERT INTO users
  VALUES (null, :sName, :sLastName, :sAddress, :sCity, :iZipcode, :sEmail, :sPassword, :iNewsletter, "0")
  ');

  $sQuery->bindValue(':sName', $_POST['sName']);
  $sQuery->bindValue(':sLastName', $_POST['sLastName']);
  $sQuery->bindValue(':sAddress', $_POST['sAddress']);
  $sQuery->bindValue(':sCity', $_POST['sCity']);
  $sQuery->bindValue(':iZipcode', $_POST['iZipcode']);
  $sQuery->bindValue(':sEmail', $_POST['sEmail']);
  $sQuery->bindValue(':sPassword', $_POST['sPassword']);
 
  $sQuery->bindValue(':iNewsletter', $_POST['iNewsletter']);
  
  $sQuery->execute();
  if( $sQuery->rowCount() ){
    echo '{"status":1, "message":"signup success"}';
    exit;
  }
  echo '{"status":0, "message":"error"}';
}catch( PDOException $e){
  echo '{"status":0, "message":"error", "code":"001", "line":'.$e.' }';

}

