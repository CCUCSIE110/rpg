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

    public function save($id, $success)
    {
    	echo "save\n";
        $stage = $this->user . '-' . $success;
        echo $stage;
        $rs = $this->dbh->prepare('select * from rank where id=:id and `' . $stage . '`=0');
        $rs->bindValue(':id' , $id);
        $rs->execute();

        if($rs->rowCount() <= 0)
        {
            return "該關卡已通關";
        }
        else
        {
            $rs = $this->dbh->prepare('update rank set `' . $stage . '`=1 where id=:id');
            $rs->bindValue(':id' , $id);
            $rs->execute();

            $rs = $this->dbh->prepare('select score from rank where id=:id');
            $rs->bindValue(':id' , $id);
            $rs->execute();

            $tmp = $rs->fetch();

            $rs = $this->dbh->prepare('SELECT score FROM stage_score WHERE stage=:stage');
            $rs->bindValue(':stage' , $stage);
            $rs->execute();

            $score = $rs->fetch();

            $new = $score[0]+$tmp['score'];
            $rs = $this->dbh->prepare('update rank set score=:new where id=:id');
            $rs->bindValue(':id' , $id);
            $rs->bindValue(':new' , $new);
            $rs->execute();
            return "更新成功";
        }
    }
	
	public function bonus($id)
	{
		$rs = $this->dbh->prepare('select * from rank where id=:id');
		$rs->bindValue(':id' , $id);
		$rs->execute();
		$tmp = $rs->fetchAll();
		$status = $tmp[0];
		$bonus_score = 0;
		print_r($status);
		echo "<br>".gettype($status[1-1]);
		echo "<br>".$status[1-1]."<br>";
        echo "<br>";
        for ($i = 1 ; $i <= 10 ; $i++)
        {
            for ($j = 1;$j<=4;$j++)
            {
                $stage = $i . '-' . $j;
                echo $stage . "=";
                echo $status[$stage] . "<br>";
            }
        }
        echo "---------------<br>";
		//埃及
		//支線1
		if( $status['1-1']==1 and $status['2-1']==1 and $status['3-1']==1 and $status['4-1']==1 )
		{
			$bonus_score += 700;
			$status['1-1']+=1;
			$status['2-1']+=1;
			$status['3-1']+=1;
			$status['4-1']+=1;
		}
		//支線2
		if( $status['5-1']==1 and $status['1-2']==1 and $status['6-1']==1 and $status['3-2']==1 )
		{
			$bonus_score += 900;
			$status['5-1']+=1;
			$status['1-2']+=1;
			$status['6-1']+=1;
			$status['3-2']+=1;
		}
		//支線3
		if( $status['7-1']==1 and $status['4-2']==1 and $status['5-2']==1 and $status['8-1']==1 )
		{
			$bonus_score += 1000;
			$status['7-1']+=1;
			$status['4-2']+=1;
			$status['5-2']+=1;
			$status['8-1']+=1;
		}
		//中國
		//支線1
		if( $status['3-3']==1 and $status['5-3']==1 and $status['1-3']==1 and $status['9-1']==1 )
		{
			$bonus_score += 900;
			$status['3-3']+=1;
			$status['5-3']+=1;
			$status['1-3']+=1;
			$status['9-1']+=1;
		}
		//支線2
		if( $status['6-2']==1 and $status['7-2']==1 and $status['4-3']==1 and $status['1-4']==1 )
		{
			$bonus_score += 1200;
			$status['6-2']+=1;
			$status['7-2']+=1;
			$status['4-3']+=1;
			$status['1-4']+=1;
		}
		//支線3
		if( $status['8-2']==1 and $status['10-1']==1 and $status['9-2']==1 and $status['7-3']==1 )
		{
			$bonus_score += 1000;
			$status['8-2']+=1;
			$status['10-1']+=1;
			$status['9-2']+=1;
			$status['7-3']+=1;
		}
		//希臘
		//支線1
		if( $status['10-2']==1 and $status['6-3']==1 and $status['8-3']==1 and $status['2-2']==1 )
		{
			$bonus_score += 700;
			$status['10-2']+=1;
			$status['6-3']+=1;
			$status['8-3']+=1;
			$status['2-2']+=1;
		}
		//支線2
		if( $status['2-3']==1 and $status['9-3']==1 and $status['10-3']==1 and $status['6-4']==1 )
		{
			$bonus_score += 900;
			$status['2-3']+=1;
			$status['9-3']+=1;
			$status['10-3']+=1;
			$status['6-4']+=1;
		}
		//支線3
		if( $status['9-4']==1 and $status['3-4']==1 and $status['7-4']==1 and $status['10-4']==1 )
		{
			$bonus_score += 1000;
			$status['9-4']+=1;
			$status['3-4']+=1;
			$status['7-4']+=1;
			$status['10-4']+=1;
		}
		//支線4
		if( $status['4-4']==1 and $status['8-4']==1 and $status['2-4']==1 and $status['5-4']==1 )
		{
			$bonus_score += 700;
			$status['4-4']+=1;
			$status['8-4']+=1;
			$status['2-4']+=1;
			$status['5-4']+=1;
		}
		//主線1 -> 埃及
		if( $status['1-1']==2 and $status['2-1']==2 and $status['3-1']==2 and $status['4-1']==2 and 
			$status['5-1']==2 and $status['1-2']==2 and $status['6-1']==2 and $status['3-2']==2 and
			$status['7-1']==2 and $status['4-2']==2 and $status['5-2']==2 and $status['8-1']==2
			)
		{
			$bonus_score += 2000;
			$status['1-1']+=1;
			$status['2-1']+=1;
			$status['3-1']+=1;
			$status['4-1']+=1;
			
			$status['5-1']+=1;
			$status['1-2']+=1;
			$status['6-1']+=1;
			$status['3-2']+=1;
			
			$status['7-1']+=1;
			$status['4-2']+=1;
			$status['5-2']+=1;
			$status['8-1']+=1;
		}
		//主線2 -> 中國
		if( $status['3-3']==2 and $status['5-3']==2 and $status['2-3']==2 and $status['9-1']==2 and
			$status['6-2']==2 and $status['7-2']==2 and $status['4-3']==2 and $status['1-4']==2 and
			$status['8-2']==2 and $status['10-1']==2 and $status['9-2']==2 and $status['7-3']==2
			)
		{
			$bonus_score += 2000;
			$status['3-3']+=1;
			$status['5-3']+=1;
			$status['1-3']+=1;
			$status['9-1']+=1;
			
			$status['6-2']+=1;
			$status['7-2']+=1;
			$status['4-3']+=1;
			$status['1-4']+=1;
			
			$status['8-2']+=1;
			$status['10-1']+=1;
			$status['9-2']+=1;
			$status['7-3']+=1;
		}
		//主線3 -> 希臘
		if( $status['10-2']==2 and $status['6-3']==2 and $status['8-3']==2 and $status['2-2']==2 and
			$status['2-3']==2 and $status['9-3']==2 and $status['10-3']==2 and $status['6-4']==2 and
			$status['9-4']==2 and $status['3-4']==2 and $status['7-4']==2 and $status['10-4']==2 and
			$status['4-4']==2 and $status['8-4']==2 and $status['2-4']==2 and $status['5-4']==2
			)
		{
			$bonus_score += 2000;
			$status['10-2']+=1;
			$status['6-3']+=1;
			$status['8-3']+=1;
			$status['2-2']+=1;
			
			$status['2-3']+=1;
			$status['9-3']+=1;
			$status['10-3']+=1;
			$status['6-4']+=1;
			
			$status['9-4']+=1;
			$status['3-4']+=1;
			$status['7-4']+=1;
			$status['10-4']+=1;
			
			$status['4-4']+=1;
			$status['8-4']+=1;
			$status['2-4']+=1;
			$status['5-4']+=1;
		}
		
		$new = $status['score'] + $bonus_score;
		echo "new".$new;
		$rs = $this->dbh->prepare('update rank set score=:new where id=:id');
        $rs->bindValue(':id' , $id);
        $rs->bindValue(':new' , $new);
        $rs->execute();
        echo "<br>";
        for ($i = 1 ; $i <= 10 ; $i++)
        {
            for ($j = 1;$j<=4;$j++)
            {
                $stage = $i . '-' . $j;
                echo $stage . "=";
                echo $status[$stage] . "<br>";
                $rs = $this->dbh->prepare('update rank set `' . $stage . '`=:tmp where id=:id');
                $rs->bindValue(':id' , $id);
                $rs->bindValue(':tmp' , $status[$stage]);
                $rs->execute();
            }
        }
		
		return "獲得bonus點數：" . $bonus_score;
	}
}
