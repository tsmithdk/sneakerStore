<?php
session_start();

require_once __DIR__.'/../mysql-database.php';


// echo $_POST['txtReleaseDate'];
try{

        $sQuery = $db->prepare("SELECT `name`, `last_name`,
                                `address`,`city`,
                                `zipcode`,`email`,
                                `password`, `newsletter` FROM `users` WHERE user_id = :iUserId");


        $sQuery->bindValue(':iUserId',  $_SESSION['jUser']['user_id']);

        $sQuery->execute();
        $aUsers=$sQuery->fetchAll();

        echo json_encode($aUsers);


}catch( PDOException $e ){
  echo '{"status":0, "message":"error to signUp", "code":"001"'.$e.', "line":'.__LINE__.'}';
}

