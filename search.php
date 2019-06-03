<?php
$sLinkToCss = 'search.css';
// ini_set('display_errors', 1);
require_once __DIR__.'/components/top.php';
require_once __DIR__.'/mysql/mysql-database.php';
$sSearch = $_GET['search'];
// Search for sneaker name

try{

    $sQuery = $db->prepare("SELECT sneakers.sneaker_id, brand_names.brand_name, sneakers.sneaker_name, sneakers.gender, sneakers.price, 
    (CASE WHEN gender = 1 THEN 'Mens'
         WHEN gender = 0 THEN 'Womens' END) AS gender,
         images.path
         FROM sneakers 
        INNER JOIN brand_names ON
        brand_name_id = brand_name_fk
        INNER JOIN images ON
        images.sneaker_fk = sneakers.sneaker_id
        WHERE sneaker_name LIKE '%$sSearch%'");

    $sQuery->execute();
    $aSneakers=$sQuery->fetchAll();

    echo "<div class='wrapperSearch' ><h1>Search for sneaker</h1><form id='frmSearchSite'>
    <input type='text' placeholder='Search..' name='search'>
    <button class='btnSearchSite' type='button'><i class='fas fa-search'></i></button>
    </form></div>
    ";
    
    echo "<div class='wrapperResult'> <div id='searchResult'>";
    foreach ($aSneakers as $value) {
        echo "
        <div id='$value[sneaker_id]' class='searchedSneaker'> 
        <div class='image'><img src='$value[path]' alt='$value[sneaker_name]'> </div>
        <div class='brand'>$value[brand_name] </div>
        <div class='sneakerName'>$value[sneaker_name] </div>
        <div class='gender'>$value[gender] </div>
        <div class='price'>$value[price] DKK</div>
        </div>
        ";
    }
    echo "</div></div>";

}catch( PDOException $e ){
  echo '{"status":0, "message":"error to signUp", "code":"001"'.$e.'}';
}



 require_once __DIR__.'/components/bottom.php'; ?>
