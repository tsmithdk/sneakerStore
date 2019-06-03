<?php
require_once __DIR__.'/../mysql-database.php';
$sSearch = $_GET['sSearch'];
// Search for sneaker name
try{

        $sQuery = $db->prepare('SELECT * FROM sneakers WHERE sneaker_name LIKE "%":sSearch"%"');
        $sQuery->bindValue(':sSearch', $sSearch);
        $sQuery->execute();
        $aSneakers=$sQuery->fetchAll();

        echo json_encode($aSneakers);


}catch( PDOException $e ){
  echo '{"status":0, "message":"error to signUp", "code":"001"'.$e.'}';
}
