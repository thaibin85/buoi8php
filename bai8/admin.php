<?php
session_start();
if(!isset($_SESSION['User'])) {
    echo '<script type="text/javascript"> window.location = "login.php"; </script>';
    exit(); // Added to stop further execution if not logged in
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Add Phone</title>
</head>
<body>
    <div id="wrapper">
        <form action="" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td></td>
                    <td>
                        <?php
                            echo 'Xin chào '.$_SESSION['User'].' <a href="thoat.php">Thoát</a>';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Tên điện thoại</td>
                    <td><input type="text" name="txtName"/></td>
                </tr>
                <tr>
                    <td>Giá điện thoại</td>
                    <td><input type="number" name="txtPrice" min="0" max="30000000"/></td> 
                </tr>
                <tr>
                    <td>Ảnh</td>
                    <td><input type="file" name="txtImage"/></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Thêm" name="btnAdd"/></td>
                </tr>
            </table>
        </form>
    </div>

    <?php
    require_once('dbAccess.php');
    if (isset($_POST['btnAdd'])) {
        $name = $_POST['txtName'];
        $gia = $_POST['txtPrice'];
        $file = $_FILES['txtImage'];
        
        // Check for errors in file upload
        if ($file['error'] !== UPLOAD_ERR_OK) {
            die("File upload failed with error code " . $file['error']);
        }

        // Check if the directory exists, create it if not
        $targetDir = 'images/';
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        // Move the uploaded file to the target directory
        $targetPath = $targetDir . $file['name'];
        if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
            die("Failed to move uploaded file to $targetPath");
        }

        // Insert data into database
        $mysqli = new DbConnect();
        $mysqli->executeInsertPhone($name, $gia, $file['name']);
    }
?>

</body>
</html>
