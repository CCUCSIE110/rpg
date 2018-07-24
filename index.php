<?php
    require_once __DIR__ . './config.php';

    $dbh = Config::setting();
    $rs = $dbh->prepare('select id from level_status where status = true ');
    $rs->execute();

    $result = $rs->fetchAll();
    echo json_encode($result);
    ?>