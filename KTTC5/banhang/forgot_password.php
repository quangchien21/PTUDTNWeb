<?php
include('connect.php');
if(!empty($_POST['submit'])){
	if(isset($_POST['username'])&&isset($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql1 = "UPDATE user SET matkhau = '$password' WHERE username = '$username'";
		$stmt = $conn->prepare($sql1);
		$query = $stmt->execute();
		if($query){
			header("location:login.php");
			exit();
		}else{
			echo "Them that bai, vui long thu lai";
		}
	}
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <form method="post">
            <table class="table table-inverse">
                <tbody>
                    <tr>
                        <td>Nhập username</td>
                        <td><input type="text" name="username"></td>
                    </tr>
                    <tr>
                        <td>Nhập password</td>
                        <td><input type="password" name="password"></td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" name="submit" value="submit" class="btn btn-info">Lưu</button>
        </form>
    </div>
</body>