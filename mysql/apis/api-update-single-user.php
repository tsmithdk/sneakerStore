<?php
session_start();

require_once __DIR__.'/../mysql-database.php';


try{

    $sQuery = $db->prepare('UPDATE `users` SET
                    `name` = :sName,
                    `last_name`=:sLastName,
                    `address`=:sAddress,
                    `city`=:sCity,
                    `zipcode`=:sZipCode,
                    `email`=:sEmail,
                    `password`=:sPassword,
                    `newsletter`=:iNewsletter
                    WHERE `user_id` = :iUserId');

$sQuery->bindValue(':iUserId',  $_SESSION['jUser']['user_id']);
$sQuery->bindValue(':sName', $_POST['sName']);
$sQuery->bindValue(':sLastName', $_POST['sLastName']);
$sQuery->bindValue(':sAddress', $_POST['sAddress']);
$sQuery->bindValue(':sCity', $_POST['sCity']);
$sQuery->bindValue(':sZipCode', $_POST['iZipcode']);
$sQuery->bindValue(':sEmail', $_POST['sEmail']);
$sQuery->bindValue(':sPassword', $_POST['sPassword']);
$sQuery->bindValue(':iNewsletter', $_POST['iNewsletter']);
$sQuery->execute();
    if( !$sQuery->rowCount() ){
      echo '{"status":0, "message":"could not insert data"}';
      exit;
    }

    echo '{"status":1, "message":"user updated"}';

  }catch(PDOException $ex){
    echo '{"status":0, "message":"exception"}';
  }