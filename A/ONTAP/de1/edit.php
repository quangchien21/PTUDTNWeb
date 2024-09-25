<?php
session_start();
	if(isset($_SESSION['tendaydu'])) {
		
	}else {
		header("location:login.php");
	}
include('connect.php');
$ID = $_GET['ID'];
$sql1 = "SELECT * FROM donhang WHERE ID = '$ID'";
$stmt = $conn->prepare($sql1);
$query = $stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if(!empty($_POST['submit'])){
    if(isset($_POST['khachhang_id'])&&isset($_POST['trangthai'])&&isset($_POST['khuyenmai'])&&isset($_POST['ngayban']) && isset($_POST['ngaygiaohang'])&& isset($_POST['ghichu'])){

        $khachhang_id = $_POST['khachhang_id'];
        $trangthai = $_POST['trangthai'];
        $khuyenmai = $_POST['khuyenmai'];
        $ngayban = $_POST['ngayban'];
        $ngaygiaohang = $_POST['ngaygiaohang'];
        $ghichu = $_POST['ghichu'];
        
        $sql = "UPDATE donhang SET khachhang_id = '$khachhang_id', trangthai = '$trangthai', khuyenmai = '$khuyenmai', ngayban = '$ngayban', ngaygiaohang = '$ngaygiaohang', ghichu = '$ghichu' WHERE ID = '$ID'";
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
            <h1 class="text-uppercase">Chỉnh sửa đơn hàng</h1>
        </div>
    </header>
    <content>
        <div class="container">
            <!-- <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="">Hi <?= $_SESSION['tendaydu'] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="admin.php">Trang chủ</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="signout.php">Đăng xuất</a>
                </li>
            </ul> -->
            <form action="" method="post">
                <fieldset class="form-group">
                    <label>ID Khách hàng</label>
                    <input type="text" name="khachhang_id" value="<?php echo $result['khachhang_id']; ?>"
                        placeholder="Nhập ID khách hàng" class="form-control">
                </fieldset>

                <fieldset class="form-group">
                    <label>Trạng thái</label>
                    <select name="trangthai" class="form-control">
                        <option value="1" <?php echo $result['trangthai'] == '1' ? 'selected' : ''; ?>>Có
                        </option>
                        <option value="0" <?php echo $result['trangthai'] == '0' ? 'selected' : ''; ?>>Không
                        </option>
                    </select>

                </fieldset>
                <fieldset class="form-group">
                    <label>Khuyến mãi</label>
                    <input type="text" name="khuyenmai" value="<?php echo $result['khuyenmai']; ?>"
                        placeholder="Chỉ nhập giá fieldsetị khuyến mãi" class="form-control">

                </fieldset>
                <fieldset class="form-group">
                    <label>Ngày bán</label>
                    <input type="datetime-local" name="ngayban" value="<?php echo $result['ngayban']; ?>"
                        placeholder="Nhập ngày bán" class="form-control">
                </fieldset>
                <fieldset class="form-group">
                    <label>Ngày giao hàng</label>
                    <input type="datetime-local" name="ngaygiaohang" value="<?php echo $result['ngaygiaohang']; ?>"
                        placeholder="Nhập ngày giao hàng" class="form-control">
                </fieldset>
                <fieldset class="form-group">
                    <label>Ghi chú</label>
                    <input type="text" name="ghichu" value="<?php echo $result['ghichu']; ?>" placeholder="Nhập ghi chú"
                        class="form-control">
                </fieldset>


                <br>
                <input type="submit" name="submit" value="Lưu" class="form-control">
                <br>
                <input type="button" name="back" value="Quay lại" onclick="location.href='admin.php'"
                    class="form-control">
            </form>
        </div>
    </content>
    <footer class="text-center">
        <p>ĐẶNG QUANG CHIẾN - 92443 - TTM62DH</p>
        <p>Hi <?= $_SESSION['tendaydu'] ?></p>
    </footer>
</body>

</html>