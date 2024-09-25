<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Đăng nhập</title>
</head>
<?php 
	session_start();
	unset($_SESSION['tendaydu']);
?>

<body>
    <div class="container">
        <h1 class="text-center">Đăng nhập</h1>
        <form method="POST" action="./loginToDB.php" enctype="multipart/form-data">
            <fieldset class="form-group">
                <label>Tên đăng nhập</label>
                <input name="username" type="text" class="form-control">
            </fieldset>
            <fieldset class="form-group">
                <label>Mật khẩu</label>
                <input name="matkhau" type="password" class="form-control">
            </fieldset>
            <button type="submit" class="btn btn-success form-control">Đăng nhập</button>
            <br><br>
            <a href="forgot_password.php"><button type="button" class="btn btn-success form-control" name="forgot_pass"
                    value="Forgot Password">Quên mật khẩu</button></a>
        </form>

    </div>
</body>

</html>