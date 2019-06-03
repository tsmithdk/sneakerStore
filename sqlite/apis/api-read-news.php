<?php

require_once __DIR__.'/../sqlite-database.php';

try{
    $sQuery = $db->prepare('SELECT * FROM news');


    $sQuery->execute();
    //get back an Array
    $aRows = $sQuery->fetchAll();
    echo json_encode($aRows);

}catch(PDOException $ex){
    echo 'Mistake, fix it';
    exit;
  }

