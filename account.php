<?php
ini_set('display_errors', 1);
$sLinkToJs = 'admin.js';
$sLinkToCss = 'account.css';
$sLinkToMongo = 'admin.js';
$sLinkToSqlite = 'admin.js';
require_once __DIR__.'/components/top.php';
require_once 'mongodb/mongo-database.php';
//require_once 'sqlite/sqlite-database.php';


if($_SESSION['jUser']['admin']==1){
?>




<!-- MongoDB Upcoming Sneakers -->

<div class="wrapperFrm">
<h2>Upcoming Sneakers (MongoDB)</h2>
    <form id="frmAddUpcomingSneaker">
        <input type="text" id="sneakerName" placeholder="Name of the sneaker" name="txtName" value="a">
        <input type="text" id="sneakerBrand" placeholder="Brand" name="txtBrand" value="nike">
        <input type="text" id="description" placeholder="Description" name="txtDescription" value="aa">
        <input type="text" id="price" placeholder="Price" name="txtPrice" value="1500">
        <input type="text" id="upcomingSneakerImage" placeholder="URL for image" name="txtImage" value="https://assets.adidas.com/images/w_600,f_auto,q_auto/d285610e30664900b857a7fa00ed0201_9366/Superstar_sko_Hvid_C77124_01_standard.jpg">
        <input type="date" id="releaseDate" placeholder="Releasedate" name="txtDate" value="24/12/2018">
        <button id="btnSubmit">Submit</button>
    </form>
</div>



<div id="wrapperUpcomingSneakers">
<div id="upcomingContentHeadlines">
        <h3>Image  </h3>
        <h3>Url </h3>
        <h3>Name </h3>
        <h3>Brand </h3>
        <h3>Description </h3>
        <h3>Price </h3>
        <h3>Release Date</h3>
        <h3>Update </h3>
        <h3>Delete </h3>
    </div>
    <div id="upcomingSneakers">
        <!-- UPCOMING SNEAKERS HERE -->
    </div>

</div>





<!-- SQLITE -->
<div class="wrapperFrm">

<h2>News (SQLite)</h2>
 <form id="frmInsert">
    <input type="text" name="txtTitle" class="sneakerTitle"  value="Title">
    <input type="text" name="txtContent" class="sneakerContent"  value="Content">
    <input type="text" name="txtImage" class="sneakerImage"  value="https://media.wired.com/photos/598e35fb99d76447c4eb1f28/master/pass/phonepicutres-TA.jpg">
    <input type="date" name="txtReleaseDate" class="sneakerReleaseDate"  value="2019-12-12">
    <button id="btnInsert" type="button">Insert</button>
</form>
</div>

<div class="wrapperNews">
    <div id="newsContentHeadlines">
        <h3>Image  </h3>
        <h3>Url </h3>
        <h3>Title  </h3>
        <h3>Content </h3>
        <h3>Release Date </h3>
        <h3>Update </h3>
        <h3>Delete </h3>
    </div>
    <div id="newsList"></div>

</div>

<!-- MySQL USERS -->
<div class="wrapperFrm">

    <h2>Users (MySQL)</h2>
</div>

<div class="wrapperUsers">
    <div id="usersContentHeadlines">
        <h3>ID  </h3>
        <h3>Name </h3>
        <h3>Last Name </h3>
        <h3>Email </h3>
        <h3>Admin </h3>
        <h3>Edit </h3>
        <h3>Delete </h3>
    </div>
    <div id="usersList"></div>

</div>
<!-- MySQL Sneakers -->
<div class="wrapperFrm">

    <h2>Sneakers (MySQL)</h2>
</div>

<div class="wrapperSneakers">
    <div id="sneakersContentHeadlines">
        <h3>ID  </h3>
        <h3>Brand </h3>
        <h3>Sneaker Name </h3>
        <h3>Gender </h3>
        <h3>Description </h3>
        <h3>Price </h3>
        <h3>Edit </h3>
        <h3>Delete </h3>
    </div>
    <div id="sneakersList"></div>

</div>


<?php }else{ ?>

<!-- User Admin -->

<div class="wrapperUser">
    <div id="userContentHeadlines">
        <h3>Name </h3>
        <h3>Last Name </h3>
        <h3>Address </h3>
        <h3>City </h3>
        <h3>ZipCode </h3>
        <h3>Email </h3>
        <h3>Password </h3>
    </div>
    <div id="userList"></div>
</div>






<?php }; ?>
<div class="wrapperLogout">
<button class="btnLogout"><a href="mysql/apis/api-logout.php">logout</a></button>
</div>
<?php require_once __DIR__.'/components/bottom.php'; ?>