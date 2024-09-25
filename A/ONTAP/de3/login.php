<?php 
    session_start();
    unset($_SESSION['tendaydu']);

    include('connect.php');
    if(!empty($_POST["submit"])){
        if(isset($_POST["username"]) && isset($_POST['password'])){
                $username = $_POST["username"];
                $password = $_POST["password"];

                $sql = "SELECT * FROM user WHERE username = '$username' and matkhau = '$password'";
                $stmt = $conn->prepare($sql);
                $query = $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if(!$row){
                    echo "Dang nhap that bai";
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
    <link type="text/css" rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Dang nhap</title>
</head>

<body>

    <div>
        <h1 style="text-align: center">Danh nhap</h1>
    </div>
    <div class="container">
        <form action="" method="post">
            <fieldset class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="nhap username">
            </fieldset>
            <fieldset class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="nhap password">
            </fieldset>
            <br>
            <fieldset class="form-group">
                <input type="submit" name="submit" value="Dang nhap" class="form-control btn-success">
                <br>
                <input type="button" name="forgot_password" value="Quen mat khau"
                    onclick="window.location='forgot_password.php'" class="form-control btn-success">
            </fieldset>

        </form>
    </div>
</body>

</html>