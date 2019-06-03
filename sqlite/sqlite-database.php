<?php
try{
  $db = new PDO ('sqlite:'.__DIR__.'/sneakers_db.db');
  $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch( PDOException $e){
    var_dump($e);
    echo '{"status":"err","message":"cannot connect to database"}';
    exit();
}
