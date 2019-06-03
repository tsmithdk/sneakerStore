<?php
require_once __DIR__.'/../mysql-database.php';

$db->beginTransaction();

try{    
    $sQuery = $db->prepare("INSERT INTO sneakers
    VALUES (null, :brandName, :sneakerName)
    
    
    ");



}catch(PDOException $ex){
    echo '{"status":0, "message":"error to signUp", "code":"001"'.$e.'}';
    $db-rollBack();
    exit;
}

