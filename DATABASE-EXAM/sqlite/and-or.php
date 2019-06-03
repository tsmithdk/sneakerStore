<?php
require_once __DIR__.'/connect.php';

try{

        $sQuery = $db->prepare("SELECT news.news_id, news.title FROM news
                                where img ='http:image0.png' AND (news_id > 5 OR news_id < 10)");

        $sQuery->execute();
        $aSneakers=$sQuery->fetchAll();

        echo json_encode($aSneakers);


}catch( PDOException $e ){
  echo '{"status":0, "message":"error to signUp", "code":"001"'.$e.'}';
}

