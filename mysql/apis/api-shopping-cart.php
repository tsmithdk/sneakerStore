<?php
ini_set('display_errors', 1);
session_start();
require_once __DIR__.'/../mysql-database.php';


$sUserId = $_SESSION['jUser']['user_id'];

try{

    $sQuery = $db->prepare("SELECT shopping_cart.sneaker_fk, order_id ,brand_names.brand_name, sneakers.sneaker_name, selected_size, confirmed
    FROM shopping_cart
    INNER JOIN users
    ON shopping_cart.user_fk = users.user_id
    INNER JOIN sneakers
    ON shopping_cart.sneaker_fk = sneakers.sneaker_id
    INNER JOIN brand_names
    ON brand_names.brand_name_id = sneakers.brand_name_fk
    WHERE user_id = :sUserId and confirmed = 0");

   /*  $sQuery = $db->prepare("SELECT order_id ,brand_names.brand_name, sneakers.sneaker_name, selected_size
                            FROM shopping_cart
                            INNER JOIN users
                            ON shopping_cart.user_fk = users.user_id
                            INNER JOIN sneakers
                            ON shopping_cart.sneaker_fk = sneakers.sneaker_id
                            INNER JOIN brand_names
                            ON brand_names.brand_name_id = sneakers.brand_name_fk
                            WHERE user_id = :sUserId"); */


$sQuery->bindValue(':sUserId',$sUserId );
$sQuery->execute();
$aShoppingCart=$sQuery->fetchAll();


echo json_encode($aShoppingCart);


}catch(PDOException $ex){
    echo '{"status":0, "message":"error to display shopping cart", "code":"001"'.$ex.'}';
}