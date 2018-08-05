<?php
session_start();
if(!$_SESSION['user']){
    header('Location: ./login_page.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RPG</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS/main.css">
    <link rel="stylesheet" href="./CSS/status.css">

</head>
<body>
    <div class="panel">
        <header>
            <h1>CSIE X  CHI Camp</h1>
        </header>
        <nav>
            <a class="nav-a" href="index.html">首頁</a>
            <a class="nav-a" href="rank.html">排名</a>
            <a class="nav-a" href="login_page.php">後臺登入</a>
        </nav>
    <div class="stage">
    </div>
    <div class="in_stage">
        <div class="opt">
            <label for="in_stage">有小隊</label>
            <input type="radio">
        </div>
        <div class="opt">
            <label for="out_stage">沒小隊</label>
            <input type="radio">
        </div>
    </div>
</div>
</body>
</html>