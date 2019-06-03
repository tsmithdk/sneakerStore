// ************ add upcoming sneaker

 /*$(document).on('click', '#btnSubmit', function(){
    var name = $('#sneakerName').val()
    var brand = $('#sneakerBrand').val()
    var description = $('#description').val()
    var price = $('#price').val()
    var image = $('#upcomingSneakerImage').val()
    var date = $('#releaseDate').val()

    $('#upcomingSneakers').prepend(`  <div class="upcomingSneaker">
    <img src='${image}' alt='${name}'>
    <span name="txtImage" class="sneakerImage" contentEditable="false"> ${image}</span>
    <span name="txtName" class="sneakerName" contentEditable="false">${name}</span>
    <span name="txtBrand" class="sneakerBrand" contentEditable="false"> ${brand}</span>
    <span name="txtDescription" class="sneakerDescription" contentEditable="false"> ${description}</span>
    <span name="txtPrice" class="sneakerPrice" contentEditable="false">${price}</span>
    <span name="txtReleaseDate" class="sneakerReleaseDate" contentEditable="false"> ${date}</span>
    <button class="btnEdit">Edit</button>
    <button class="btnDelete">Delete</button>
    </div>`)
    }) */

$('#frmAddUpcomingSneaker').submit(function(e){
    e.preventDefault()
    $.ajax({
        url: "mongodb/apis/api-add-upcoming-sneaker.php",
        method: "POST",
        data: $('#frmAddUpcomingSneaker').serialize(),
        dataType: "JSON"
    }).always(function(jData){
        console.log(jData)
        location.reload(true)
        //$('#upcomingSneakers').load(document.URL +  '#upcomingSneakers');

    })
})


// ************ toggle edit

$(document).on('click','.btnEdit',function() {


    if($(this).text() == 'Edit'){

        $(this).parent().find('.sneakerImage').attr('contentEditable', true).focus()
        $(this).parent().find('.sneakerName').attr('contentEditable', true).focus()
        $(this).parent().find('.sneakerBrand').attr('contentEditable', true).focus()
        $(this).parent().find('.sneakerDescription').attr('contentEditable', true).focus()
        $(this).parent().find('.sneakerPrice').attr('contentEditable', true).focus()
        $(this).parent().find('.sneakerReleaseDate').attr('contentEditable', true).focus()

        $(this).text('Save')
      }else{ // this is when you click save
        $(this).text('Edit')


        $(this).parent().find('.sneakerImage').attr('contentEditable', false)
        $(this).parent().find('.sneakerName').attr('contentEditable', false)
        $(this).parent().find('.sneakerBrand').attr('contentEditable', false)
        $(this).parent().find('.sneakerDescription').attr('contentEditable', false)
        $(this).parent().find('.sneakerPrice').attr('contentEditable', false)
        $(this).parent().find('.sneakerReleaseDate').attr('contentEditable', false)

        var id = $(this).parent().attr('id')
        var name = $(this).parent().find('.sneakerName').text()
        var brand = $(this).parent().find('.sneakerBrand').text()
        var description = $(this).parent().find('.sneakerDescription').text()
        var price = $(this).parent().find('.sneakerPrice').text()
        var image = $(this).parent().find('.sneakerImage').text()
        var date = $(this).parent().find('.sneakerReleaseDate').text()












   /*  var value = $(this).siblings().not(".btnDelete").attr('contenteditable')
    if (value == 'false') {
        $(this).siblings().not(".btnDelete").attr('contenteditable','true')
        $(this).text('Save')
    }
    else {
        $(this).siblings().not(".btnDelete").attr('contenteditable','false')
        $(this).text('Edit')
        var id = $(this).parent().attr('id')
        var name = $(this).parent().find('.sneakerName').text()
        var brand = $(this).parent().find('.sneakerBrand').text()

        var description = $(this).parent().find('.sneakerDescription').text()

        var price = $(this).parent().find('.sneakerPrice').text()

        var image = $(this).parent().find('.sneakerImage').text()

        var date = $(this).parent().find('.sneakerReleaseDate').text()


 */

        $.ajax({
            url: "mongodb/apis/api-edit-upcoming-sneaker.php",
            method: "POST",
            data:{id:id, name:name, brand:brand, description:description, price:price, image:image, date:date},
            dataType: "JSON"
        }).always(function(jData){
            console.log(jData)
        })
    }//end else
})


// ************ delete upcoming sneaker

$(document).on('click', '.btnDelete', function(){
    console.log('x')
    var id = $(this).parent().attr('id')
    var oDivToDelete = $(this).parent()

    $.ajax({
    url: "mongodb/apis/api-delete-upcoming-sneaker.php",
    method: "POST",
    data: {id:id},
    dataType: "JSON"
    }).always(function(jData){
    console.log(jData)
    $(oDivToDelete).remove()
    })
 })


 // ************ show upcoming sneaker
 $(document).ready(function(){

    $.ajax({

        url: "mongodb/apis/api-read-upcoming-sneaker.php",
        method: "GET",
        dataType: "JSON"
    }).done(function(jDatas){
        // console.log(jDatas)


    jDatas.forEach((jData, key)=>{
        // console.log(jData);
        $('#upcomingSneakers').append(`

        <div class="upcomingSneaker" id="${jData._id.$oid}" >
                <img src='${jData['image']}' alt='${jData['name']}'>
                <span type="text" name="txtImage" class="sneakerImage" contentEditable="false"><p>${jData['image']} </p></span>
                <span type="text" name="txtName" class="sneakerName" contentEditable="false"> ${jData['name']}</span>
                <span type="text" name="txtBrand" class="sneakerBrand" contentEditable="false"> ${jData['brand']}</span>
                <span type="text" name="txtDescription" class="sneakerDescription" contentEditable="false">${jData['description']}</span>
                <span type="text" name="txtPrice" class="sneakerPrice" contentEditable="false"> ${jData['price']}</span>
                <span name="txtReleaseDate" class="sneakerReleaseDate" contentEditable="false">${jData['date']}</span>
                <button class="btnEdit">Edit</button>
                <button class="btnDelete">Delete</button>
        </div>
        `)

            })//end FOREACH

            })// END DONE

            })//FUNCTION & READY
