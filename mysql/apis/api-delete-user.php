<?php

require_once __DIR__.'/../mysql-database.php';

try{

    $sQuery = $db->prepare('DELETE FROM users WHERE user_id = :iUserId');
    $sQuery->bindValue(':iUserId', $_GET['id']);
    $sQuery->execute();
    if( !$sQuery->rowCount() ){
      echo '{"status":0, "message":"could not delete post"}';
      exit;
    }
    echo '{"status":1, "message":"post deleted"}';

  }catch(PDOException $ex){
    echo '{"status":0, "message":"exception"}';
  }