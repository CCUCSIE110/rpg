<?php
    require_once __DIR__ . '/config.php';

    $dbh = Config::settings();
    try
    {
        $rs = $dbh->prepare('select * from ranks order by score desc ');
        $rs->execute();
        $result = $rs->fetchAll();
        echo json_encode($result);
    }
    catch (PDOException $e)
    {
        echo "rank 執行預存程序失敗. ".$e->getMessage();
    }

?>
