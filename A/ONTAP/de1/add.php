<?php 
session_start();
if (!isset($_SESSION['tendaydu'])) {
    header('location:login.php');
    exit(); 
}
include('connect.php');

if (!empty($_POST['submit'])) {
    if (isset($_POST['khachhang_id']) && isset($_POST['trangthai']) && isset($_POST['khuyenmai']) && isset($_POST['ngayban']) && isset($_POST['ngaygiaohang']) && isset($_POST['ghichu'])) {
        $khachhang_id = $_POST['khachhang_id'];
        $trangthai = $_POST['trangthai'];
        $khuyenmai = $_POST['khuyenmai'];
        $ngayban = $_POST['ngayban'];
        $ngaygiaohang = $_POST['ngaygiaohang'];
        $ghichu = $_POST['ghichu'];

        $sql = "INSERT INTO donhang(khachhang_id, trangthai, khuyenmai, ngayban, ngaygiaohang, ghichu) VALUES (:khachhang_id, :trangthai, :khuyenmai, :ngayban, :ngaygiaohang, :ghichu)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':khachhang_id', $khachhang_id, PDO::PARAM_INT);
        $stmt->bindParam(':trangthai', $trangthai, PDO::PARAM_INT);
        $stmt->bindParam(':khuyenmai', $khuyenmai, PDO::PARAM_STR);
        $stmt->bindParam(':ngayban', $ngayban, PDO::PARAM_STR);
        $stmt->bindParam(':ngaygiaohang', $ngaygiaohang, PDO::PARAM_STR);
        $stmt->bindParam(':ghichu', $ghichu, PDO::PARAM_STR);

        $query = $stmt->execute();
        if ($query) {
            header('location: admin.php');
            exit(); 
        } else {
            echo "Thêm dữ liệu thất bại";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>QUẢN LÝ ĐƠN HÀNG - ĐẶNG QUANG CHIẾN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <header>
        <div class="anh">
            <img src="logo.jpg" alt="Logo" class="logo">
        </div>
        <div class="tieude">
            <h1 class="text-uppercase">Thêm đơn hàng mới</h1>
        </div>
    </header>
    <content>
        <div class="container">
            <form action="" method="post">
                <fieldset class="form-group">
                    <label>ID Khách hàng</label>
                    <input type="text" name="khachhang_id" class="form-control" placeholder="Nhập ID khách hàng"
                        required>
                </fieldset>
                <fieldset class="form-group">
                    <label>Trạng thái</label>
                    <select name="trangthai" class="form-control">
                        <option value="1">Có</option>
                        <option value="0">Không</option>
                    </select>
                </fieldset>
                <fieldset class="form-group">
                    <label>Khuyến mãi</label>
                    <input type="text" name="khuyenmai" class="form-control" placeholder="Chỉ nhập số khuyến mãi"
                        required>
                </fieldset>
                <fieldset class="form-group">
                    <label>Ngày bán</label>
                    <input type="datetime-local" name="ngayban" class="form-control" required>
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