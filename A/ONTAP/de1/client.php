<?php
    include('connect.php');

    if(empty($_POST['submit'])){
        $sql = "SELECT * FROM donhang";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $result[] = $row;
        }  
    }
    else{
        $search = $_POST['search'];
        $sql = "SELECT * FROM donhang WHERE id LIKE '%$search%'";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $result[] = $row;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>QUẢN LÝ ĐƠN HÀNG - ĐẶNG QUANG CHIẾN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <header>
        <div class="anh">
            <img src="logo.jpg" alt="Logo" class="logo">
        </div>
        <div class="tieude">
            <h1 class="text-uppercase">Quản lý đơn hàng</h1>
        </div>
    </header>
    <content>

        <div class="container">
            <ul class="nav justify-content-center" style="background-color: #f1f1f1;">
                <li class="nav-item">
                    <a class="nav-link" href="cau1.jpg">Ảnh câu 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="list.php">Danh sách đơn hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Đăng nhập</a>
                </li>
            </ul>
        </div>
    </content>
    <footer class="text-center">
        <p>ĐẶNG QUANG CHIẾN - 92443 - TTM62DH</p>
    </footer>
</body>

</html>