<?php
require_once __DIR__.'/connect.php';
$sName = "v";
$sLastName = "VV";
$sAddress = "myAddress";
$sCity = "myCity";
$iZipcode ="2200";
$sEmail = "v@v.com";
$sPassword = "123456";
$iNewsletter = 1;

try{
  $sQuery = $db->prepare('
  INSERT INTO users
  VALUES (null, :sName, :sLastName, :sAddress, :sCity, :iZipcode, :sEmail, :sPassword, :iNewsletter, "0")
  ');

  $sQuery->bindValue(':sName', $sName);
  $sQuery->bindValue(':sLastName', $sLastName);
  $sQuery->bindValue(':sAddress', $sAddress);
  $sQuery->bindValue(':sCity', $sCity);
  $sQuery->bindValue(':iZipcode', $iZipcode);
  $sQuery->bindValue(':sEmail', $sEmail);
  $sQuery->bindValue(':sPassword', $sPassword);

  $sQuery->bindValue(':iNewsletter', $iNewsletter);

  $sQuery->execute();
  if( $sQuery->rowCount() ){
    echo '{"status":1, "message":"signup success"}';
    exit;
  }
  echo '{"status":0, "message":"error"}';
}catch( PDOException $e){
  echo '{"status":0, "message":"error", "code":"001", "line":'.$e.' }';

}

