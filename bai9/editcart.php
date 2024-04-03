<?php
require_once('cart.php');
session_start();
$cart = unserialize($_SESSION['cart']); 

$items = $cart->GetCart();
$id = $_REQUEST['id']; 

switch ($_REQUEST['type']) { 
    case '0':
        $items[$id]->SetSL($items[$id]->GetSL() + 1);
        break;
    case '1':
        if ($items[$id]->GetSL() > 1) {
            $items[$id]->SetSL($items[$id]->GetSL() - 1); 
        } else {
            $cart->removeItem($id);
        }
        break;
    case '2':
        $cart->removeItem($id);
        break;
}

$_SESSION['cart'] = serialize($cart);

include('viewcart.php'); 
?>
