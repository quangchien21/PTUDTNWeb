<?php
session_start();
	if(isset($_SESSION['tendaydu'])) {
		
	}else {
		header("location:login.php");
	}
include('connect.php');
$ID = $_GET['ID'];
$sql1 = "SELECT * FROM sach WHERE id = '$ID'";
$stmt = $conn->prepare($sql1);
$query = $stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if(!empty($_POST['submit'])){
    if (isset($_POST['tensach']) && isset($_POST['loaisach']) && isset($_POST['tacgia']) && isset($_POST['namxb']) && isset($_POST['tomtat'])) {
        $tensach = $_POST['tensach'];
        $tomtat = $_POST['tomtat'];
        $tacgia = $_POST['tacgia'];
        $namxb = $_POST['namxb'];  
        $loaisach = $_POST['loaisach'];
        
       
      
        

        $sql = "UPDATE sach SET tensach = '$tensach', tomtat = '$tomtat', tacgia = '$tacgia' , namxb = '$namxb', loaisach = '$loaisach'  WHERE id = '$ID'";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        if($query){
            header("location: admin.php");
        }else{
            echo "Sua that bai, vui long thu lai!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>QUẢN LÝ THƯ VIỆN - ĐẶNG QUANG CHIẾN</title>
    <link type="text/css" rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <header>
        <div class="anh">
            <img src="logo.jpg" alt="logo" class="logo">
        </div>
        <div class="tieude">
            <h1>Quan Ly Thu Vien</h1>
        </div>
    </header>
    <content>
        <div class="container">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="">Hi <?= $_SESSION['tendaydu'] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="admin.php">Trang chủ</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="signout.php">Đăng xuất</a>
                </li>
            </ul>
            <form action="" method="post">
                <fieldset class="form-group">
                    <label for="formGroupExampleInput">Tên sách</label>
                    <input type="text" name="tensach" value="<?php echo $result['tensach']; ?>" class="form-control"
                        placeholder="Nhập tên sách">
                </fieldset>

                <fieldset class="form-group">
                    <label for="formGroupExampleInput">Tóm tắt</label>
                    <input type="text" name="tomtat" value="<?php echo $result['tomtat']; ?>" class="form-control"
                        placeholder="Nhập tóm tắt">
                </fieldset>

                <fieldset class="form-group">
                    <label for="formGroupExampleInput">Tác giả</label>
                    <td>
                        <input type="text" name="tacgia" value="<?php echo $result['tacgia']; ?>" class="form-control"
                            placeholder="Nhập tên tác giả">
                    </td>
                </fieldset>

                <fieldset class="form-group">
                    <label for="formGroupExampleInput">Năm xuất bản</label>
                    <input type="text" name="namxb" value="<?php echo $result['namxb']; ?>" class="form-control"
                        placeholder="Nhập năm xuất bản">
                </fieldset>

                <fieldset class="form-group">
                    <label for="formGroupExampleInput">Loại sách</label>
                    <input type="text" name="loaisach" value="<?php echo $result['loaisach']; ?>" class="form-control"
                        placeholder="Nhập loại sách">
                </fieldset>

                <fieldset class="form-group">
                    <input type="submit" name="submit" value="Lưu" class="form-control">
                </fieldset>
                <fieldset class="form-group">
                    <input type="button" name="back" value="Quay lại" onclick="location.href='admin.php'"
                        class="form-control">
                </fieldset>
            </form>
        </div>
    </content>
    <footer>ĐẶNG QUANG CHIẾN - 92443 - TTM62DH</footer>
</body>

</html>