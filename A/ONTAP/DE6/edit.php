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
        $sql1 = "SELECT * FROM dieutri WHERE ID = '$ID'";
        $stmt1 = $conn->prepare($sql1);
        $query1 = $stmt1->execute();
        $item = $stmt1->fetch(PDO:: FETCH_ASSOC);
    }

    if(!empty($_POST['submit'])){
        if(isset($_POST['nhanvien_id']) && isset($_POST['loaibenh']) && isset($_POST['hovaten_benhnhan']) && isset($_POST['ngaybatdau']) && isset($_POST['ngayketthuc']) && isset($_POST['nhanxet'])){
            $nhanvien_id = $_POST['nhanvien_id'];
            $loaibenh = $_POST['loaibenh'];
            $hovaten_benhnhan = $_POST['hovaten_benhnhan'];
            $ngaybatdau = $_POST['ngaybatdau'];
            $ngayketthuc = $_POST['ngayketthuc'];
            $nhanxet = $_POST['nhanxet'];

            $sql = "UPDATE dieutri SET nhanvien_id='$nhanvien_id', loaibenh='$loaibenh', hovaten_benhnhan='$hovaten_benhnhan', ngaybatdau='$ngaybatdau', ngayketthuc='$ngayketthuc', nhanxet= '$nhanxet' WHERE ID = '$ID'";
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
    <title>Thêm điều trị</title>
</head>

<body>
    <header>
        <div class="anh">
            <img src="logo.jpg" alt="logo" class="logo">
        </div>
        <div class="tieude">
            <h1>Thêm điều trị</h1>
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
                    <label>Loai benh</label>
                    <input type="text" name="loaibenh" value="<?php echo $item['loaibenh']?>" placeholder=" nhap ma nhan
                        vien" class="form-control">
                </fieldset>
                <fieldset class="form-group">
                    <label>Ho va ten benh nhan</label>
                    <input type="text" name="hovaten_benhnhan" value="<?php echo $item['hovaten_benhnhan']?>"
                        placeholder="nhap ma nhan vien" class="form-control">
                </fieldset>
                <fieldset class="form-group">
                    <label>Ngay bat dau</label>
                    <input type="datetime-local" name="ngaybatdau" value="<?php echo $item['ngaybatdau']?>"
                        placeholder="nhap ma nhan vien" class="form-control">
                </fieldset>
                <fieldset class="form-group">
                    <label>Ngay ket thuc</label>
                    <input type="datetime-local" name="ngayketthuc" value="<?php echo $item['ngayketthuc']?>"
                        placeholder="nhap ma nhan vien" class="form-control">
                </fieldset>
                <fieldset class="form-group">
                    <label>Nhan xet</label>
                    <input type="text" name="nhanxet" value="<?php echo $item['nhanxet']?>"
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