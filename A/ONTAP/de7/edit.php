<!DOCTYPE html>
<html lang="en">
<?php 
    session_start();
    if(!isset($_SESSION['tendaydu'])){
        header('location: login.php');
    }
    include('connect.php');
    if(!empty($_GET['ID'])){
        $ID = $_GET['ID'];
        $sql1 = "SELECT * FROM vandon WHERE ID = '$ID'";
        $stmt1 = $conn->prepare($sql1);
        $query1 = $stmt1->execute();
        $item = $stmt1->fetch(PDO:: FETCH_ASSOC);
    }

    if(!empty($_POST['submit'])){
        if(isset($_POST['nhanvien_id']) && isset($_POST['nguoinhan']) && isset($_POST['dienthoai']) && isset($_POST['diachi']) && isset($_POST['ngaygiaohang']) && isset($_POST['ghichu'])){
            $nhanvien_id = $_POST['nhanvien_id'];
            $nguoinhan = $_POST['nguoinhan'];
            $dienthoai = $_POST['dienthoai'];
            $diachi = $_POST['diachi'];
            $ngaygiaohang = $_POST['ngaygiaohang'];
            $ghichu = $_POST['ghichu'];

            $sql = "UPDATE vandon SET nhanvien_id='$nhanvien_id', nguoinhan='$nguoinhan', dienthoai='$dienthoai', diachi='$diachi', ngaygiaohang='$ngaygiaohang', ghichu= '$ghichu' WHERE ID = '$ID'";
            $stmt = $conn->prepare($sql);
            $query = $stmt->execute();
            if($query){
                header('location: admin.php');
                exit();
            }
            else{
                echo "SUA that bai";
            }
        }
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Thêm van don</title>
</head>

<body>
    <header>
        <div class="anh">
            <img src="logo.jpg" alt="logo" class="logo">
        </div>
        <div class="tieude">
            <h1>Thêm van don</h1>
        </div>
    </header>
    <content>
        <div class="container">
            <form method="post">
                <fieldset class="form-group">
                    <label>Ma nhan vien</label>
                    <input type="text" name="nhanvien_id" value="<?php echo $item['nhanvien_id']?>"
                        placeholder="nhap ma nhan vien" class="form-control">
                </fieldset>
                <fieldset class="form-group">
                    <label>Nguoi nhan</label>
                    <input type="text" name="nguoinhan" value="<?php echo $item['nguoinhan']?>" placeholder=" nhap ma nhan
                        vien" class="form-control">
                </fieldset>
                <fieldset class="form-group">
                    <label>Dien thoai</label>
                    <input type="text" name="dienthoai" value="<?php echo $item['dienthoai']?>"
                        placeholder="nhap ma nhan vien" class="form-control">
                </fieldset>
                <fieldset class="form-group">
                    <label>Dia chi</label>
                    <input type="text" name="diachi" value="<?php echo $item['diachi']?>"
                        placeholder="nhap ma nhan vien" class="form-control">
                </fieldset>
                <fieldset class="form-group">
                    <label>Ngay giao hang</label>
                    <input type="datetime-local" name="ngaygiaohang" value="<?php echo $item['ngaygiaohang']?>"
                        placeholder="nhap ma nhan vien" class="form-control">
                </fieldset>
                <fieldset class="form-group">
                    <label>Ghi chu</label>
                    <input type="text" name="ghichu" value="<?php echo $item['ghichu']?>"
                        placeholder="nhap ma nhan vien" class="form-control">
                </fieldset>
                <br>
                <fieldset class="form-group">
                    <input type="submit" name="submit" value="Save" class="form-control">
                    <br>
                    <input type="button" class="form-control" value="Back" onclick="window.location= 'admin.php'">
                </fieldset>
            </form>
        </div>
    </content>
    <footer>
        <label>Đặng Quang Chiến-92443-TTM62DH</label>
        <br>
        <label>Hi <?php echo $_SESSION['tendaydu']?></label>
    </footer>
</body>

</html>