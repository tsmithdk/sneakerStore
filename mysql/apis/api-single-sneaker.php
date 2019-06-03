<?php
ini_set('display_errors', 1);
session_start();

require_once __DIR__.'/../mysql-database.php';

$sId = $_GET['sneaker_id'];

try{

  $sQuery = $db->prepare("SELECT sneakers.sneaker_id,sneakers.sneaker_name,
                          sizes.qty, sizes.size,
                          (CASE WHEN sneakers.gender = 0 then 'Women'
                          when sneakers.gender = 1 then 'Men' END)AS gender,
                          sneakers.description, sneakers.price,
                          GROUP_CONCAT(DISTINCT(images.path)) AS image_path,
                          brand_names.brand_name
                          FROM sneakers
                          JOIN
                          (SELECT GROUP_CONCAT(sizes.qty) AS qty,
                          GROUP_CONCAT(sizes.size) AS size,
                          sizes.sneaker_fk AS sneaker_fk
                          FROM sizes
                          WHERE sizes.sneaker_fk = $sId )
                          AS sizes
                          ON sizes.sneaker_fk = sneakers.sneaker_id
                          INNER JOIN images
                          ON images.sneaker_fk = sneakers.sneaker_id
                          INNER JOIN brand_names
                          ON brand_names.brand_name_id =sneakers.brand_name_fk
                          WHERE sneakers.sneaker_id = $sId");


 /*  $sQuery = $db->prepare("SELECT sneakers.sneaker_id,sneakers.sneaker_name,
                          (CASE WHEN sneakers.gender = 0 then 'Women'
                          when sneakers.gender = 1 then 'Men' END) AS gender,
                          sneakers.description, sneakers.price,
                          GROUP_CONCAT(sizes.size),
                          GROUP_CONCAT(DISTINCT(images.path)),
                          brand_names.brand_name
                          FROM sneakers
                          INNER JOIN sizes
                          ON sizes.sneaker_fk = sneakers.sneaker_id
                          INNER JOIN images
                          ON images.sneaker_fk = sneakers.sneaker_id
                          INNER JOIN brand_names
                          ON brand_names.brand_name_id = sneakers.brand_name_fk
                          WHERE sneakers.sneaker_id = $sId");
 */

        $sQuery->execute();

        $aSneakers=$sQuery->fetchAll();

        echo json_encode($aSneakers);


}catch( PDOException $e ){
  echo '{"status":0, "message":"error to signUp", "code":"001"'.$e.'}';
}

//}

?>




