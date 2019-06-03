<?php
require_once __DIR__.'/../sqlite-database.php';


// echo $_POST['txtReleaseDate'];
try{
 
        $sQuery = $db->prepare("INSERT INTO news
        VALUES (null,:sTitle ,:sContent,:sImage,:sPublish_Date)");


        $sQuery->bindValue(':sTitle', $_POST['txtTitle']);
        $sQuery->bindValue(':sContent', $_POST['txtContent']);
        $sQuery->bindValue(':sImage', $_POST['txtImage']);
        $sQuery->bindValue(':sPublish_Date', $_POST['txtReleaseDate']);
        $sQuery->execute();
        if( $sQuery->rowCount()){
          echo '{"status":1, "message":"success to signUp"}';
          exit;
        }
        echo '{"status":0, "message":"error"}';
}catch( PDOException $e ){
  echo '{"status":0, "message":"error to signUp", "code":"001"'.$e.', "line":'.__LINE__.'}';
}

