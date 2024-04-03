<?php 
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<!DOCTYPE html>
<html>

<head>
    <title>Quản lý sinh viên</title>
</head>

<body>
    <h2>QUẢN LÝ SINH VIÊN</h2>
    <form action="" method="post">
        <table>
            <tr>
                <td>Mã sinh viên</td>
                <td><input type="text" size="10" name="txtMa" /></td>
            </tr>
            <tr>
                <td>Tên sinh viên</td>
                <td><input type="text" size="50" name="txtTen" /></td>
            </tr>
            <tr>
                <td>Lớp</td>
                <td><input type="text" size="20" name="txtLop" /></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Thêm" name="btnThem" /></td>
            </tr>
        </table>
    </form>

    <table>
        <tr>
            <th colspan="4">DANH SÁCH SINH VIÊN</th>
        </tr>
        <tr>
            <td>Mã sinh viên</td>
            <td>Tên sinh viên</td>
            <td>Xóa</td>
        </tr>
        <?php
        // Bao gồm tập tin kết nối cơ sở dữ liệu
        require_once('connect.php'); // Liên kết đến lớp kết nối CSDL

// Khởi tạo đối tượng kết nối
$mysqli = new MySQLi_Object();

// Lưu kết nối vào Session
$_SESSION['connection'] = serialize($mysqli);

// Kiểm tra nếu nút "Thêm" đã được click
if (isset($_POST['btnThem'])) {
    // Kiểm tra giá trị Mã, Tên và Lớp của sinh viên, nếu rỗng thì kết thúc
    if (empty($_POST['txtMa']) || empty($_POST['txtTen']) || empty($_POST['txtLop'])) {
        return;
    } else {
        // Ngược lại, nếu có giá trị thì tạo câu query thêm sinh viên
        // Sử dụng dấu ? để làm tham số cho dữ liệu sẽ được truyền vào dưới đây
        $query = 'INSERT INTO tblSINHVIEN VALUES (?,?,?)';
        
        // Khai báo một statement truy vấn dữ liệu, truyền câu query ở trên vào
        $stmt = $mysqli->GetMySQL()->prepare($query);

        // Kết buộc tham số cho câu truy vấn ở trên
        $stmt->bind_param('sss', $_POST['txtMa'], $_POST['txtTen'], $_POST['txtLop']);

        // Thực thi câu lệnh truy vấn
        $stmt->execute();
    }
}
    // khai bao them cau truy van lay toan bo sinh vien
    $query  = 'SELECT * FROM tblSINHVIEN';
  

    // Execute query and fetch result
    $result = $mysqli->query($query);

    while ($row = $result->fetch_assoc()) {
        echo '<tr><td>' . $row['Ma'] . '</td>';
        echo '<td>' . $row['Ten'] . '</td>';
        echo '<td><a href="mysqlProcess.php?Ma=' . $row['Ma'] . '">Xóa</a></td></tr>';
    }

?>
    </table>
    </tr>
    </table>
    </form>

</body>