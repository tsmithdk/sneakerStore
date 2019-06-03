<?php

require_once __DIR__.'/../sqlite-database.php';

try{

    $sQuery = $db->prepare('DELETE FROM news WHERE news_id = :iNewsId');
    $sQuery->bindValue(':iNewsId', $_GET['id']);
    $sQuery->execute();
    if( !$sQuery->rowCount() ){
      echo '{"status":0, "message":"could not delete post"}';
      exit;
    }
    echo '{"status":1, "message":"post deleted"}';
  
  }catch(PDOException $ex){
    echo '{"status":0, "message":"exception"}';
  }