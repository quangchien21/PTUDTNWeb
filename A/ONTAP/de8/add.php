<?php 
session_start();
if (!isset($_SESSION['tendaydu'])) {
    header('location:login.php');
    exit(); 
}
include('connect.php');

if (!empty($_POST['submit'])) {
    if (isset($_POST['tensach']) && isset($_POST['loaisach']) && isset($_POST['tacgia']) && isset($_POST['namxb']) && isset($_POST['tomtat'])) {
        $tensach = $_POST['tensach'];
        $tomtat = $_POST['tomtat'];
        $tacgia = $_POST['tacgia'];
        $namxb = $_POST['namxb'];  
        $loaisach = $_POST['loaisach'];
        
        
        

        // Sử dụng prepared statements với placeholders để ngăn chặn SQL injection
        $sql = "INSERT INTO sach(tensach, tomtat, tacgia , namxb, loaisach ) VALUES (:tensach, :tomtat , :tacgia, :namxb, :loaisach )";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':tensach', $tensach, PDO::PARAM_STR);
        $stmt->bindParam(':loaisach', $loaisach, PDO::PARAM_STR);
        $stmt->bindParam(':tacgia', $tacgia, PDO::PARAM_STR);
        $stmt->bindParam(':namxb', $namxb, PDO::PARAM_INT);
        $stmt->bindParam(':tomtat', $tomtat, PDO::PARAM_STR);

        $query = $stmt->execute();
        if ($query) {
            header('location: admin.php');
            exit(); 
        } else {
            echo "Thêm dữ liệu thất bại";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>QUẢN LÝ THƯ VIÊN - ĐẶNG QUANG CHIẾN</title>
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
            <form action="" method="post">
                <fieldset class="form-group">
                    <label>Tên sách</label>
                    <input type="text" name="tensach" class="form-control" placeholder="Nhập tên sách" required>
                </fieldset>

                <fieldset class="form-group">
                    <label>Tóm tắt</label>
                    <input type="text" name="tomtat" class="form-control" placeholder="Nhập tóm tắt" required>
                </fieldset>

                <fieldset class="form-group">
                    <label>Tác giả</label>
                    <input type="text" name="tacgia" class="form-control" placeholder="Nhập tên tác giả" required>
                </fieldset>

                <fieldset class="form-group">
                    <label>Năm xuất bản</label>
                    <input type="text" name="namxb" class="form-control" placeholder="Nhập năm xuất bản" required>
                </fieldset>

                <fieldset class="form-group">
                    <label>Loại sách</label>
                    <input type="text" name="loaisach" class="form-control" placeholder="Nhập loại sách" required>
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
        <br>
    </content>
    <footer>
        <p>ĐẶNG QUANG CHIẾN - 92443 - TTM62DH</p>
        <p><?php echo $_SESSION['tendaydu'] ?></p>
    </footer>
</body>

</html>