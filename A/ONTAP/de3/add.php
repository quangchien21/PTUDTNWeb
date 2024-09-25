<!DOCTYPE html>
<html lang="en">
<?php 
    session_start();
    if(!isset($_SESSION['tendaydu'])){
        header('location: login.php');
    }
    include('connect.php');

    if(!empty($_POST['submit'])){
        if(isset($_POST['hocsinh_id']) && isset($_POST['namhoc']) && isset($_POST['nhanxetchung']) && isset($_POST['uudiem']) && isset($_POST['cankhacphuc']) && isset($_POST['duoclenlop'])){
            $hocsinh_id = $_POST['hocsinh_id'];
            $namhoc = $_POST['namhoc'];
            $nhanxetchung = $_POST['nhanxetchung'];
            $uudiem = $_POST['uudiem'];
            $cankhacphuc = $_POST['cankhacphuc'];
            $duoclenlop = $_POST['duoclenlop'];

            $sql = "INSERT INTO tongketnam(hocsinh_id, namhoc, nhanxetchung, uudiem, cankhacphuc, duoclenlop) VALUES('$hocsinh_id', '$namhoc', '$nhanxetchung', '$uudiem', '$cankhacphuc', '$duoclenlop')";
            $stmt = $conn->prepare($sql);
            $query = $stmt->execute();
            if($query){
                header('location: admin.php');
                exit();
            }
            else{
                echo "Them sinh vien that bai";
            }
        }
    }

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Thêm sinh viên</title>
</head>

<body>
    <header>
        <div class="anh">
            <img src="logo.jpg" alt="logo" class="logo">
        </div>
        <div class="tieude">
            <h1>Them sinh vien</h1>
        </div>
    </header>
    <content>
        <div class="container">
            <form method="post">
                <fieldset class="form-group">
                    <label>Ma hoc sinh</label>
                    <input type="text" name="hocsinh_id" placeholder="nhap ma hoc sinh" class="form-control">
                </fieldset>
                <fieldset>
                    <label>Nam hoc</label>
                    <input type="text" name="namhoc" placeholder="Nhap nam hoc" class="form-control">
                </fieldset>
                <fieldset class="form-group">
                    <label>Nhan xet chung</label>
                    <input type="text" name="nhanxetchung" placeholder="nhap nhan xet chung" class="form-control">
                </fieldset>
                <fieldset class="form-group">
                    <label>Uu diem</label>
                    <input type="text" name="uudiem" placeholder="nhap nhan xet chung " class="form-control">
                </fieldset>
                <fieldset class="form-group">
                    <label>Can khac phuc</label>
                    <input type="text" name="cankhacphuc" placeholder="nhap nhan xet chung " class="form-control">
                </fieldset>
                <fieldset class="form-group">
                    <label>Duoc len lop</label>
                    <input type="text" name="duoclenlop" placeholder="nhap nhan xet chung" class="form-control">
                </fieldset>
                <br>
                <fieldset class="form-group">
                    <input type="submit" name="submit" value="Save" class=" form-control btn btn-primary">
                </fieldset>
                <br>
                <fieldset class="" form-group>
                    <input type="button" name="back" value="BACK" onclick="window.location='admin.php'"
                        class=" form-control btn btn-primary">
                </fieldset>
            </form>
        </div>
    </content>
    <footer>
        <h1>Dang Quang Chien - 92443 -TTM62DH</h1><br>
        <label>Hi <?php echo $_SESSION["tendaydu"]?></label>
    </footer>

</body>

</html>