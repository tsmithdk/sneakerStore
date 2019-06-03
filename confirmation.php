<?php
session_start();
require_once __DIR__.'/components/top.php';
ini_set('display_errors', 1);
?>
<h1>Current Confirmed Orders</h1>
<div id="currentProducts"></div>


<?php require_once __DIR__.'/components/bottom.php'; ?>

<script>

$(document).ready(function(){
   $.ajax({
       url: 'mysql/apis/api-show-orders.php',
       dataType: 'JSON'
   }).done(function(jData){
    console.log(jData)
       
// Show current confirmed orders
    for (var i=0; i<jData.length; i++ ){
       // console.log(jData[i])
 
        $('#currentProducts').prepend(`
        <div data-id="${jData[i]['order_id']}" class="item">
           <div id="${jData[i]['sneaker_fk']}">${jData[i]['brand_name']} ${jData[i]['sneaker_name']}</div>
           <div>Size: ${jData[i]['selected_size']}</div>
           <div>Order confirmed</div>
           
        </div>`)
       }
       
      
    })
})
    </script>