

/****** SHOW *****/

// API READ ALL SNEAKERS
$(document).ready(function(){

    $.ajax({

        url: "mysql/apis/api-thomas.php",
        dataType: "JSON"
    }).always(function(jData){
// console.log(jData)
        $.each(jData, function (i, item){
         
            $('#sneakersList').append(`
            <div class="sneakerContainer">
                <form class="frmsneaker" data-id="${jData[i]['sneaker_id']}">
                    <span>${jData[i]['sneaker_id']}</span>
                    <span>${jData[i]['brand_name']}</span>
                    <span>${jData[i]['sneaker_name']}</span>
                    <span>${jData[i]['gender']}</span>
                    <span>${jData[i]['description']}</span>
                    <div class="sizes${jData[i]['sneaker_id']}">
                    </div>
                    <input value="${jData[i]['price']}" class="txtPrice" name="txtPrice" readonly>
                    <button type="button" id="btnEditSneaker">Edit</button>
                    <button type="button" id="btnDeleteSneaker">Delete</button>
                </form>
            </div>

            `)
            var id = jData[i]['sneaker_id']
            $.each(jData, function (i, item){
            $.ajax({

                url: "mysql/apis/api-thomas-sizes.php",
                data: {id:id},
                method: "POST",
                dataType: "JSON"
            }).always(function(jData){
                console.log(jData)
                $(`.sizes${id}`).append(`<div>${jData[0]['size']}</div>`)
            })

        })
        })

    })

})

/****** SHOW *****/

// user_id, name, lastname, email, admin
$(document).ready(function(){

    $.ajax({

        url: "mysql/apis/api-read-all-users.php",
        dataType: "JSON"
    }).always(function(jData){

    $.each(jData, function (i, item){

        $('#usersList').append(`
        <div class="userContainer">
            <form class="frmUser" data-id="${jData[i]['user_id']}">
                <span>${jData[i]['user_id']}</span>
                <span>${jData[i]['name']}</span>
                <span>${jData[i]['last_name']}</span>
                <span>${jData[i]['email']}</span>
                <span>${jData[i]['newsletter']}</span>
                <input value="${jData[i]['admin']}" class="txtAdmin" name="txtAdmin" readonly>
                <button type="button" id="btnEditUser">Edit</button>
                <button type="button" id="btnDeleteUser">Delete</button>
            </form>
        </div>

        `)

            })//end FOREACH

            })// END DONE

            })//FUNCTION & READY


/****** UPDATE *****/

$(document).on('click', '#btnEditUser', function (e) {
    e.preventDefault();

     if($(this).text() == 'Edit'){
        $(this).parent().find('.txtAdmin').attr('readonly', false)
        $(this).text('Save')
      }else{ // this is when you click save
        $(this).text('Edit')
        $(this).parent().find('.txtAdmin').attr('readonly', true)


        var id = $(this).parent().attr('data-id')
        var iAdmin = $(this).parent().find('.txtAdmin').val()



        $.ajax({
            url: "mysql/apis/api-update-user.php",
            method: "POST",
            data: {id:id, iAdmin:iAdmin},
            dataType: "JSON"
        }).always(function (jData) {
            console.log("jData ", jData);

        })

}
})


//

/****** DELETE *****/

$(document).on('click', '#btnDeleteUser', function(){

    var sId = $(this).parent().attr('data-id')
    var oToDelete = $(this).parent().parent()

    $.ajax({
        url: 'mysql/apis/api-delete-user.php',
        data: {id: sId},
        method: 'GET',
        dataType: 'JSON'
    }).always(function(jData){
        if(jData.status == 1){
            $(oToDelete).remove()
        }else {
        console.log(jData)
        }
    })
})
















/**********************************************************************
 **********************************************************************/

 /******************* READ SINGLE USER INFO PAGE *************************/


$(document).ready(function(){

    $.ajax({

        url: "mysql/apis/api-read-single-user.php",
        dataType: "JSON"
    }).always(function(jData){
        console.log(jData[0]['name'])
        $('#userList').append(`
        <div class="userContainer">
            <form class="frmUser" data-id="${jData[0]['user_id']}">
                <input type="text" id="txtName" name="txtName" value="${jData[0]['name']}" >
                <input type="text" id="txtLastName" name="txtLastName" value="${jData[0]['last_name']}" >
                <input type="text" id="txtAddress" name="txtAddress" value="${jData[0]['address']}" >
                <input type="text" id="txtCity" name="txtCity" value="${jData[0]['city']}" >
                <input type="text" id="txtZipcode" name="txtZipCode" value="${jData[0]['zipcode']}" >
                <input type="text" id="txtEmail"  name="txtEmail" value="${jData[0]['email']}" >
                <input type="password" id="txtPassword" name="txtPassword" value="${jData[0]['password']}" >
                <button type="button" id="btnEditSingleUser">Edit</button>
                <button type="button" id="btnDeleteSingleUser">Delete</button>
            </form>

                <button id="btnSubscribe">Subscribe to newsletter</button>
        </div>

         `)


            })// END DONE

            })//FUNCTION & READY


/******************* UPDATE SINGLE USER INFO PAGE *************************/


$(document).on('click','#btnSubscribe', function(){
if($(this).text() == 'Subscribe to newsletter'){

    $(this).text('Unsubscribe to newsletter')
    $.ajax({
        url: "mysql/apis/api-subscribe-newsletter.php",
        dataType: "JSON"
    }).always(function(jData){
        console.log(jData)
    })

}else{
    $(this).text('Subscribe to newsletter')

    $.ajax({
        url: "mysql/apis/api-unsubscribe-newsletter.php",
        dataType: "JSON"
    }).always(function(jData){
        console.log(jData)
    })

}
})

$(document).on('click', '#btnEditSingleUser', function (e) {
    e.preventDefault();

    var sName             = $('#txtName').val()
    var sLastName         = $('#txtLastName').val()
    var sAddress          = $('#txtAddress').val()
    var sCity             = $('#txtCity').val()
    var iZipcode          = $('#txtZipcode').val()
    var sEmail            = $('#txtEmail').val()
    var sPassword         = $('#txtPassword').val()
    var iNewsletter       = $('#txtNewsletter').val()


        $.ajax({
            url: "mysql/apis/api-update-single-user.php",
            method: "POST",
            data:{sName:sName,
                sLastName:sLastName,
                sAddress:sAddress,
                sCity:sCity,
                iZipcode:iZipcode,
                sEmail:sEmail,
                sPassword:sPassword,
                iNewsletter:iNewsletter},

            dataType: "JSON"
        }).always(function (jData) {
            console.log("jData ", jData);

        })


})

