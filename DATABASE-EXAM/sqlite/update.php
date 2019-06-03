<?php
require_once __DIR__.'/connect.php';

$sId = 1;
$sTitle = "title";
$sContent ="CONTENT";
$sImage = "http://img.jpg";
$sPublish_Date = "2018-12-04";


try{
    $sQuery = $db->prepare("UPDATE news
                            SET title = :sTitle,
                            content = :sContent,
                            img = :sImage,
                            publish_date = :sPublishedDate
                            WHERE news_id = :sId");

    $sQuery->bindValue(':sId', $sId);
    $sQuery->bindValue(':sTitle', $sTitle);
    $sQuery->bindValue(':sContent', $sContent);
    $sQuery->bindValue(':sImage', $sImage);
    $sQuery->bindValue(':sPublishedDate', $sPublish_Date);
    $sQuery->execute();
    if( !$sQuery->rowCount() ){
      echo '{"status":0, "message":"could not insert data"}';
      exit;
    }

    echo '{"status":1, "message":"news updated"}';

  }catch(PDOException $ex){
    echo '{"status":0, "message":"exception"}';
  }