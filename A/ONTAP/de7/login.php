<!DOCTYPE html>
<html lang="en">
<?php 
    session_start();
    unset($_SESSION['tendaydu']);
    
    include('connect.php');

    if(!empty($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM user WHERE username = '$username' and matkhau = '$password'";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result){
            $_SESSION['tendaydu'] = $result['tendaydu'];
            header('location: admin.php');
        }
        else{
            echo "danh nhap that bai";
        }
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1 style="text-align: center">Dang nhap</h1>
        <form method="post">
            <fieldset class="form-group">
                <input type="text" name="username" placeholder="nhap ten dang nhap" class="form-control">
            </fieldset>
            <br>
            <fieldset class="form-group">
                <input type="password" name="password" placeholder="nhap mat khau" class="form-control">
            </fieldset>
            <br>
            <fieldset class="form-group">
                <input type="submit" name="submit" value="Login" class="form-control">
                <br>
                <input type="button" value="Quen mat khau" onclick="window.location='forgot_password.php'"
                    class="form-control">
            </fieldset>

        </form>
    </div>
</body>

</html>