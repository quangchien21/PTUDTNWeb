<!DOCTYPE html>
<html lang="en">
<?php 
    session_start();
    unset($_SESSION['tendaydu']);
    
    include('connect.php');

    if(!empty($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "UPDATE user SET matkhau = '$password' WHERE username = '$username'";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        if($query){  
            header('location: login.php');
        }
        else{
            echo "sua that bai";
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
        <h1 style="text-align: center">Doi mat khau</h1>
        <form method="post">
            <fieldset class="form-group">
                <input type="text" name="username" placeholder="nhap ten dang nhap" class="form-control">
            </fieldset>
            <br>
            <fieldset class="form-group">
                <input type="password" name="password" placeholder="nhap mat khau moi" class="form-control">
            </fieldset>
            <br>
            <fieldset class="form-group">
                <input type="submit" name="submit" value="Save" class="form-control">
                <br>
                <input type="button" value="Back" onclick="window.location='login.php'" class="form-control">
            </fieldset>

        </form>
    </div>
</body>

</html>