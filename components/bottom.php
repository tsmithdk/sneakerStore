</body>
<footer>
About us  |  Terms & Conditions  |  Press  |  Privacy Policy  |  SneakerStore © 2018
</footer>











<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src="mysql/js/<?=$sLinkToJs;?>"></script>
<script src="js/<?=$sLinkToMainJs;?>"></script>
<script src="mongodb/<?=$sLinkToMongo;?>"></script>
<script src="sqlite/<?=$sLinkToSqlite;?>"></script>

<script>
$(document).on('click', 'button.btnSearchSite', function(e){
  e.preventDefault();
  var sSearch = $(this).siblings().val()
  
  location.href=`search.php?search=${sSearch}`

})
</script>

</html>