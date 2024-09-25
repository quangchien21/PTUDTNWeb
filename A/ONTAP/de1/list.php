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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
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
                    <a class="nav-link" href="client.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cau1.jpg">Ảnh câu 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Đăng nhập</a>
                </li>
            </ul>

            <br>

            <form method="post">
                <div class="container d-flex justify-content-between">
                    <input type="text" name="search" placeholder="Nhập mã đơn hàng..." class="form-control"
                        style="width: 79%;">
                    <input type="submit" name="submit" value="Tìm kiếm" class="btn btn-outline-success"
                        style="width: 20%;">
                </div>
            </form>

            <br>

            <table class="table" style="text-align: center">
                <thead>
                    <tr style="background-color: #d2d2d2">
                        <th>Mã đơn hàng</th>
                        <th>ID khách hàng</th>
                        <th>Trạng thái</th>
                        <th>Khuyến mãi</th>
                        <th>Ngày bán</th>
                        <th>Ngày giao hàng</th>
                        <th>Ghi chú</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $item) :?>
                    <tr>
                        <td><?php echo $item['ID'] ?></td>
                        <td><?php echo $item['khachhang_id'] ?></td>
                        <td><?php echo $item['trangthai'] == '1' ? 'Có' : 'Không' ?></td>
                        <td><?php echo $item['khuyenmai'] ?>%</td>
                        <td><?php echo $item['ngayban'] ?></td>
                        <td><?php echo $item['ngaygiaohang'] ?></td>
                        <td><?php echo $item['ghichu'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </content>
    <footer class="text-center">
        <p>ĐẶNG QUANG CHIẾN - 92443 - TTM62DH</p>
    </footer>
</body>

</html>