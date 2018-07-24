<?php
    $dbms='mysql';     //数据库类型
    $host='localhost'; //数据库主机名
    $dbName='main_database';    //使用的数据库
    $admin_user='very860112';      //数据库连接用户名
    $admin_pass='jessy6807';          //对应的密码
    $dsn="$dbms:host=$host;dbname=$dbName";

    include_once "db.php";
    $db = new db();
    $dbh = $db->connect($dsn,$admin_user,$admin_pass);

    $rs = $dbh->prepare('select id from level_status where status = true ');
    $rs->execute();

    $result = $rs->fetchAll();
    echo json_encode($result);
    ?>