<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Giỏ hàng</title>
<script type="text/javascript">
function CreateXmlHttpRequest() {
    if (window.XMLHttpRequest)
        return new XMLHttpRequest();
    else if (window.ActiveXObject)
        return new ActiveXObject("Microsoft.XMLHTTP");
}

function editCart(id, type) {
    xmlHttp = CreateXmlHttpRequest();
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            document.getElementById("cart").innerHTML = xmlHttp.responseText;
        }
    };
    var url = "editcart.php?id=" + id + "&type=" + type;
    xmlHttp.open("GET", url, true);
    xmlHttp.send();
}
</script>
</head>
<body>
<?php
require_once('cart.php'); 
if (isset($_SESSION['cart'])){
    $cart = unserialize($_SESSION['cart']);
    include('viewcart.php'); 
}else{
    echo 'Chưa có sản phẩm nào trong giỏ hàng. <a href="phoneshop.php">Quay về</a>';
}
?>
</body>

