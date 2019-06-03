/************************ CREATE **************************/
$(document).on('click', '#btnInsert', function(){

  /*   var title = $(this).parent().find('.sneakerTitle').val()
    var content = $(this).parent().find('.sneakerContent').val()
    var image = $(this).parent().find('.sneakerImage').val()
    var date = $(this).parent().find('.sneakerReleaseDate').val()


    $('#newsList').prepend(`
    <div class="newsItem">
    <form>
    <img src='${image}' alt='${title}'>
    <input type="text" id="txtImage" name="txtImage" value="${image}" readonly>
    <input type="text" id="txtTitle" name="txtTitle" value="${title}" readonly>
    <input type="text" id="txtContent" name="txtContent" value="${content}" readonly>
    <input type="date" id="releaseDate" name="txtReleaseDate" value="${date}" readonly>
    <button id="btnSubmit">Update</button>
    <button id="btnDelete">Delete</button>
    </form>
    </div>`)


   */



    $.ajax({
        url: "sqlite/apis/api-create-news.php",
        method: "POST",
        data: $('#frmInsert').serialize(),
        dataType: "JSON"
    }).always(function(jData){
        console.log(jData)
       // window.location.reload(true)
       location.reload(true)

    })
})


/************************ READ **************************/
$(document).ready(function(){

$.ajax({
    url: "sqlite/apis/api-read-news.php",
    method: "GET",
    dataType: "JSON"
}).always(function(jData){

    $.each(jData, function (i, item){

    $('#newsList').prepend(`
    <div class="newsItem">
        <form class="frmNews" data-id=${jData[i]['news_id']}>
            <img src='${jData[i]['image']}' alt='${jData[i]['title']}'>
            <input type="text"  class="txtImage" name="txtImage" value="${jData[i]['image']}" readonly>
            <input type="text"  class="txtTitle" name="txtTitle" value="${jData[i]['title']}"readonly>
            <input type="text" class="txtContent" name="txtContent" value="${jData[i]['content']}"readonly>
            <input type="date" class="txtReleaseDate" name="txtReleaseDate" value="${jData[i]['published_date']}" readonly>
            <button type="button" id="btnUpdate">Update</button>
            <button type="button" id="btnDelete">Delete</button>
        </form>
    </div>
    `)
    })
})
})



/************************ UPDATE **************************/


$(document).on('click', '#btnUpdate', function (e) {
    e.preventDefault();



     if($(this).text() == 'Update'){

        $(this).parent().find('.txtImage').attr('readonly', false)
        $(this).parent().find('.txtTitle').attr('readonly', false)
        $(this).parent().find('.txtContent').attr('readonly', false)
        $(this).parent().find('.txtReleaseDate').attr('readonly', false)


        $(this).text('Save')
      }else{ // this is when you click save
        $(this).text('Update')


        $(this).parent().find('.txtImage').attr('readonly', true)
        $(this).parent().find('.txtTitle').attr('readonly', true)
        $(this).parent().find('.txtContent').attr('readonly', true)
        $(this).parent().find('.txtReleaseDate').attr('readonly', true)

        var sId = $(this).parent().attr('data-id')


    $.ajax({
        url: "sqlite/apis/api-update-news.php",
        method: "POST",
        data: $(this).parent().serialize() + "&id="+sId
    }).always(function (jData) {
        console.log("jData ", jData);

    })

}
})

/************************ DELETE **************************/

$(document).on('click', '#btnDelete', function(){
    var sId = $(this).parent().attr('data-id')
    var oToDelete = $(this).parent().parent()

    $.ajax({
        url: 'sqlite/apis/api-delete-news.php',
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