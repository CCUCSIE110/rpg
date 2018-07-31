<?php
    require_once __DIR__ . './config.php';

    $dbh = Config::settings();
    session_start();
    $username = $_POST['username'];
    $passwd = $_POST['passwd'];
    $_SESSION['user'] = $username;
  //  $_SESSION['pass'] = $passwd;
    try
    {
        $rs = $dbh->prepare('select * from users where username = :username and passwd = :passwd');
        $rs->bindValue(':username', $username);
        $rs->bindValue(':passwd', $passwd);
        $rs->execute();
        if($rs->rowCount() <= 0)
            echo '帳號密碼錯誤';
        else
        {
            echo '登入成功';
        }
    }
    catch(PDOException $e)
    {
        echo "login 執行預存程序失敗. ".$e->getMessage();
    }



