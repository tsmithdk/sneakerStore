<?php
session_start();
require_once __DIR__.'/components/top.php';
// ini_set('display_errors', 1);
?>
<div class="containerShoppingCart">
    <h2>Shopping Cart</h2>
    <div id="cart">
    <div id="cartProducts"></div>
    <button type="button" id="btnConfirm">Confirm order</button>
    </div>

</div>

<?php require_once __DIR__.'/components/bottom.php'; ?>
<script>

$(document).ready(function(){
   
        

    $.ajax({
        url: 'mysql/apis/api-shopping-cart.php',
        dataType: 'JSON'
    }).done(function(jData){
    //  console.log(jData);
        
//SHOW SELECTED ITEMS FROM single-sneaker.php
     for (var i=0; i<jData.length; i++ ){
        // console.log(jData[i])
       
     
            $('#cartProducts').prepend(`
        
         <div data-id="${jData[i]['order_id']}" class="item">
            <div id="${jData[i]['sneaker_fk']}">${jData[i]['brand_name']} ${jData[i]['sneaker_name']}</div>
            <div>Size: ${jData[i]['selected_size']}</div>
            <button type="button" class="btnDelete">Remove</button>
         </div>
        
         `)
     
     }

//CONFIRM ORDER
        $(document).on('click', '#btnConfirm', function(){
            var aOrders = []
            var aSneakerFk = []
            var aSelectedSize = []
            for (var i=0; i<jData.length; i++ ){
            aOrders.push(jData[i]['order_id'])
            aSneakerFk.push(jData[i]['sneaker_fk'])
            aSelectedSize.push(jData[i]['selected_size'])
            }
            // console.log(aOrders)
            $.ajax({
                url: 'mysql/apis/api-confirm-order.php',
                data: {aOrders:aOrders, aSneakerFk:aSneakerFk, aSelectedSize:aSelectedSize},
                method: 'POST',
                dataType: 'JSON'
            }).always(function(jData){
                if(jData.status==1){
                location.href='confirmation.php'
            }
                console.log(jData)
                if(jData.status==0){
                    $('#cartProducts').append(`<h2>Out of stock, please remove items</h2>`)
                }
            })
        })


})// END DONE

})//FUNCTION & READY


//remove item
$(document).on('click', '.btnDelete', function(){

    var orderId = $(this).parent().attr('data-id')
    var oToDelete = $(this).parent()
    $.ajax({
        url: 'mysql/apis/api-remove-from-cart.php',
        data: {orderId:orderId},
        method: 'POST',
        dataType: 'JSON'
    }).done(function(jData){
        if(jData.status == 1){
            $(oToDelete).remove()
        }else {
        console.log(jData)
        }

    })
})



</script>

