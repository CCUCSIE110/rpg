<h1>test</h1>
<?php
    require_once __DIR__ . '/config.php';
    $dbh = Config::settings();
    session_start();
    $username = $_POST['username'];
    $passwd = $_POST['passwd'];

    if(strlen(username) > 20) echo 'username too long';
    if(strlen(passwd) > 20) echo 'password too long';

	try
    {
        $rs = $dbh->prepare('SELECT * FROM users WHERE username = :username AND passwd = :passwd');
        $rs->bindValue(':username', $username);
        $rs->bindValue(':passwd', $passwd);
        $rs->execute();
        if($rs->rowCount() <= 0)
            echo '帳號密碼錯誤';
        else
        {
            echo '登入成功';
    		$_SESSION['user'] = $username;
  		//  $_SESSION['pass'] = $passwd;
        }
    }
    catch(PDOException $e)
    {
        echo "login 執行預存程序失敗. ".$e->getMessage();
    }
?>
