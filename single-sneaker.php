<?php
session_start();
$sLinkToCss = 'single-sneaker.css';
$sId = $_GET['sneaker_id'];
//echo $sId;
require_once __DIR__.'/components/top.php';
// ini_set('display_errors', 1);


?>
<div class="containerSneaker">
    <!-- <h2>Name</h2> -->
    <div class="sneaker" id="<?=$sId ?>"></div>

</div>

<?php require_once __DIR__.'/components/bottom.php'; ?>
<script>

var sId = $('.sneaker').attr('id')
$(document).ready(function(){
    console.log(sId)
    $.ajax({
        url: 'mysql/apis/api-single-sneaker.php',
        data: {sneaker_id : sId },
        dataType: "JSON"
}).always(function(jData){
     console.log(jData);
     var sSizes = jData[0]['size']
     var aAllSizes = JSON.parse("[" + sSizes + "]");
     var qty = jData[0]['qty']
     var aQty = JSON.parse("[" + qty + "]")


     $('.sneaker').append(`


    <div class="wrapperSneaker">
     <img class="imgSingleSneaker" src='${jData[0]['image_path']}' alt='${jData[0]['sneaker_name']}'>
        <div class="infoContainer">
            <h2 type="text" name="txtName" class="sneakerName"> ${jData[0]['sneaker_name']}</h2>
            <h3 type="text" name="txtGender" class="sneakerGender"> ${jData[0]['gender']}</h3>
            <hr>
            <div class="containerBrandPriceSizes">
                <div type="text" name="txtBrand" class="sneakerBrand"><span>Brand:</span> ${jData[0]['brand_name']}</div>
                <div type="text" name="txtDescription" class="sneakerDescription">
                    <h4>Description:</h4>
                    <div>${jData[0]['description']}</div>
                </div>
                <div type="text" name="txtPrice" class="sneakerPrice"> ${jData[0]['price']}<span> DKK</span></div>

                <select type="text" name="txtSize" id="sneakerSizes"></select>


            </div>
                <button class="btnAddSneaker">Add to Shopping Cart <i class="fas fa-cart-plus"></i></button>

        </div>
     </div>

     `)
    for (var i=0; i<aAllSizes.length; i++ ){
        //  console.log(qty[i])
        if (aQty[i]>0){
            $('#sneakerSizes').append(`<option id="${aAllSizes[i]}" class="singleSize" value="${aAllSizes[i]}">${aAllSizes[i]}</option>`)
        }
    }



})// END DONE




})//FUNCTION & READY


$(document).on('click', '.btnAddSneaker', function(){

    var sSize = $('#sneakerSizes :selected').text()

    var sId = $('.sneaker').attr('id')

    $.ajax({
        url: 'mysql/apis/api-add-sneaker-to-cart.php',
        data: {sneaker_id:sId, sneaker_size:sSize},
        method: 'POST',
        dataType: 'JSON'
    }).done(function(jData){
        console.log(jData)
        if(jData.status==1){
        location.href="shopping-cart.php"
        }else {
            $('.sneaker').append(`<p class="purchase-error">You have to be logged in to make a purchase</p>`)
        }
    })

})



</script>

