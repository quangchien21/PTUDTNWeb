<?php 
	session_start();
	$username = $_POST['username'];
	$matkhau = $_POST['matkhau'];

	$connect = mysqli_connect("localhost", "Student", "123", "banhang2");
	if(! $connect) {
		echo 'Kết nối Database thất bại';
	}else {
		$loginQuery = "SELECT * FROM user WHERE username = '$username'";
		$user = mysqli_query($connect, $loginQuery);
		if(mysqli_num_rows($user) > 0) {
			while($row = mysqli_fetch_array($user)) {
				if($row['matkhau'] == $matkhau) {
					$_SESSION['tendaydu'] = $row['tendaydu'];
					header("location:index.php");
				}else {
					header("location:login.php");
				}
			}
		}else {
			unset($_SESSION['tendaydu']);
			echo 'Đăng nhập thất bại';
		}
	}
?>