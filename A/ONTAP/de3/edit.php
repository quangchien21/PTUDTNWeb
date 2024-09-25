<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chinh thong tin sinh vien</title>
</head>
<?php
    session_start();
    if(!isset($_SESSION['tendaydu'])){
        header('location: login.php');
    }

    include('connect.php');
    if (isset($_GET['ID']) && !empty($_GET['ID'])) {
        $id = $_GET['ID'];
        $sql = "SELECT * FROM tongketnam WHERE id = '$id'";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            echo "Không tìm thấy thông tin sinh viên.";
            exit();
        }
    } else {
        echo "ID không hợp lệ.";
        exit();
    }

   if(!empty($_POST['submit'])){
        if(isset($_POST['hocsinh_id']) && isset($_POST['namhoc']) && isset($_POST['nhanxetchung']) && isset($_POST['uudiem']) && isset($_POST['cankhacphuc']) && isset($_POST['duoclenlop'])){
            $hocsinh_id = $_POST['hocsinh_id'];
            $namhoc = $_POST['namhoc'];
            $nhanxetchung = $_POST['nhanxetchung'];
            $uudiem = $_POST['uudiem'];
            $cankhacphuc = $_POST['cankhacphuc'];
            $duoclenlop = $_POST['duoclenlop'];

            $sql1 = "UPDATE tongketnam set hocsinh_id = '$hocsinh_id', namhoc = '$namhoc', nhanxetchung = '$nhanxetchung', uudiem = '$uudiem', cankhacphuc = '$cankhacphuc', duoclenlop = '$duoclenlop' where id = '$id'";
            $stmt1 = $conn->prepare($sql1);
            $query1 = $stmt1->execute();
            if($query1){
                header('location: admin.php');
                exit();
            }
            else{
                echo "Them sinh vien that bai";
            }
        }
    }
?>

<body>
    <header>
        <div class="anh">
            <img src="logo.jpg" alt="logo" class="logo">
        </div>
        <div class="tieude">
            <h1>Chinh thong tin sinh vien</h1>
        </div>
    </header>
    <content>
        <div class="container">
            <form method="post">
                <fieldset class="form-group">
                    <label>ID hoc sinh</label>
                    <input type="text" name="hocsinh_id" placeholder="nhap ma hoc sinh"
                        value="<?php echo $result['hocsinh_id']; ?>" class=" form_control">
                </fieldset>
                <fieldset class="form-group">
                    <label>Nam học</label>
                    <input type="text" name="namhoc" placeholder="nhap ma hoc sinh"
                        value="<?php echo $result['namhoc'];?>" class="form_control">
                </fieldset>
                <fieldset class="form-group">
                    <label>Nhan xet chung</label>
                    <input type="text" name="nhanxetchung" placeholder="nhap ma hoc sinh"
                        value="<?php echo $result['nhanxetchung'];?>" class="form_control">
                </fieldset>
                <fieldset class="form-group">
                    <label>Uu diem</label>
                    <input type="text" name="uudiem" placeholder="nhap ma hoc sinh"
                        value="<?php echo $result['uudiem'];?>" class="form_control">
                </fieldset>
                <fieldset class="form-group">
                    <label>Can khac phuc</label>
                    <input type="text" name="cankhacphuc" value="<?php echo $result['cankhacphuc']?>"
                        placeholder="nhap can khac phuc" class="form-control">
                </fieldset>
                <fieldset class="form-group">
                    <label>Duoc len lop</label>
                    <input type="text" name="duoclenlop" value="<?php echo $result['duoclenlop']?>"
                        placeholder="Nhap duoc len lop" class="form-control">
                </fieldset>
                <fieldset class="form-group">
                    <input type="submit" name="submit" value="Luu thay doi" class="btn btn-primary">
                </fieldset>
                <fieldset class="form-group">
                    <input type="button" name="back" value="BACK" onclick="window.location='admin.php'">
                </fieldset>

            </form>
        </div>
    </content>
    <footer>
        <h1>Dang Quang Chien-92243-TTM62DH</h1>
        <label>Hi <?php echo $_SESSION['tendaydu']?></label>
    </footer>
</body>

</html>