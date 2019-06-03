<?php
ini_set('display_errors', 1);
try{
  $sUserName = 'root';
  $sPassword = 'root';
  $sConnection = "mysql:host=localhost; dbname=sneakerStore; charset=utf8";

  $aOptions = array(
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  );
  $db = new PDO( $sConnection, $sUserName, $sPassword, $aOptions );

}catch( PDOException $e){
  echo '{"status":"err","message":"cannot connect to database"}';
  exit();
}
