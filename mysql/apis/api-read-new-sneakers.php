<?php
require_once __DIR__.'/../mysql-database.php';

try{

        $sQuery = $db->prepare("SELECT `sneakerstore`.`sneakers`.`sneaker_id` 
        AS `sneaker_id`,`sneakerstore`.`sneakers`.`sneaker_name` AS `sneaker_name`,
        `sneakerstore`.`sneakers`.`gender` AS `gender`,
        `sneakerstore`.`sneakers`.`description` AS `description`,
        `sneakerstore`.`sneakers`.`price` AS `price`,
        `sneakerstore`.`brand_names`.`brand_name` AS `brand_name`,
        `sneakerstore`.`images`.`image_id` AS `image_id`,
        `sneakerstore`.`images`.`path` AS `image_path` 
        from ((`sneakerstore`.`sneakers` 
        join `sneakerstore`.`brand_names` 
        on((`sneakerstore`.`sneakers`.`brand_name_fk` = `sneakerstore`.`brand_names`.`brand_name_id`))) 
        join `sneakerstore`.`images` 
        on((`sneakerstore`.`sneakers`.`sneaker_id` = `sneakerstore`.`images`.`sneaker_fk`))) 
        ORDER BY sneakerStore.sneakers.sneaker_id DESC LIMIT 4");

        $sQuery->execute();
        $aSneakers=$sQuery->fetchAll();

        echo json_encode($aSneakers);


}catch( PDOException $e ){
  echo '{"status":0, "message":"error to signUp", "code":"001"'.$e.'}';
}

