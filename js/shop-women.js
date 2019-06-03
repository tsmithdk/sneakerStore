$(document).ready(function(){

    $.ajax({
        url: "mysql/apis/api-view-female-sneakers.php",
        dataType: "JSON"
    }).done(function(jDatas){
        jDatas.forEach((jData, key)=>{
            $('#wrapperProductsWomen').append(`

            <div class="upcomingSneaker" id="${jData['sneaker_id']}" >
                    <img src='${jData['image_path']}' alt='${jData['sneaker_name']}'>
                    <span type="text" name="txtName" class="sneakerName"> ${jData['sneaker_name']}</span>
                    <span type="text" name="txtBrand" class="sneakerBrand"> ${jData['brand_name']}</span>
                    <span type="text" name="txtDescription" class="sneakerDescription">${jData['description']}</span>
                    <span type="text" name="txtPrice" class="sneakerPrice"> ${jData['price']}</span>">
            </div>
            `)
        })
    })
})

$(document).on('click', '.upcomingSneaker', function(){
    var sId = $(this).attr('id')
    location.href = `single-sneaker.php?sneaker=${sId}`
})



