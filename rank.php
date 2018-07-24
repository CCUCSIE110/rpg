<?php
    require_once __DIR__ . './config.php';

    $dbh = Config::setting();
    $rs = $dbh->prepare('select * from ranks order by score desc ');
    $rs->execute();

    $result = $rs->fetchAll();
    echo json_encode($result);
?>