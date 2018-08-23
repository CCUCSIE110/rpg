<?php
    require __DIR__ . '/add_score.php';
//    $id = $_GET['id'];
//    $stage = $_GET['stage'];
    $id = $_POST['id'];
    $stage = $_POST['stage'];
	
	echo $id . 'stage=' . $stage;
	$addScore = new add_score();
    $result = $addScore->save($id, $stage);
	$result2 = $addScore->bonus($id);

//	echo $result;
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

?>
