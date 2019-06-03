//NEWEST SNEAKERS
$(document).ready(function(){

    $.ajax({
        url: "mysql/apis/api-read-new-sneakers.php",
        dataType: "JSON"
    }).done(function(jDatas){

        jDatas.forEach((jData, key)=>{
            console.log(jData['name']);
            $('#newSneakers').append(`

            <div class="containerNewSneaker">
                <div class="newSneaker" id="${jData['sneaker_id']}" >
                    <img class="imgNewest" src='${jData['image_path']}' alt='${jData['sneaker_name']}'>
                </div>
                <div class="containerInfos">
                    <div class="containerNameBrand">
                    <h5 type="text" name="txtBrand" class="sneakerBrand">${jData['brand_name']}</h5>
                    <hr>
                    <h2 type="text" name="txtName" class="sneakerName"> ${jData['sneaker_name']}</h2>

                    </div>
                    <div type="text" name="txtPrice" class="sneakerPrice">${jData['price']} DKK</div>
                    <div type="text" name="txtDescription" class="sneakerDescription"><h4>Description: </h4>${jData['description']}</div>

                </div>

            </div>
            `)


        })//end FOREACH

    })// END DONE

    })//FUNCTION & READY



    $(document).on('click', '.newSneaker', function(){
        var sId = $(this).attr('id')
        location.href = `single-sneaker.php?sneaker_id=${sId}`
    })




//UPCOMING SNEAKERS
$(document).ready(function(){

    $.ajax({
        url: "mongodb/apis/api-display-upcoming-sneakers-home.php",
        dataType: "JSON"
    }).done(function(jDatas){

        jDatas.forEach((jData, key)=>{
            console.log(jData['name']);
            $('#homeUpcomingSneakers').append(`

            <div class="containerUpcomingSneaker">
                <div class="upcomingSneaker" id="${jData._id.$oid}" >
                    <img src='${jData['image']}' alt='${jData['name']}'>
                </div>
                <div class="containerInfos">
                    <div class="containerNameBrand">
                        <h4 type="text" name="txtBrand" class="sneakerBrand" contentEditable="false">${jData['brand']}</h4>
                        <h2 type="text" name="txtName" class="sneakerName" contentEditable="false">${jData['name']}</h2>
                    </div>
                    <div type="text" name="txtPrice" class="sneakerPrice" contentEditable="false">${jData['price']} DKK</div>
                    <hr>
                    <div type="text" name="txtDescription" class="sneakerDescription" contentEditable="false"><span>Description: </span>${jData['description']}</div>
                    <div class="containerRelease">
                        <div class="insideContainerRelease">
                        <label>Release: </label>
                        <input type="date" name="txtReleaseDate" class="sneakerReleaseDate" contenteditable="false" value="${jData['date']}" readonly="readonly" onfocus="this.blur()" />
                        </div>
                    </div>
                </div>
            </div>
            `)


        })//end FOREACH

    })// END DONE

    })//FUNCTION & READY



    //NEWS
$(document).ready(function(){

    $.ajax({
        url: "sqlite/apis/api-read-limit-news.php",
        dataType: "JSON"
    }).done(function(jDatas){

jDatas.forEach((jData, key)=>{
            console.log(jData['name']);
            $('#homeNews').append(`
            <div class='newsRow' id='${jData['news_id']}'>
                <h3 class='newsItem title'>${jData['title']}</h3>
                <a href='single-news.php?news_id=${jData['news_id']}'>
                    <div class='newsItem'><img class="newsImg" src="${jData['image']}" alt='sneaker'></div>
                </a>

                <div class='newsItem date'>${jData['published_date']}</div>
            </div>

            `)


        })//end FOREACH

    })// END DONE

    })//FUNCTION & READY





    //CAROUSEL NEWEST SNEAKERS


//END CAROUSEL NEWEST SNEAKERS