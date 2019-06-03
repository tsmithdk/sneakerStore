<?php
session_start();
require_once __DIR__.'/../mysql-database.php';

try{

    $sQuery = $db->prepare('UPDATE `users` SET
    `newsletter`= 1
    WHERE `user_id` = :iUserId');

$sQuery->bindValue(':iUserId',  $_SESSION['jUser']['user_id']);
$sQuery->execute();
if( !$sQuery->rowCount() ){
echo '{"status":0, "message":"could not insert data"}';
exit;
}

echo '{"status":1, "message":"user subscribed"}';

}catch(PDOException $ex){
echo '{"status":0, "message":"exception"}';
}


/////////////////////