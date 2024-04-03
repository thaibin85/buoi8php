<?php
// Khởi tạo Session
session_start();

// Liên kết đến lớp kết nối CSDL
require_once('connect.php');

// Kiểm tra xem kết nối có được lưu trong Session không
if (isset($_SESSION['connection'])) {
    // Nếu có thì lấy kết nối ra
    $link = unserialize($_SESSION['connection']);

    // Kiểm tra xem có Mã sinh viên hay không
    if (isset($_REQUEST['Ma'])) {
        // Nếu có thì tiến hành xóa sinh viên này ra khỏi CSDL
        $Ma = $_REQUEST['Ma'];
        $query = 'DELETE FROM tblsinhvien WHERE Ma = ?';
        $stmt = $link->GetMySQL()->prepare($query);
        $stmt->bind_param('s', $Ma);
        $stmt->execute();
    }
}

// Sau đó chuyển về lại trang chủ của chúng ta
echo '<script type="text/javascript">window.location = "connect.php"</script>';
exit();
?>