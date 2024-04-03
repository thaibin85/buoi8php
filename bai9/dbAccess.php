<?php 
class DbConnect{
    const host = 'localhost';
    const user = 'root';
    const pass = '';
    const db = 'store';
    private $link;
    public function __construct(){
        $this->link = new mysqli(self::host, self::user, self::pass, self::db);
        if(mysqli_connect_errno()){
            echo mysqli_connect_errno();
        }
    }
    public function __destruct(){
        $link = null;
    }
    public function query($query){
        return $this->link->query($query);
    }
    public function executeInsertPhone($ten, $gia, $anh){
        $query = "insert into tblphone1(ten, gia, anh) values (?, ?, ?)";
        $stmt = $this->link->prepare($query);
        $stmt->bind_param('sss', $ten, $gia, $anh);
        return $stmt->execute();
    }
}
?>