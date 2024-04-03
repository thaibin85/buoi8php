<?php
     define('host', 'localhost');
     define('user', 'root');
     define('pass', '');
     define('db', 'store');
    class mysqli_Object{
        private $link,  $host,  $user,   $pass,  $db;
        public function __construct()
        {
            $this->link = new mysqli(host, user, pass, db);

            mysqli_set_charset($this->link,'utf8');
            if(mysqli_connect_errno())
                echo mysqli_connect_errno();
        }

        public function query($sql){
            return $this->link->query($sql);
        }

        public function execute($sql){
            return $this->link->execute_query($sql);
        }

        public function __sleep()
        {
            return array('host', 'user', 'pass', 'db');
        }

        public function GetMySQL(){
            return $this->link;
        }

        public function __destruct()
        {
            $link = null;
        }

        public function __wakeup()
        {
            self::__construct();
        }
    }
?>