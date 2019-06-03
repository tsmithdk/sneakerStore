<?php
ini_set('display_errors', 1);
session_start();

require_once __DIR__.'/../mysql-database.php';

$user_fk = $_SESSION['jUser']['user_id'];
// echo json_encode($user_fk);

try{
    $sQuery=$db->prepare("SELECT * FROM `shopping_cart` 
    INNER JOIN sneakers ON
    sneaker_fk = sneaker_id
    INNER JOIN brand_names ON
    brand_name_fk = brand_name_id
    where user_fk=:user_fk and confirmed=1");

          $sQuery->bindValue(':user_fk', $user_fk);

          $sQuery->execute();
          $atest = $sQuery->fetchAll();

          echo json_encode($atest);

        
        //   echo '{"status":1, "message":"a bit of success "}';


}catch (PDOException $e){
         $db->rollBack();
          var_dump($e);
          exit;
          }
