<?php
    require_once __DIR__ . './config.php';

    $dbh = Config::settings();
    session_start();
    $username = $_GET['username'];
    $passwd = $_GET['passwd'];
    $_SESSION['user'] = $username;
    $_SESSION['pass'] = $passwd;

    $rs = $dbh->prepare('select * from users where username = :username and passwd = :passwd');
    $rs->bindValue(':username',$username);
    $rs->bindValue(':passwd',$passwd);
    $rs->execute();

