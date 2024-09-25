<?php 
session_start();
if (!isset($_SESSION['tendaydu'])) {
    header('location:login.php');
    exit(); // Thêm exit() sau header để dừng thực thi script
}
include('connect.php');

if (!empty($_POST['submit'])) {
    if (isset($_POST['nhanvien_id']) && isset($_POST['trangthai']) && isset($_POST['nguoinhan']) && isset($_POST['dienthoai']) && isset($_POST['ngaygiaohang']) && isset($_POST['ghichu'])&& isset($_POST['diachi'])) {
        $nhanvien_id = $_POST['nhanvien_id'];
        $trangthai = $_POST['trangthai'];
        $nguoinhan = $_POST['nguoinhan'];
        $diachi = $_POST['diachi'];
        $dienthoai = $_POST['dienthoai'];
        $ngaygiaohang = $_POST['ngaygiaohang'];
        $ghichu = $_POST['ghichu'];

        // Sử dụng prepared statements với placeholders để ngăn chặn SQL injection
        $sql = "INSERT INTO vandon(nhanvien_id, trangthai, nguoinhan, dienthoai, diachi, ngaygiaohang, ghichu) VALUES (:nhanvien_id, :trangthai, :nguoinhan, :dienthoai, :diachi, :ngaygiaohang, :ghichu)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nhanvien_id', $nhanvien_id, PDO::PARAM_INT);
        $stmt->bindParam(':trangthai', $trangthai, PDO::PARAM_INT);
        $stmt->bindParam(':nguoinhan', $nguoinhan, PDO::PARAM_STR);
        $stmt->bindParam(':dienthoai', $dienthoai, PDO::PARAM_STR);
        $stmt->bindParam(':diachi', $diachi, PDO::PARAM_STR);
        $stmt->bindParam(':ngaygiaohang', $ngaygiaohang, PDO::PARAM_STR);
        $stmt->bindParam(':ghichu', $ghichu, PDO::PARAM_STR);

        $query = $stmt->execute();
        if ($query) {
            header('location: admin.php');
            exit(); // Dừng thực thi sau khi chuyển hướng
        } else {
            echo "Thêm dữ liệu thất bại";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>QUẢN LÝ VẬN ĐƠN - ĐẶNG QUANG CHIẾN</title>
    <link type="text/css" rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <header>
        <div class="anh">
            <img src="logo.jpg" alt="logo" class="logo">
        </div>
        <div class="tieude">
            <h1>Quan Ly Vận Đơn</h1>
        </div>
    </header>
    <content>
        <div class="container">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="">Hi <?= $_SESSION['tendaydu'] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="admin.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Đăng xuất</a>
                </li>
            </ul>
            <form action="" method="post">
                <fieldset class="form-group">
                    <label>Mã nhân viên</label>
                    <input type="text" name="nhanvien_id" class="form-control" placeholder="Nhập mã nhân viên" required>
                </fieldset>
                <fieldset class="form-group">
                    <label>Trạng thái</label>
                    <select name="trangthai" class="form-control">
                        <option value="0">Thành công</option>
                        <option value="1">Đang vận chuyển</option>
                        <option value="2">Hủy vận đơn</option>
                    </select>
                </fieldset>
                <fieldset class="form-group">
                    <label>Người nhận</label>
                    <input type="text" name="nguoinhan" class="form-control" placeholder="Nhập tên người nhận" required>
                </fieldset>
                <fieldset class="form-group">
                    <label>Điện thoại</label>
                    <input type="text" name="dienthoai" class="form-control" required>
                </fieldset>
                <fieldset class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" name="diachi" class="form-control" placeholder="Nhập địa chỉ" required>
                </fieldset>
                <fieldset class="form-group">
                    <label>Ngày giao hàng</label>
                    <input type="datetime-local" name="ngaygiaohang" class="form-control" required>
                </fieldset>
                <fieldset class="form-group">
                    <label>Ghi chú</label>
                    <input type="text" name="ghichu" class="form-control" placeholder="Nhập ghi chú" required>
                </fieldset>
                <br>
                <fieldset class="form-group">
                    <input type="submit" name="submit" value="Lưu" class="form-control">
                </fieldset>
                <br>
                <fieldset class="form-group">
                    <input type="button" name="back" value="Quay lại" onclick="location.href='admin.php'"
                        class="form-control">
                </fieldset>
            </form>
        </div>
    </content>
    <footer>ĐẶNG QUANG CHIẾN - 92443 - TTM62DH</footer>
</body>

</html>