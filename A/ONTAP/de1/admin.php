<?php
    session_start();
    if(!isset($_SESSION['tendaydu'])){
        header('location:login.php');
    }
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
                    <a class="nav-link" href="">Hi <?= $_SESSION['tendaydu'] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add.php">Thêm đơn hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="client.php">Đăng xuất</a>
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
                        <th colspan="3">Hành động</th>
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
                        <td><button class="btn btn-outline-danger"><a
                                    href="delete.php?ID=<?= $item['ID'] ?>">Xóa</a></button></td>
                        <td><button class="btn btn-outline-danger"><a
                                    href="edit.php?ID=<?= $item['ID'] ?>">Sửa</a></button></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </content>
    <footer class="text-center">
        <p>ĐẶNG QUANG CHIẾN - 92443 - TTM62DH</p>
        <p>Hi <?= $_SESSION['tendaydu'] ?></p>
    </footer>
</body>

</html>