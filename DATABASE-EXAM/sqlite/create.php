<?php
require_once __DIR__.'/connect.php';


$sTitle = "title";
$sContent ="CONTENT";
$sImage = "http://img.jpg";
$sPublish_Date = "2018-12-04";
try{

        $sQuery = $db->prepare("INSERT INTO news
        VALUES (null,:sTitle ,:sContent,:sImage,:sPublish_Date)");


        $sQuery->bindValue(':sTitle', $sTitle);
        $sQuery->bindValue(':sContent', $sContent);
        $sQuery->bindValue(':sImage', $sImage);
        $sQuery->bindValue(':sPublish_Date', $sPublish_Date);
        $sQuery->execute();
        if( $sQuery->rowCount()){
          echo '{"status":1, "message":"successful creation"}';
          exit;
        }
        echo '{"status":0, "message":"error"}';
}catch( PDOException $e ){
  echo '{"status":0, "message":"error to create", "code":"001"'.$e.', "line":'.__LINE__.'}';
}



