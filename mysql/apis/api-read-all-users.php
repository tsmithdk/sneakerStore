<?php
require_once __DIR__.'/../mysql-database.php';


// echo $_POST['txtReleaseDate'];
try{

        $sQuery = $db->prepare("SELECT `user_id`, `name`, `last_name`, `email`, `newsletter`, `admin` FROM `users`");


        $sQuery->execute();
        $aUsers=$sQuery->fetchAll();

        echo json_encode($aUsers);


}catch( PDOException $e ){
  echo '{"status":0, "message":"error to signUp", "code":"001"'.$e.', "line":'.__LINE__.'}';
}

