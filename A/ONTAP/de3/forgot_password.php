<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    unset($_SESSION['tendaydu']);

    include('connect.php');
    
    if(!empty($_POST["submit"])){
        if(isset($_POST["username"]) && isset($_POST["password"])){
            $username = $_POST["username"];
            $password = $_POST["password"];

           
                $sql = "UPDATE user SET matkhau = '$password' where username = '$username'";
                $stmt = $conn->prepare($sql);
                $query = $stmt->execute();
                if($query){
                    header('location: login.php');
                    exit();
                }
                else{
                    echo "Ten tai khoan khong ton tai";
                } 
        }
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Quen mat khau</title>
</head>

<body>
    <div class="container">
        <h1 style="text-align: center">Doi mat khau</h1>
        <form method="post">
            <fieldset class="form-group">
                <label>username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Nhap username"
                    class="form-control">
            </fieldset>
            <fieldset class="form-group">
                <Label>password</Label>
                <input type="password" name="password" class="form-control" placeholder="nhap password moi"
                    class="form-control">
            </fieldset>
            <br>
            <fieldset class="form-group">
                <input type="submit" name="submit" value="Save" class="form-control btn-success">
                <br>
                <input type="button" name="back" value="Back" onclick="window.location='login.php'"
                    class="form-control btn-success">
            </fieldset>



        </form>
    </div>
</body>

</html>