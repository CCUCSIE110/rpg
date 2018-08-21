<?php
    require __DIR__ . "/config.php";

    session_start();
    if(!$_SESSION['user']){
        header('Location: ./login_page.php');
    }

    $status = $_POST["status"];
    $id = $_SESSION['user'];
    $dbh = Config::settings();

    if($status)
    {
        $rs = $dbh->prepare("UPDATE stage_status SET status = FALSE WHERE id = :id");
        $rs->bindValue(":id",$id);
        $rs->execute();
    }
    else
    {
        $rs = $dbh->prepare("UPDATE stage_status SET status = TRUE WHERE id = :id");
        $rs->bindValue(":id",$id);
        $rs->execute();
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
            <?php
            if($status==true){
                echo '<a class="nav-a" href="login_page.php">後臺登入</a>';
            }else{
                echo '<a class=" nav-a" href=" logout.php ">後臺登出</a>';
            }
            ?>
        </nav>
    <div class="stage">
        <header>
            <h2>關卡狀態</h2>
        </header>
        <div class="opt">
            <input type="radio" name="in" clss="in" value="in"<?php echo $status==true? "checked" : "" ?>>
            <label for="in_stage">有小隊</label>
        </div>
        <div class="opt">
            <input type="radio" name="in" class="in" value="out" <?php echo $status == false ? "" : "checked" ?>>
            <label for="out_stage">沒小隊</label>
        </div>
    </div>
    <div class="add_score">
    <header>
        <h2>加分面板</h2>
    </header>
    <form class="score_panel">
    <select class="level" name="level" id="level">
        <option value="1">第1小關</option>
        <option value="2">第2小關</option>
        <option value="3">第3小關</option>
        <option value="4">第4小關</option>
        </select>
        <select class="group" name="group" id="group">
            <option value="1">第1小隊</option>
            <option value="2">第2小隊</option>
            <option value="3">第3小隊</option>
            <option value="4">第4小隊</option>
            <option value="5">第5小隊</option>
            <option value="6">第6小隊</option>
            <option value="7">第7小隊</option>
            <option value="8">第8小隊</option>
        </select>
        <button type="button" name="button" class="submit">送出</button>
    </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="JS/status.js"></script>
</body>
</html>
