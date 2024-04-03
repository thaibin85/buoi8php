<?php 
require_once('item.php');
require_once('dbAccess.php');
class cart{
    private $items;
    public function __construct(){
        $this->items = array();
    }
    public function __destruct(){
        $this->items=null;
    }
    public function insertItem($item){
        $id = $item->GetId();
        if(!array_key_exists($id, $this->items)){
            $this->items[$id] = $item;
        }else{
            $this->items[$id]->SetSL($this->items[$id]->GetSL() + 1);
        }        
    }
    public function removeItem($id){
        unset($this->items[$id]);
    }
    public function countItem(){
        return count($this->items);
    }
    public function getCart(){
        return $this->items;
    }
}
?>