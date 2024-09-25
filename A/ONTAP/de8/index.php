<?php
    session_start();
    unset($_SESSION['tendaydu']);
    // if(!isset($_SESSION['tendaydu'])){
    //     header('location:login.php');
    // }
    include('connect.php');

    if(empty($_POST['submit'])){
        $sql = "SELECT * FROM sach";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $result[] = $row;
        }  
    }
    else{
        $search = $_POST['search'];
        $sql = "SELECT * FROM sach WHERE tensach LIKE '%$search%' or tacgia LIKE '%$search%'";
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
            <ul class="nav justify-content-center" style="background-color: #f1f1f1;">
                <!-- <li class="nav-item">
                    <a class="nav-link" href="">Hi <?= $_SESSION['tendaydu'] ?></a>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link active" href="add.php">Thêm sách</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Đăng nhập</a>
                </li>
            </ul>

            <br>

            <form method="post">
                <div class="container d-flex justify-content-between">
                    <!-- <label>Tìm kiếm</label> -->
                    <input type="text" name="search" placeholder="Nhập tên sách hoặc tên tác giả..."
                        class="form-control" style="width: 79%;">
                    <input type="submit" name="submit" value="Tìm kiếm" class="btn btn-outline-success"
                        style="width: 20%;">
                    <!-- <button class="btn btn-outline-danger"><a href="add.php">THÊM</a></button> -->
                </div>
            </form>

            <br>

            <table class="table">
                <thead>
                    <tr style="background-color: #d2d2d2">
                        <th>Mã sách</th>
                        <th>Tên sách</th>
                        <th>Tóm tắt</th>
                        <th>Tác giả</th>
                        <th>namxb</th>
                        <th>loaisach</th>
                        <!-- <th colspan="3">Hành động</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $item) :?>
                    <tr>
                        <td><?php echo $item['id'] ?></td>
                        <td><?php echo $item['tensach'] ?></td>
                        <td><?php echo $item['tomtat'] ?></td>
                        <td><?php echo $item['tacgia'] ?></td>
                        <td><?php echo $item['namxb'] ?></td>
                        <td><?php echo $item['loaisach'] ?></td>

                        <!-- <td><a href="add.php">Thêm</a></td> -->
                        <!-- <td><button class="btn btn-outline-danger"><a
                                    href="delete.php?ID=<?= $item['id'] ?>">Xóa</a></button></td>
                        <td><button class="btn btn-outline-danger"><a
                                    href="edit.php?ID=<?= $item['id'] ?>">Sửa</a></button></td> -->
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </content>
    <footer>
        <p>ĐẶNG QUANG CHIẾN - 92443 - TTM62DH</p>
        <!-- <p>Hi <?= $_SESSION['tendaydu'] ?></p> -->
    </footer>
</body>

</html>