<!DOCTYPE html>
<html lang="en">
<?php
    include('connect.php');

    if(!empty($_POST['search'])){
        $search = $_POST['search'];
        $sql1 = "SELECT * FROM dieutri WHERE hovaten_benhnhan LIKE '%$search%'";
        $stmt1 = $conn->prepare($sql1);
        $query1 = $stmt1->execute();
        $result = array();
        while($row = $stmt1->fetch(PDO::FETCH_ASSOC)){
            $result[] = $row;
        }
    }
    else{
        $sql = "SELECT * FROM dieutri";
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
    <title>Quản Lý Điều Trị - Đặng Quang Chiến</title>
</head>

<body>
    <header>
        <div class="anh">
            <img src="logo.jpg" alt="logo" class="logo">
        </div>
        <div class="tieude">
            <h1>Quản Lý Điều Trị</h1>
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
                    <input type="text" name="search" placeholder="Nhap họ tên bệnh nhân..." class="form-control"
                        style="width: 74%">
                    <input type="submit" name="submit" value="Tìm kiếm" class="form-control" style="width: 25%">
                </div>
            </form>
            <br>
            <table class="table">
                <thread>
                    <tr style="background-color: #d2d2d2">
                        <th>Ma nhan vien</th>
                        <th>Loai benh</th>
                        <th>ho va ten benh nhan</th>
                        <th>Ngay bat dau</th>
                        <th>Ngay ket thuc</th>
                        <th>Nhan xet</th>

                    </tr>
                </thread>
                <tbody>
                    <?php foreach($result as $item) :?>
                    <tr>
                        <td><?php echo $item['nhanvien_id']?></td>
                        <td><?php echo $item['loaibenh']?></td>
                        <td><?php echo $item['hovaten_benhnhan']?></td>
                        <td><?php echo $item['ngaybatdau']?></td>
                        <td><?php echo $item['ngayketthuc']?></td>
                        <td><?php echo $item['nhanxet']?></td>
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