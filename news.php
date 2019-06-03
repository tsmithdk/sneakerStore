<?php
$sLinkToCss = 'news.css';
require_once __DIR__.'/components/top.php';
// ini_set('display_errors', 1);


try{
  require_once __DIR__.'/sqlite/sqlite-database.php';
  $sQuery = $db->prepare('SELECT * FROM news');
  $sQuery->execute();
  // Array
  $aAllNews = $sQuery->fetchAll();

?>
<div id="containerNews">
  <h1>News</h1>
<div id="wrapperNews">
    <?php

    foreach($aAllNews as $aNews){

    echo " <div class='newsRow' id='".$aNews['news_id']."'>
            <a href='single-news.php?news_id=".$aNews['news_id']."'>
                <div class='newsItem'><img src=".$aNews['image']." alt='sneaker'></div>
                </a>
                <div class='newsItem title'>".$aNews['title']."</div>
                <div class='newsItem date'>".$aNews['published_date']."</div>
            </div>
            "
            ;
    }
    ?>

</div>
</div>

<?php

}catch(PDOException $ex){
  echo "Sorry, system is updating ...";
}
?>




<?php require_once __DIR__.'/components/bottom.php'; ?>