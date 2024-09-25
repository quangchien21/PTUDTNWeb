<?php session_start(); unset($_SESSION['tendaydu']); include('connect.php'); if(!empty($_POST['submit'])){
    if(isset($_POST['username']) && isset($_POST['matkhau'])){ $username=$_POST['username'];
    $password=$_POST['matkhau']; $sql="SELECT * FROM user WHERE username = '$username' AND matkhau = '$password'" ;
    $stmt=$conn->prepare($sql);
    $query = $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!$row){
    echo "Đăng nhập thất bại";
    }
    else{
    $_SESSION['tendaydu'] = $row['tendaydu'];
    header('location: admin.php');

    }
    }
    }

    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Đăng nhập</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Đăng nhập</h1>
        <form method="POST">
            <fieldset class="form-group">
                <input name="username" type="text" placeholder="Nhập tên đăng" class="form-control">
            </fieldset>
            <br>
            <fieldset class="form-group">
                <input name="matkhau" type="password" placeholder="Nhập mật khẩu" class="form-control">
            </fieldset>
            <br>
            <fieldset class="form-group">
                <input type="submit" name="submit" class="form-control btn-success" value="Đăng nhập"></input>
            </fieldset>
            <br>
            <fieldset class="form-group">
                <input type="button" name="forgot_pass" value="Forgot Password"
                    onclick="window.location='forgot_password.php'" class="form-control btn-success"></input>
            </fieldset>
        </form>

    </div>
</body>

</html>