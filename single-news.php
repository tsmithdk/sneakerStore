<?php
$sLinkToCss = 'news.css';
require_once __DIR__.'/components/top.php';
// ini_set('display_errors', 1);

require_once 'sqlite/sqlite-database.php';
$sId = $_GET['news_id'];

try{
  $sQuery = $db->prepare("SELECT * FROM news WHERE news_id=$sId");
  $sQuery->execute();

  $aSingleNews = $sQuery->fetchAll();

    echo "<div class='newsArticle'>
    <div class='wrapperArticle'>
    <h1 class='headline'>".$aSingleNews[0]['title']."</h1>
    <h2 class='date'>".$aSingleNews[0]['published_date']."</h2>
    <img src=".$aSingleNews[0]['image']." alt='sneaker'>
    <p class='content'>
    ".$aSingleNews[0]['content']."
    </p>
    </div>
    </div> ";



}catch(PDOException $ex){
  echo "Sorry, system is updating ...";
}
?>


<?php require_once __DIR__.'/components/bottom.php'; ?>