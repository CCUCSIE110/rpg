<?php
/**
 * Created by PhpStorm.
 * User: Jessy Wu
 * Date: 2018/7/24
 * Time: 下午 05:48
 */

class Config
{
    public function settings(){
        $dbms='mysql';     //資料庫類型
        $host='localhost'; //主機名稱
        $dbName='';    //資料庫名稱
        $admin_user='';      //帳號
        $admin_pass='';          //密碼
        $dsn="$dbms:host=$host;dbname=$dbName";

        include_once "db.php";
        $db = new db();
        $dbh = $db->connect($dsn,$admin_user,$admin_pass);

        return $dbh;
    }
}