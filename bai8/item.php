<?php 
class item{
    private $id, $ten, $gia, $anh, $soluong;
    public function __construct($id, $ten, $gia, $anh){
        $this->id = $id;
        $this->ten = $ten;
        $this->gia = $gia;
        $this->anh = $anh;
        $this->soluong = 1;
    }
    public function __destruct(){
        $this->id = $this->ten = $this->gia = $this->anh = $this->soluong = null;
    }
    public function GetId() {
        return $this->id;
    }
    
    public function GetTen() {
        return $this->ten;
    }
    
    public function GetGia() {
        return $this->gia;
    }
    
    public function GetSL() {
        return $this->soluong;
    }
    
    public function SetSL($soluong) {
        $this->soluong = $soluong;
    }
    

}
?>