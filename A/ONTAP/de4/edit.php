<?php
session_start();
	if(isset($_SESSION['tendaydu'])) {
		
	}else {
		header("location:login.php");
	}
include('connect.php');
$ID = $_GET['ID'];
$sql1 = "SELECT * FROM vandon WHERE id = '$ID'";
$stmt = $conn->prepare($sql1);
$query = $stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if(!empty($_POST['submit'])){
    if(isset($_POST['nhanvien_id'])&&isset($_POST['trangthai'])&&isset($_POST['nguoinhan'])&&isset($_POST['dienthoai']) && isset($_POST['ngaygiaohang'])&& isset($_POST['ghichu'])&& isset($_POST['diachi'])){

        $nhanvien_id = $_POST['nhanvien_id'];
        $trangthai = $_POST['trangthai'];
        $nguoinhan = $_POST['nguoinhan'];
        $dienthoai = $_POST['dienthoai'];
        $ngaygiaohang = $_POST['ngaygiaohang'];
        $ghichu = $_POST['ghichu'];
        $diachi = $_POST['diachi'];
        

        $sql = "UPDATE vandon SET nhanvien_id = '$nhanvien_id', trangthai = '$trangthai', nguoinhan = '$nguoinhan', dienthoai = '$dienthoai', ngaygiaohang = '$ngaygiaohang', ghichu = '$ghichu', diachi = '$diachi' WHERE id = '$ID'";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        if($query){
            header("location: admin.php");
        }else{
            echo "Sua that bai, vui long thu lai!";
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
            <h1>Quan Lý Vận Đơn</h1>
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
                    <input type="text" name="nhanvien_id" value="<?php echo $result['nhanvien_id']; ?>"
                        class="form-control" placeholder="Nhập mã nhân viên">
                </fieldset>
                <fieldset class="form-group">
                    <label>Trạng thái</label>
                    <select name="trangthai" id="trangthai" class="form-control">
                        <option value="0" <?= $result['trangthai'] == '0' ? 'selected' : ''; ?>>Thành công</option>
                        <option value="1" <?= $result['trangthai'] == '1' ? 'selected' : ''; ?>>Đang vận chuyển</option>
                        <option value="2" <?= $result['trangthai'] == '2' ? 'selected' : ''; ?>>Hủy vận đơn</option>
                    </select>
                </fieldset>
                <fieldset class="form-group">
                    <label>Người nhận</label>
                    <input type="text" name="nguoinhan" value="<?php echo $result['nguoinhan']; ?>" class="form-control"
                        placeholder="Nhập người nhận">
                </fieldset>
                <fieldset class="form-group">
                    <label>Điện thoại</label>
                    <input type="text" name="dienthoai" value="<?php echo $result['dienthoai']; ?>" class="form-control"
                        placeholder="Nhập số điện thoại">
                </fieldset>
                <fieldset class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" name="diachi" value="<?php echo $result['diachi']; ?>" class="form-control"
                        placeholder="Nhập địa chỉ">
                </fieldset>
                <fieldset class="form-group">
                    <label>Ngày giao hàng</label>
                    <input type="datetime-local" name="ngaygiaohang" value="<?php echo $result['ngaygiaohang']; ?>"
                        class="form-control" placeholder="Nhập ngày giao hàng">
                </fieldset>
                <fieldset class="form-group">
                    <label>Ghi chú</label>
                    <input type="text" name="ghichu" value="<?php echo $result['ghichu']; ?>" class="form-control"
                        placeholder="Nhập ghi chú">
                </fieldset>
                <fieldset class="form-group">
                    <input type="submit" name="submit" value="Lưu" class="form-control">
                </fieldset>
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