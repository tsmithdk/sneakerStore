<?php

require_once __DIR__.'/connect.php';

$sBrandName = "BrandXXX";

try{

    $sQuery = $db->prepare('DELETE FROM brand_names WHERE brand_name = :sBrandName');
    $sQuery->bindValue(':sBrandName', $sBrandName);
    $sQuery->execute();
    if( !$sQuery->rowCount() ){
      echo '{"status":0, "message":"could not delete Brand"}';
      exit;
    }
    echo '{"status":1, "message":"Brand deleted"}';

  }catch(PDOException $ex){
    echo '{"status":0, "message":"exception"}';
  }

