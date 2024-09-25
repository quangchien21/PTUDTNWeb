<?php

    session_start();
    unset($_SESSION['tendaydu']);
    include('connect.php');
    
    
    if(!empty($_POST["submit"])){
        $search = $_POST["search"];
        $sql = "SELECT * FROM tongketnam WHERE hocsinh_id LIKE '%$search%'";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $result[] = $row;
        }   
    }
    else{
        $sql = "SELECT * FROM tongketnam";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $result []= $row;
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
    <link type="text/css" rel="stylesheet" href="style.css">
    <title>Quản lý học sinh</title>
</head>

<body>
    <header>
        <div class="anh">
            <img src="logo.jpg" alt="logo" class="logo">
        </div>
        <div class="tieude">
            <h1>Quản Lý Học Sinh</h1>
        </div>
    </header>
    <content>
        <div class="container">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="list.php">Danh sách học sinh</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cau1.jpg">Ảnh câu 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Đăng nhập</a>
                </li>
            </ul>
            <br>
            <form action="" method="post">
                <div class="container justify-content-between d-flex">
                    <input type="text" name="search" id="seach" placeholder="Tìm kiếm theo mã học sinh..."
                        class="form-control" style="width: 74%">
                    <input type="submit" name="submit" value="Tìm kiếm" class="form-control" style="width: 25%">
                </div>
            </form>
            <br>
            <table class="table">
                <tr>
                    <th>Số thứ tự</th>
                    <th>Mã học sinh</th>
                    <th>Năm học</th>
                    <th>Nhận xét chung</th>
                    <th>Ưu điểm</th>
                    <th>Cần khắc phục</th>
                    <th>Được lên lớp</th>
                </tr>
                <tbody>
                    <?php foreach ($result as $item) :?>
                    <tr>
                        <td><?php echo $item['id']?></td>
                        <td><?php echo $item['hocsinh_id']?></td>
                        <td><?php echo $item['namhoc']?></td>
                        <td><?php echo $item['nhanxetchung']?></td>
                        <td><?php echo $item['uudiem']?></td>
                        <td><?php echo $item['cankhacphuc']?></td>
                        <td><?php echo $item['duoclenlop']?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </content>
    <footer>
        <lable>Dang Quang Chien-92243-TTM62DH</lable>
    </footer>
</body>

</html>