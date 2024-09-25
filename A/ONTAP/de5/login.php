<?php 
    session_start();
    unset($_SESSION['tendaydu']);

    include('connect.php');

    if(!empty($_POST['submit'])){
        if(isset($_POST['username']) && isset($_POST['password'])){
            $username = $_POST['username'];
            $matkhau = $_POST['password'];

            $sql = "SELECT * FROM user WHERE username = '$username' and matkhau = '$matkhau'";
            $stmt = $conn->prepare($sql);
            $query = $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row){
                $_SESSION['tendaydu'] = $row['tendaydu'];
                header('location: admin.php');
                exit();
            }
            else{
                echo "Dag nhap that bai";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1 style="text-align: center;">Dang nhap</h1>
        <form method="post">
            <fieldset class="form-group">
                <input type="text" name="username" placeholder="Nhap username" class="form-control">
            </fieldset>
            <br>
            <fieldset class="form-group">
                <input type="password" name="password" placeholder="nhap password" class="form-control">
            </fieldset>
            <br>
            <fieldset class="form-group">
                <input type="submit" name="submit" value="Dang nhap" class="form-control">
                <br>
                <input type="button" class="form-control" value="Quen mat khau"
                    onclick="window.location= 'forgot_password.php'">
            </fieldset>
        </form>
    </div>
</body>

</html>