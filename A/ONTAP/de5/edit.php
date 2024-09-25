<?php 

     session_start();
    if(!isset($_SESSION['tendaydu'])){
        header('location: login.php');
    }
    include('connect.php');

    if(!empty($_GET['ID'])){
        $ID = $_GET['ID'];
        $sql1 = "SELECT * FROM phieumuon WHERE ID = '$ID'";
        $stmt1 = $conn->prepare($sql1);
        $query1 = $stmt1->execute();
        $item = $stmt1->fetch(PDO::FETCH_ASSOC);
    }
    else{
        echo "Khong tim thay ID phieu muon";
    }

    if(!empty($_POST['submit'])){
        if(isset($_POST['nhanvien_id']) && isset($_POST['docgia_id']) && isset($_POST['ngaylapphieu']) && isset($_POST['diengiai']) && isset($_POST['trangthai'])){
            $nhanvien_id = $_POST['nhanvien_id'];
            $docgia_id = $_POST['docgia_id'];
            $ngaylapphieu = $_POST['ngaylapphieu'];
            $diengiai = $_POST['diengiai'];
            $trangthai = $_POST['trangthai'];

            $sql = "UPDATE phieumuon SET nhanvien_id ='$nhanvien_id', docgia_id='$docgia_id', ngaylapphieu='$ngaylapphieu', diengiai='$diengiai', trangthai='$trangthai' WHERE ID = '$ID'";
            $stmt = $conn->prepare($sql);
            $query = $stmt->execute();
            if($query){
                header('location: admin.php');
                exit();
            }
            else{
                echo "Sua that bai";
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
    <title>Theem phieu muon</title>
</head>

<body>
    <header>
        <div class="anh">
            <img src="logo.jpg" alt="logo" class="logo">
        </div>
        <div class="tieude">
            <h1>Them phieu muon</h1>
        </div>
    </header>
    <content>
        <div class="container">
            <form method="post">
                <fieldset class="form-group">
                    <label>Ma nhan vien</label>
                    <input type="text" name="nhanvien_id" placeholder="nhap ma nhan vien"
                        value="<?php echo $item['nhanvien_id']?>" class="form-control">
                </fieldset>
                <fieldset class="form-group">
                    <label>Doc gia</label>
                    <input type="text" name="docgia_id" placeholder="nhap ma doc gia"
                        value="<?php echo $item['docgia_id']?>" class="form-control">
                </fieldset>
                <fieldset class="form-group">
                    <label>Ngay lap phieu</label>
                    <input type="datetime-local" name="ngaylapphieu" value="<?php echo $item['ngaylapphieu']?>"
                        class="form-control">
                </fieldset>
                <fieldset class="form-group">
                    <label>Dien giai</label>
                    <input type="text" name="diengiai" placeholder="nhap dien giai"
                        value="<?php echo $item['diengiai']?>" class="form-control">
                </fieldset>
                <fieldset class="form-group">
                    <label>Trang thai</label>
                    <input type="text" name="trangthai" placeholder="nhap trang thai"
                        value="<?php echo $item['trangthai']?>" class="form-control">
                </fieldset>
                <feildset class="form-group">
                    <input type="submit" name="submit" value="Save" class="form-control">
                    <br>
                    <input type="button" name="back" value="Back" class="form-control"
                        onclick="window.location= 'admin.php'">
                </feildset>
            </form>
        </div>
    </content>
    <footer>
        <label>Dang Quang Chien-92443-TTM62DH</label>
        <label>Hi <?php echo $_SESSION['tendaydu']?></label>
    </footer>

</body>

</html>