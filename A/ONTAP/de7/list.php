<!DOCTYPE html>
<html lang="en">
<?php
    include('connect.php');

    if(!empty($_POST['search'])){
        $search = $_POST['search'];
        $sql1 = "SELECT * FROM vandon WHERE nhanvien_id LIKE '%$search%'";
        $stmt1 = $conn->prepare($sql1);
        $query1 = $stmt1->execute();
        $result = array();
        while($row = $stmt1->fetch(PDO::FETCH_ASSOC)){
            $result[] = $row;
        }
    }
    else{
        $sql = "SELECT * FROM vandon";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $result[] = $row;
        }
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Quản Lý Vận Đơn - Đặng Quang Chiến</title>
</head>

<body>
    <header>
        <div class="anh">
            <img src="logo.jpg" alt="logo" class="logo">
        </div>
        <div class="tieude">
            <h1>Quản Lý Vận Đơn</h1>
        </div>
    </header>
    <content>
        <div class="container">
            <ul class="nav justify-content-center" style="background-color: #f1f1f1">
                <li class="nav-item">
                    <a class="nav-link" href="cau1.jpg">Ảnh câu 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="client.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Đăng nhập</a>
                </li>
            </ul>
            <br>
            <form method="post">
                <div class="container d-flex justify-content-between">
                    <input type="text" name="search" placeholder="Nhap ma nhan vien..." class="form-control"
                        style="width: 74%">
                    <input type="submit" name="submit" value="Tìm kiếm" class="form-control" style="width: 25%">
                </div>
            </form>
            <br>
            <table class="table">
                <thread>
                    <tr style="background-color: #d2d2d2">
                        <th>Ma don hang</th>
                        <th>Ma nhan vien</th>
                        <th>Nguoi nhan</th>
                        <th>Dien thoai</th>
                        <th>Dia chi</th>
                        <th>Ngay giao hang</th>
                        <th>Ghi chú</th>
                    </tr>
                </thread>
                <tbody>
                    <?php foreach($result as $item) :?>
                    <tr>
                        <td><?php echo $item['id']?></td>
                        <td><?php echo $item['nhanvien_id']?></td>
                        <td><?php echo $item['nguoinhan']?></td>
                        <td><?php echo $item['dienthoai']?></td>
                        <td><?php echo $item['diachi']?></td>
                        <td><?php echo $item['ngaygiaohang']?></td>
                        <td><?php echo $item['ghichu']?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </content>
    <footer>
        <label>Đặng Quang Chiến-92443-TTM62DH</label>
    </footer>
</body>

</html>