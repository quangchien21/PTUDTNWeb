<?php
    session_start();
    if(!isset($_SESSION['tendaydu'])){
        header('location:login.php');
    }
    include('connect.php');

    if(empty($_POST['submit'])){
        $sql = "SELECT * FROM nhansu";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $result[] = $row;
        }  
    }
    else{
        $search = $_POST['search'];
        $sql = "SELECT * FROM nhansu WHERE hovaten LIKE '%$search%'";
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
    <title>QUẢN LÝ NHÂN SỰ - ĐẶNG QUANG CHIẾN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <header>
        <div class="anh">
            <img src="logo.jpg" alt="logo" class="logo">
        </div>
        <div class="tieude">
            <h1 class="text-center text-uppercase">Quản lý nhân sự</h1>
        </div>
    </header>
    <content>

        <div class="container">
            <ul class="nav justify-content-center" style="background-color: #f1f1f1;">
                <li class="nav-item">
                    <a class="nav-link" href="">Hi <?= $_SESSION['tendaydu'] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="add.php">Thêm nhân sự</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Đăng xuất</a>
                </li>
            </ul>

            <br>

            <form method="post">
                <div class="container d-flex justify-content-between">

                    <input type="text" name="search" placeholder="Nhập tên nhân viên..." class="form-control"
                        style="width: 79%;">
                    <input type="submit" name="submit" value="Tìm kiếm" class="btn btn-outline-success"
                        style="width: 20%;">
                </div>
            </form>
            <br>
            <table class="table">
                <thead>
                    <tr style="background-color: #d2d2d2">
                        <th>Mã nhân viên</th>
                        <th>Mã phòng ban</th>
                        <th>Trạng thái</th>
                        <th>Trình độ</th>
                        <th>Họ và tên</th>
                        <th>Điện thoại</th>
                        <th>Email</th>
                        <th colspan="3">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $item) :?>
                    <tr>
                        <td><?php echo $item['id'] ?></td>
                        <td>
                            <?php
    switch ($item['phongban_id']) {
        case '0':
            echo 'Nhân sự';
            break;
        case '1':
            echo 'Kỹ thuật';
            break;
        case '2':
            echo 'Kinh doanh';
            break;
        case '3':
            echo 'Marketing';
            break;
        case '4':
            echo 'Giám đốc';
            break;
        default:
            echo 'Không xác định';
            break;
    }
    ?>
                        </td>

                        <td>
                            <?php
    switch ($item['trangthai']) {
        case '0':
            echo 'Thử việc';
            break;
        case '1':
            echo 'Chính thức';
            break;
        case '2':
            echo 'Nghỉ việc';
            break;
        default:
            echo 'Không xác định';
            break;
    }
    ?>
                        </td>

                        <td>
                            <?php
    switch ($item['trinhdo_id']) {
        case '0':
            echo 'Phổ thông';
            break;
        case '1':
            echo 'Trung cấp';
            break;
        case '2':
            echo 'Cao đẳng';
            break;
        case '3':
            echo 'Đại học';
            break;
        case '4':
            echo 'Thạc sĩ';
            break;
        case '5':
            echo 'Tiến sĩ';
            break;
        default:
            echo 'Không xác định';
            break;
    }
    ?>
                        </td>

                        <td><?php echo $item['hovaten'] ?></td>
                        <td><?php echo $item['dienthoai'] ?></td>
                        <td><?php echo $item['email'] ?></td>

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