<?php
    require __DIR__ . '/add_score.php';
    require __DIR__ . '/config.php';
    $id = $_POST['id'];
    $stage = $_POST['stage'];

    $result = add_score::save($id,$stage);
	$result2 = add_score::bonus($id);

//	$dbh = Config::settings();
//	try
//    {
//        $rs = $dbh->prepare('update level_status set status = false where id = :id');
//        $rs->bindValue(':id', $id);
//        $test = $rs->execute();
//        if(!$test)
//            echo '狀態更新失敗：' . $rs->errorInfo();
//        else
//            echo $result . '\n' . $result2;
//    }
//    catch (PDOException $e)
//    {
//        echo "back 執行預存程序失敗. " . $e->getMessage();
//    }


