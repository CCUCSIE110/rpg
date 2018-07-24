<?php
    class db{
        /**
         * @param $dsn
         * @param $user
         * @param $pwd
         * @return PDO
         */
        function connect($dsn , $user , $pwd){
            $dbh = new PDO($dsn,$user,$pwd);
            return $dbh;
        }
    }
?>