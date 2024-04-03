<?php
$items = $cart->getCart();
$titles = array("Tên điện thoại", "Giá", "Số lượng", "Thêm/Giảm/Xóa", "Thành tiền"); 
$total = 0; 

echo '<div id="cart"><table>';
echo '<tr>';
foreach ($titles as $title) { 
    echo '<th>' . $title . '</th>';
}
echo '</tr>';

foreach ($items as $id => $value) { 
    echo '<tr>';
    echo '<td>' . $value->GetTen() . '</td>';
    echo '<td style="text-align:right">' . $value->GetGia() . '</td>';
    echo '<td style="text-align:right">' . $value->GetSL() . '</td>';
    $subtotal = $value->GetSL() * $value->GetGia(); 
    $total += $subtotal;
    echo '<td>
            <a href="" onclick="editCart(' . $id . ', 0)">Thêm</a>
            <a href="" onclick="editCart(' . $id . ', 1)">Giảm</a>
            <a href="" onclick="editCart(' . $id . ', 2)">Xóa</a>
          </td>';
    echo '<td style="text-align:right">' . $subtotal . '</td>';
    echo '</tr>';
}

echo '<tr><td></td><td></td><td colspan="3" style="text-align:right; color:red; font-weight: bold">Tổng tiền: ' . $total . '</td></tr>';
echo '</table><br/><a href="phoneshop.php">Trang chủ</a></div>';
?>
