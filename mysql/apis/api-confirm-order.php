<?php
ini_set('display_errors', 1);
session_start();

require_once __DIR__.'/../mysql-database.php';
$db->beginTransaction();

$aOrders = $_POST['aOrders'];
$aSneakerFk = $_POST['aSneakerFk'];
$aSelectedSize = $_POST['aSelectedSize'];
//  $order = $aOrders[0];
//  $aSize = $aSelectedSize[0];
//  $aConfirmSize = $aSelectedSize[0];
//  $sneaker_fk = $aSneakerFk[0];
//  $confirmSneaker_fk = $aSneakerFk[0];
//  $order = 41;
//  $aSize = 46.0;
//  $aConfirmSize = 46.0;
//  $sneaker_fk = 1;
//  $confirmSneaker_fk = 1;

// LOOP FOR MULTIPLE ORDERS AT ONCE
$j = sizeof($aSneakerFk);
// echo json_encode($j);
for($i = 0; $i < $j ; $i++) {
// echo json_encode('x');
 $order = $aOrders[$i];
 $confirmOrder = $aOrders[$i];
 $aSize = $aSelectedSize[$i];
 $aConfirmSize = $aSelectedSize[$i];
 $sneaker_fk = $aSneakerFk[$i];
 $confirmSneaker_fk = $aSneakerFk[$i];


// try{
//     $sQuery=$db->prepare("SELECT shopping_cart.selected_size=:iSize, shopping_cart.sneaker_fk
//                             FROM shopping_cart
//                             where order_id = :order");

//           $sQuery->bindValue(':order', $order);
//           $sQuery->bindValue(':iSize', $aSize);

//           $sQuery->execute();
//           $atest = $sQuery->fetchAll();

//         //   echo json_encode($atest);

//           if(!$sQuery->rowCount()){
//             $db->rollBack();
//             echo '{"status":0, "message":"error to Update", "code":"000"}';
//             exit;
//           }
//         //   echo '{"status":1, "message":"a bit of success "}';


// }catch (PDOException $e){
//          $db->rollBack();
//           var_dump($e);
//           exit;
//           }


//second statement - check if the qty is more than 0
try{
    $sQuery=$db->prepare("SELECT sizes.size, sizes.qty, sizes.sneaker_fk,
                        (CASE WHEN sizes.qty > 0 THEN 1 WHEN sizes.qty < 0 THEN 0 END)AS qtyResult
                        FROM sizes
                        WHERE sizes.sneaker_fk= :sneaker_fk AND sizes.size = :size;
                        ");

        $sQuery->bindValue(':sneaker_fk', $sneaker_fk);
        $sQuery->bindValue(':size', $aSize);

        $sQuery->execute();
        $aSize=$sQuery->fetchAll();

        // echo json_encode($aSize);
        $bSizeQty = $aSize[0]['qtyResult'];
        if ($bSizeQty==0){
            $db->rollBack();
            echo '{"status":0, "message":"error, no stock left"}';
            exit;
        }
        if(!$sQuery->rowCount()){
        $db->rollBack();
        echo '{"status":0, "message":"error", "code":"000"}';
        exit;
        }
        // echo '{"status":1, "message":"half success "}';

    }catch (PDOException $e){
        $db->rollBack();
        var_dump($e);
        exit;
        }

//third statement - change qty by 1
try{
    $sQuery=$db->prepare("UPDATE sizes
                            SET sizes.qty = sizes.qty-1
                            WHERE sizes.sneaker_fk= $confirmSneaker_fk AND sizes.size=$aConfirmSize");
        $sQuery->execute();

        if(!$sQuery->rowCount()){
        $db->rollBack();
        echo '{"status":0, "message":"error", "code":"000"}';
        exit;
        }
    }catch (PDOException $e){
        $db->rollBack();
        var_dump($e);
        exit;
    }
    
    



//fourth statement - change confirmation to 1
try{
    $sQuery=$db->prepare("UPDATE shopping_cart
                            SET confirmed = 1
                            WHERE shopping_cart.order_id= $confirmOrder");
        $sQuery->execute();

        if(!$sQuery->rowCount()){
        $db->rollBack();
        echo '{"status":0, "message":"error", "code":"000"}';
        exit;
        }
    }catch (PDOException $e){
        $db->rollBack();
        var_dump($e);
        exit;
    }
}


echo '{"status":1, "message":"order confirmed"}';
$db->commit();
