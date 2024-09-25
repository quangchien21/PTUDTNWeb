<!DOCTYPE html>
<html lang="en">
<?php 

    session_start();
    if(!isset($_SESSION['tendaydu'])){
        header('location: login.php');
    }
    include('connect.php');
    if(!empty($_POST['submit'])){
        $search = $_POST['search'];
        $sql = "SELECT * FROM phieumuon WHERE id like '%$search%'";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        While($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $result[] = $row;
        }
    }
    else{
        $sql = "SELECT * FROM phieumuon";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Quan Ly Thu Vien</title>
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
                <li class="nav-item">
                    <a class="nav-link" href="cau1.jpg">Anh cau 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="list.php">Danh sach phieu muon</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add.php">Them phieu muon</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Dang xuat</a>
                </li>
            </ul>
            <br>
            <form method="post">
                <div class="container d-flex justify-content-between">
                    <input type="text" name="search" placeholder="Nhap ma phieu muon..." class="form-control"
                        style="width: 74%">
                    <input type="submit" name="submit" value="Tim kiem" class="form-control" style="width: 25%">
                </div>
            </form>
            <br>
            <table class="table" style="text-align: center">
                <thread>
                    <tr style="background-color: #d2d2d2">
                        <th>ID</th>
                        <th>Ma nhan vien</th>
                        <th>doc gia</th>
                        <th>Ngay lap phieu</th>
                        <th>Dien giai</th>
                        <th>Thang thai</th>
                        <th colspan="2">Thao tac</th>
                    </tr>
                </thread>
                <tbody>
                    <?php foreach ($result as $item): ?>
                    <tr>
                        <td><?php echo $item['ID']?></td>
                        <td><?php echo $item['nhanvien_id']?></td>
                        <td><?php echo $item['docgia_id']?></td>
                        <td><?php echo $item['ngaylapphieu']?></td>
                        <td><?php echo $item['diengiai']?></td>
                        <td><?php echo $item['trangthai']?></td>
                        <td><input type="button" name="edit" value="edit"
                                onclick="window.location= 'edit.php?ID=<?= $item['ID'] ?>'">
                        </td>
                        <td><input type="button" name="delete" value="delete"
                                onclick="window.location= 'delete.php?ID=<?= $item['ID']?>'"></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </content>
    <footer>
        <label>Dang Quang Chien-92243-TTM62DH</label><br>
        <label>Hi <?php echo $_SESSION['tendaydu']?></label>
    </footer>

</body>

</html>