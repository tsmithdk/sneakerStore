<?php

require_once __DIR__.'/../sqlite-database.php';

// echo $_POST['id'];
// echo $_POST['txtTitle'];
// echo $_POST['txtImage'];
// echo $_POST['txtReleaseDate'];
// echo $_POST['txtContent'];
try{

    $sQuery = $db->prepare('UPDATE news
                            SET title = :sTitle,
                            content = :sContent,
                            image = :sImage,
                            published_date = :sPublishedDate
                            WHERE news_id = :sId');

      $sQuery->bindValue(':sId', $_POST['id']);
      $sQuery->bindValue(':sTitle', $_POST['txtTitle']);
      $sQuery->bindValue(':sContent', $_POST['txtContent']);
      $sQuery->bindValue(':sImage', $_POST['txtImage']);
      $sQuery->bindValue(':sPublishedDate', $_POST['txtReleaseDate']);
    $sQuery->execute();
    if( !$sQuery->rowCount() ){
      echo '{"status":0, "message":"could not insert data"}';
      exit;
    }

    echo '{"status":1, "message":"news updated"}';

  }catch(PDOException $ex){
    echo '{"status":0, "message":"exception"}';
  }