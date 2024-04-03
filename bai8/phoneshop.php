<?php
session_start();
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="styles.css"/>
<script type="text/javascript">
    function CreateXmlHttpRequest() {
        if(window.XMLHttpRequest)
            return new XMLHttpRequest();
        else if (window.ActiveXObject)
            return new ActiveXObject("Microsoft.XMLHTTP");
    }

    function AddCart(id, ten, gia) {
        xmlHttp = CreateXmlHttpRequest();
        xmlHttp.onreadystatechange = function () {
            if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                document.getElementById("count").innerHTML = xmlHttp.responseText;
            }
        };
        url = "AddCart.php?id=" + id + "&ten=" + ten + "&gia=" + gia; 
        xmlHttp.open("GET", url, true);
        xmlHttp.send();
    }
</script>
<style>
    body{
        margin-top: 0;
        padding: 0;
        text-align: center;
    }
    div#wrapper{
        width: 800px;
        margin: 0 auto;
    }
    div.product{
        width: 200px;
        float: left;
    }
    div.image img{
        height: 200px;
        width: 200px;
    }
    div.title a{
        color: #444;
        display: block;
        font-size: 18px;
        font-weight: 700;
        line-height: 15px;
        max-height: 30px;
        overflow: hidden;
        width: 100%;
        padding: 5px 0px;
        text-decoration: none;
    }
    div.title a:hover{
        color: #F30;
    }
    div.price{
        color: #c70101;
        font-size: 12px;
        font-weight: bold;
        line-height: 18px;
        vertical-align: middle;
        padding: 5px 0px;
    }

</style>
<title>SmartPhone Shop</title>
</head>
<body>
<div id="wrapper"> 
    <?php
    require_once('dbAccess.php');
    require_once('cart.php');
    $mysqli = new DbConnect();
    $results = $mysqli->query('select * from tblphone1');
    $count = isset($_SESSION['cart'])?unserialize($_SESSION['cart'])->countItem():0;
    echo '<div id="cart"><a href="showcart.php">gio hang('.$count.')</a></div>';
    while ($row = $results->fetch_assoc()) {
        echo "<div class=\"product\">";
        echo "<div class=\"image\"><img src=\"images/".$row['anh']."\"/></div>";
        echo "<div class=\"title\"><a href=\"#\">".$row['ten']."</a></div>";
        echo "<div class=\"price\">".$row['gia']."d</div>";
        echo "<div><input type=\"button\" value=\"Mua\" onclick=\"AddCart(".$row['id'].",'".$row['ten']."',". $row['gia'].")\"/></div>";
        echo "</div>";
    }
    ?>
</div>
</body>
</html>
