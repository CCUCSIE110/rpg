<?php
    require_once __DIR__ . '/config.php';

    $dbh = Config::setting();
    try
    {
        $rs = $dbh->prepare('select * from stage_status');
        $rs->execute();
        $result = $rs->fetchAll();
        echo json_encode($result);
    }
    catch (PDOException $e)
    {
        echo "index 執行預存程序失敗. ".$e->getMessage();
    }
    ?>
