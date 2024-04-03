<?php
require_once('cart.php');
session_start();
$cart = isset($_SESSION['cart'])? unserialize($_SESSION['cart']): new cart();
$id = $_REQUEST['id'];
$ten = $_REQUEST['ten'];
$gia = $_REQUEST['gia'];
$item  = new item($id, $ten, $gia, '');
$cart->insertItem($item);
$_SESSION['cart'] = serialize($cart);

echo $cart->countItem();
?>