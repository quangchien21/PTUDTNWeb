<?php 
session_start();
if (!isset($_SESSION['tendaydu'])) {
    header('location:login.php');
    exit(); 
}
include('connect.php');

if (!empty($_POST['submit'])) {
    if (isset($_POST['phongban_id']) && isset($_POST['dienthoai']) && isset($_POST['trinhdo_id']) && isset($_POST['hovaten']) && isset($_POST['trangthai'])&& isset($_POST['email'])) {
        $phongban_id = $_POST['phongban_id'];
        $trangthai = $_POST['trangthai'];
        $trinhdo_id = $_POST['trinhdo_id'];
        $hovaten = $_POST['hovaten'];  
        $dienthoai = $_POST['dienthoai'];
        $email = $_POST['email'];
        
        
        

        // Sử dụng prepared statements với placeholders để ngăn chặn SQL injection
        $sql = "INSERT INTO nhansu(phongban_id, trangthai, trinhdo_id , hovaten, dienthoai, email ) VALUES (:phongban_id, :trangthai , :trinhdo_id, :hovaten, :dienthoai, :email)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':phongban_id', $phongban_id, PDO::PARAM_INT);
        $stmt->bindParam(':dienthoai', $dienthoai, PDO::PARAM_STR);
        $stmt->bindParam(':trinhdo_id', $trinhdo_id, PDO::PARAM_INT);
        $stmt->bindParam(':hovaten', $hovaten, PDO::PARAM_STR);
        $stmt->bindParam(':trangthai', $trangthai, PDO::PARAM_INT);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);


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
    <title>QUẢN LÝ NHÂN SỰ - ĐẶNG QUANG CHIẾN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <header>
        <div class="anh">
            <img src="logo.jpg" alt="Logo" class="logo">
        </div>
        <div class="tieude">
            <h1 class="text-uppercase">Quản lý đơn hàng</h1>
        </div>
    </header>
    <content>
        <div class="container">
            <ul class="nav justify-content-center" style="background-color: #f1f1f1;">
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
                    <label>Mã phòng ban</label>
                    <select name="phongban_id" class="form-control">
                        <option value="0">Nhân sự</option>
                        <option value="1">Kỹ thuật</option>
                        <option value="2">Kinh doanh</option>
                        <option value="3">Marketing</option>
                        <option value="4">Giám đốc</option>
                    </select>
                </fieldset>

                <fieldset class="form-group">
                    <label>Trạng thái</label>
                    <select name="trangthai" class="form-control">
                        <option value="0">Thử việc</option>
                        <option value="1">Chính thức</option>
                        <option value="2">Nghỉ việc</option>
                    </select>
                </fieldset>

                <fieldset class="form-group">
                    <label>Trình độ</label>
                    <select name="trinhdo_id" class="form-control">
                        <option value="0">Phổ thông</option>
                        <option value="1">Trung cấp</option>
                        <option value="2">Cao đẳng</option>
                        <option value="3">Đại học</option>
                        <option value="4">Thạc sĩ</option>
                        <option value="5">Tiến sĩ</option>
                    </select>
                </fieldset>

                <fieldset class="form-group">
                    <label>Họ và tên</label>
                    <input type="text" name="hovaten" class="form-control" placeholder="Nhập học và tên" required>
                </fieldset>

                <fieldset class="form-group">
                    <label>Điện thoại</label>
                    <input type="text" name="dienthoai" class="form-control" placeholder="Nhập số điện thoại" required>
                </fieldset>

                <fieldset class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Nhập email" required>
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