<?php 
	// Lấy post
	$khachhang_id = $_POST['khachhang_id'];
	$trangthai = $_POST['trangthai'];
	$khuyenmai = $_POST['khuyenmai'];
	$ngayban = date('Y/m/d H:i:s', strtotime($_POST['ngayban']));
	$ngaygiaohang = date('Y/m/d H:i:s', strtotime($_POST['ngaygiaohang']));
	$ghichu = $_POST['ghichu'];

	$hanghoa_id = $_POST['hanghoa_id'];
	$soluong = $_POST['soluong'];
	$dongia = $_POST['dongia'];
	// $giamtru = $_POST['giamtru'];

	// Tạo kết nối
	$connect = mysqli_connect("localhost", "Student", "123", "banhang2");
	// Thêm đơn hàng
	$addDonhang = "INSERT INTO donhang (id, khachhang_id, trangthai, khuyenmai, ngayban, ngaygiaohang, ghichu) VALUES (NULL, '$khachhang_id', '$trangthai', '$khuyenmai', '$ngayban', '$ngaygiaohang', '$ghichu')";

	$donhang_id = 0;
	// Lấy ra id cao nhất trong bảng hàng hóa để thêm vào bảng chi tiết đơn hàng
	if(mysqli_query($connect, $addDonhang)){
		$idDonhangQuery = "SELECT MAX(id) as max_id FROM donhang";
		$idDonhang = mysqli_query($connect, $idDonhangQuery);
		if(mysqli_num_rows($idDonhang) > 0) {
			while($row = mysqli_fetch_array($idDonhang))
			{
				$donhang_id = $row['max_id'];
			}
			echo $donhang_id;
			// Thêm chi tiết đơn hàng
			$addChiTietDonHang = "INSERT INTO chitietdonhang (id, donhang_id, hanghoa_id, soluong, dongia, /*giamtru*/) VALUES (NULL, '$donhang_id', '$hanghoa_id', '$soluong', '$dongia', /*'$giamtru'*/)";
			if(mysqli_query($connect, $addChiTietDonHang)) {
				header("location:index.php"); 
			}else {
				echo 'Thêm thất bại';
			}
		}else {
			echo 'Thêm thất bại';
		}
	}

?>