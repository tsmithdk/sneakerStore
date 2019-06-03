<?php
require_once __DIR__.'/connect.php';

try{
    $sQuery = $db->prepare('SELECT * FROM news');
    $sQuery->execute();

    $aRows = $sQuery->fetchAll();

    //print_r($aRows);
    echo json_encode($aRows);

}catch(PDOException $ex){
    echo 'Mistake, fix it';
    exit;
  }

