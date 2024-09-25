<?php
    session_start();
    if(!isset($_SESSION['tendaydu'])){
        header('location:login.php');
    }
    include('connect.php');

    if(empty($_POST['submit'])){
        $sql = "SELECT * FROM vandon";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $result[] = $row;
        }  
    }
    else{
        $search = $_POST['search'];
        $sql = "SELECT * FROM vandon WHERE nhanvien_id LIKE '%$search%'";
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
    <title>QUẢN LÝ VẬN ĐƠN - ĐẶNG QUANG CHIẾN</title>
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
            <h1>Quan Lý Vận Đơn</h1>
        </div>
    </header>
    <content>

        <div class="container">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="">Hi <?= $_SESSION['tendaydu'] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="add.php">Thêm vận đơn</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Đăng xuất</a>
                </li>
            </ul>

            <br>

            <form method="post">
                <div class="container d-flex justify-content-between">
                    <!-- <label>Tìm kiếm</label> -->
                    <input type="text" name="search" placeholder="Nhập mã nhân viên..." class="form-control"
                        style="width: 79%;">
                    <input type="submit" name="submit" value="Tìm kiếm" class="btn btn-outline-success"
                        style="width: 20%;">
                </div>
            </form>

            <br>

            <table class="table">
                <thead>
                    <tr style="background-color: #d2d2d2">
                        <th>Mã vận đơn</th>
                        <th>Mã nhân viên</th>
                        <th>Trạng thái</th>
                        <th>Người nhận</th>
                        <th>Điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Ngày giao hàng</th>
                        <th>Ghi chú</th>
                        <th colspan="2">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $item) :?>
                    <tr>
                        <td><?php echo $item['id'] ?></td>
                        <td><?php echo $item['nhanvien_id'] ?></td>
                        <td>
                            <?php
    switch ($item['trangthai']) {
        case '0':
            echo 'Thành công';
            break;
        case '1':
            echo 'Đang vận chuyển';
            break;
        case '2':
            echo 'Hủy vận đơn';
            break;
        default:
            echo 'Không xác định';
            break;
    }
    ?>
                        </td>
                        <td><?php echo $item['nguoinhan'] ?></td>
                        <td><?php echo $item['dienthoai'] ?></td>
                        <td><?php echo $item['diachi'] ?></td>
                        <td><?php echo $item['ngaygiaohang'] ?></td>
                        <td><?php echo $item['ghichu'] ?></td>
                        <!-- <td><a href="add.php">Thêm</a></td> -->
                        <td><button class="btn btn-outline-danger"><a
                                    href="delete.php?ID=<?= $item['id'] ?>">Xóa</a></button></td>
                        <td><button class="btn btn-outline-danger"><a
                                    href="edit.php?ID=<?= $item['id'] ?>">Sửa</a></button></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </content>
    <footer>
        <p>ĐẶNG QUANG CHIẾN - 92443 - TTM62DH</p>
        <p>Hi <?= $_SESSION['tendaydu'] ?></p>
    </footer>
</body>

</html>