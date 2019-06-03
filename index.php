<?php
session_start();
$sLinkToMainJs = 'home.js';
$sLinkToCss = 'index.css';
//ini_set('display_errors', 1);
require_once __DIR__.'/components/top.php';

?>

<div id="containerNewSneakers">
    <hr>
    <h2>NEWEST SNEAKERS</h2>
    <div id="newSneakers"></div>
</div>

<div id="containerHomeUpcomingSneakers">
    <hr>
    <h2>UPCOMING SNEAKERS</h2>
    <div id="homeUpcomingSneakers"></div>
</div>

<div id="containerNews">
    <hr>
    <h2>NEWS</h2>
    <div id="homeNews"></div>
</div>



<?php require_once __DIR__.'/components/bottom.php'; ?>