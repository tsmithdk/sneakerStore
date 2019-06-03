<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SneakerStore</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <link rel="stylesheet" href="css/<?=$sLinkToCss;?>" />



</head>
<body>

<?php
session_start();
if ($_SESSION['jUser']){
  echo '<div id="containerMenu">
  <header>
    <div id="menu">

        <a class="menuLogo" href="index.php">SneakerStore</a>
        <div class="menuLinks">
        <a href="men.php"><button class="menuLink">Men</button></a>
        <a href="women.php"><button class="menuLink">Women</button></a>
        <a href="news.php"><button class="menuLink">News</button></a>
        <a id="menuLogin" href="account.php"><button class="menuLink">Account</button></a>
        <a href="shopping-cart.php"><button class="menuLink"><i class="fas fa-cart-plus"></i> Cart</button></a>
        </div>
        <form id="frmSearchSite">
          <input type="text" placeholder="Search.." name="search">
          <button class="btnSearchSite"><i class="fas fa-search"></i></button>
        </form>

    </div>
  </header>
  </div>';
}else {
  echo '<div id="containerMenu">
  <header>
    <div id="menu">

        <a class="menuLogo" href="index.php">SneakerStore</a>
        <div class="menuLinks">
        <a href="men.php"><button class="menuLink">Men</button></a>
        <a href="women.php"><button class="menuLink">Women</button></a>
        <a href="news.php"><button class="menuLink">News</button></a>
        <a id="menuLogin" href="login.php"><button class="menuLink">Login</button></a>
        <a href="shopping-cart.php"><button class="menuLink"><i class="fas fa-cart-plus"></i> Cart</button></a>
        </div>
        <form id="frmSearchSite">
          <input type="text" placeholder="Search.." name="search">
          <button class="btnSearchSite"><i class="fas fa-search"></i></button>
        </form>

    </div>
  </header>
  </div>';
}
?>


