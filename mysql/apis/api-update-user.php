<?php

require_once __DIR__.'/../mysql-database.php';


try{

    $sQuery = $db->prepare('UPDATE `users` SET `admin`=:iAdmin WHERE `user_id`=:iUserId');

      $sQuery->bindValue(':iUserId', $_POST['id']);
      $sQuery->bindValue(':iAdmin', $_POST['iAdmin']);

    $sQuery->execute();
    if( !$sQuery->rowCount() ){
      echo '{"status":0, "message":"could not insert data"}';
      exit;
    }

    echo '{"status":1, "message":"user updated"}';

  }catch(PDOException $ex){
    echo '{"status":0, "message":"exception"}';
  }