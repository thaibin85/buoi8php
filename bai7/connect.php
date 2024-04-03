<?php
    class Connect {

        private $conn;
        private $link;
        const db_host = "localhost";
        const db_name = "store";
        const db_user = "root";
        const db_password = "";


        public function __construct()
        {
            
            $this->link = new  mysqli(self::db_host,self::db_user,self::db_password,self::db_name);
            if(mysqli_connect_error()){
                echo mysqli_connect_error();
            }
        }

        public function __destruct()
        {
            $link = null;
        }

        public function query($sql){
            return $this->link->query($sql);
        }

        public function excuteInsertPhone($ten,$gia,$anh){
            $sql = "Insert into tblphone values(?,?,?)";

            $stmt = $this->link->prepare($sql);

            $stmt->bind_param('sss',$ten,$anh,$gia);

            return $stmt->execute();
        }
    }
?>