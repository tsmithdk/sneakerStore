<?php
ini_set('display_errors', 1);

try{
    $dsn = 'sqlite:'.__DIR__.'/news.db';
    $db = new PDO( $dsn);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch( PDOException $e){
  var_dump($ex);
    echo '{"status":"err","message":"cannot connect to database"}';
    exit();
  }

