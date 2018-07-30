<?php
/**
 * Created by PhpStorm.
 * User: Jessy Wu
 * Date: 2018/7/26
 * Time: 下午 05:19
 */
require_once __DIR__ . '/config.php';
session_start();

class add_score
{

    private $user;
    private $dbh;

    public function __construct()
    {
        $this->dbh = Config::settings();
        $this->user = $_SESSION['user'];
    }

    public function save($id,$success,$score)
    {
        $stage = $this->user . '-' . $success;
        $rs = $this->dbh->prepare('select * from ranks where id = :id and ' . $stage . '= false');
        $rs->bindValue(':id' , $id);
        $rs->execute();

        if($rs->rowCount() <= 0)
        {
            return "該關卡已通關";
        }
        else
        {
            $rs = $this->dbh->prepare('update ranks set ' . $stage . '= true where id = :id');
            $rs->bindValue(':id' , $id);
            $rs->execute();

            $rs = $this->dbh->prepare('select score from ranks where id = :id');
            $rs->bindValue(':id' , $id);
            $rs->execute();

            $tmp = $rs->fetch();
            $new = $score + $tmp['score'];

            $rs = $this->dbh->prepare('update ranks set score = :new where id = :id');
            $rs->bindValue(':id' , $id);
            $rs->bindValue(':new' , $new);
            $rs->execute();
            return "更新成功";
        }
    }
}