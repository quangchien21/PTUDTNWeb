<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Quan Ly Hoc Sinh</title>
</head>
<?php 
    session_start();
    if(!isset($_SESSION['tendaydu'])){
        header('location: login.php');
    }
    include('connect.php');

    if(!empty($_POST["submit"])){
        $search = $_POST["search"];
        $sql = "SELECT * FROM tongketnam WHERE hocsinh_id LIKE '%$search%'";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $result [] = $row;
        }
    }
    else{
        $sql = "SELECT * FROM tongketnam";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $result [] = $row;
        }
    }
?>

<body>
    <header>
        <div class="anh">
            <img src="logo.jpg" alt="logo" class="logo">
        </div>
        <div class="tieude">
            <h1>Quan Ly Sinh Vien</h1>
        </div>
    </header>
    <content>
        <div class="container">
            <ul class="nav justify-content-center" style="background-color: #f1f1f1">
                <li class="nav">
                    <a class="nav-link" href="list.php">Danh sach hoc sinh</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cau1.jpg">Anh cau 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add.php">Them sinh vien</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="client.php">Dang xuat</a>
                </li>
            </ul>
            <br>
            <form action="" method="post">
                <div class="container d-flex justify-content-between">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Nhap ma sinh vien"
                        style="width: 74%">
                    <input type="submit" name="submit" class="form-control" style="width: 25%" value="Tim kiem">
                </div>
            </form>
            <br>
            <table class="table" style="text-align: center">
                <thread>
                    <tr style="background-color: #d2d2d2">
                        <th>ID</th>
                        <th>ID hoc sinh</th>
                        <th>Nam hoc</th>
                        <th>Nhan xet chung</th>
                        <th>Uu diem</th>
                        <th>Can khac phuc</th>
                        <th>Duoc len lop</th>
                        <th colspan="2">Thao tac</th>
                    </tr>
                </thread>
                <tbody <?php foreach ($result as $item) :?> <tr>
                    <td><?php echo $item['id'] ?></td>
                    <td><?php echo $item['hocsinh_id'] ?></td>
                    <td><?php echo $item['namhoc'] ?></td>
                    <td><?php echo $item['nhanxetchung']?></td>
                    <td><?php echo $item['uudiem']?></td>
                    <td><?php echo $item['cankhacphuc']?></td>
                    <td><?php echo $item['duoclenlop']?></td>
                    <td><button class="btn btn-outline-danger"><a href="edit.php?ID=<?= $item['id'] ?>">Sửa</a></button>
                    </td>
                    <td><button class="btn btn-outline-danger"><a
                                href="delete.php?ID=<?php echo $item['id'] ?>">Xóa</a></button></td>
                    </tr>

                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </content>
    <footer>
        <h1>Dang Quang Chien - 92443 - TTM62DH</h1>
        <label>Hi <?php echo $_SESSION["tendaydu"]?></label>
    </footer>
</body>

</html>