<?php
session_start();
if (!isset($_SESSION['tendaydu'])) {
    header("location:login.php");
    exit();
}

include('connect.php');

$ID = $_GET['ID'] ?? null; // Bảo đảm có ID
if (!$ID) {
    die("ID không hợp lệ.");
}

// Truy vấn dữ liệu từ cơ sở dữ liệu
$sql1 = "SELECT * FROM nhansu WHERE id = :ID";
$stmt = $conn->prepare($sql1);
$stmt->bindParam(':ID', $ID, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$result) {
    die("Không tìm thấy dữ liệu.");
}

if (!empty($_POST['submit'])) {
    if (isset($_POST['phongban_id'], $_POST['dienthoai'], $_POST['trinhdo_id'], $_POST['hovaten'], $_POST['trangthai'], $_POST['email'])) {
        $phongban_id = $_POST['phongban_id'];
        $trangthai = $_POST['trangthai'];
        $trinhdo_id = $_POST['trinhdo_id'];
        $hovaten = $_POST['hovaten'];  
        $dienthoai = $_POST['dienthoai'];
        $email = $_POST['email'];

        $sql = "UPDATE nhansu SET phongban_id = :phongban_id, trangthai = :trangthai, trinhdo_id = :trinhdo_id, hovaten = :hovaten, dienthoai = :dienthoai, email = :email WHERE id = :ID";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':phongban_id', $phongban_id);
        $stmt->bindParam(':trangthai', $trangthai);
        $stmt->bindParam(':trinhdo_id', $trinhdo_id);
        $stmt->bindParam(':hovaten', $hovaten);
        $stmt->bindParam(':dienthoai', $dienthoai);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':ID', $ID);
        $query = $stmt->execute();

        if ($query) {
            header("location: admin.php");
            exit();
        } else {
            echo "Sửa thất bại, vui lòng thử lại!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUẢN LÝ NHÂN SỰ - ĐẶNG QUANG CHIẾN</title>
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
    <main>
        <div class="container">
            <ul class="nav justify-content-center" style="background-color: #f1f1f1;">
                <li class="nav-item">
                    <a class="nav-link" href="#">Hi <?= htmlspecialchars($_SESSION['tendaydu']); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="admin.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Đăng xuất</a>
                </li>
            </ul>
            <form action="" method="post">
                <fieldset class="form-group">
                    <label for="phongban_id">Phòng ban</label>
                    <select name="phongban_id" id="phongban_id" class="form-control">
                        <option value="0" <?= $result['phongban_id'] == '0' ? 'selected' : ''; ?>>Nhân sự</option>
                        <option value="1" <?= $result['phongban_id'] == '1' ? 'selected' : ''; ?>>Kỹ thuật</option>
                        <option value="2" <?= $result['phongban_id'] == '2' ? 'selected' : ''; ?>>Kinh doanh</option>
                        <option value="3" <?= $result['phongban_id'] == '3' ? 'selected' : ''; ?>>Marketing</option>
                        <option value="4" <?= $result['phongban_id'] == '4' ? 'selected' : ''; ?>>Giám đốc</option>
                    </select>
                </fieldset>

                <fieldset class="form-group">
                    <label for="trangthai">Trạng thái</label>
                    <select name="trangthai" id="trangthai" class="form-control">
                        <option value="0" <?= $result['trangthai'] == '0' ? 'selected' : ''; ?>>Thử việc</option>
                        <option value="1" <?= $result['trangthai'] == '1' ? 'selected' : ''; ?>>Chính thức</option>
                        <option value="2" <?= $result['trangthai'] == '2' ? 'selected' : ''; ?>>Nghỉ việc</option>
                    </select>
                </fieldset>

                <fieldset class="form-group">
                    <label for="trinhdo_id">Trình độ</label>
                    <select name="trinhdo_id" id="trinhdo_id" class="form-control">
                        <option value="0" <?= $result['trinhdo_id'] == '0' ? 'selected' : ''; ?>>Phổ thông</option>
                        <option value="1" <?= $result['trinhdo_id'] == '1' ? 'selected' : ''; ?>>Trung cấp</option>
                        <option value="2" <?= $result['trinhdo_id'] == '2' ? 'selected' : ''; ?>>Cao đẳng</option>
                        <option value="3" <?= $result['trinhdo_id'] == '3' ? 'selected' : ''; ?>>Đại học</option>
                        <option value="4" <?= $result['trinhdo_id'] == '4' ? 'selected' : ''; ?>>Thạc sĩ</option>
                        <option value="5" <?= $result['trinhdo_id'] == '5' ? 'selected' : ''; ?>>Tiến sĩ</option>
                    </select>
                </fieldset>

                <fieldset class="form-group">
                    <label for="hovaten">Họ và tên</label>
                    <input type="text" name="hovaten" id="hovaten" value="<?= htmlspecialchars($result['hovaten']); ?>"
                        class="form-control" placeholder="Nhập họ và tên">
                </fieldset>

                <fieldset class="form-group">
                    <label for="dienthoai">Điện thoại</label>
                    <input type="text" name="dienthoai" id="dienthoai"
                        value="<?= htmlspecialchars($result['dienthoai']); ?>" class="form-control"
                        placeholder="Nhập số điện thoại">
                </fieldset>

                <fieldset class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="<?= htmlspecialchars($result['email']); ?>"
                        class="form-control" placeholder="Nhập email">
                </fieldset>
                <br>
                <fieldset class="form-group">
                    <input type="submit" name="submit" value="Lưu" class="form-control">
                </fieldset>
                <br>
                <fieldset class="form-group">
                    <input type="button" name="back" value="Quay lại" onclick="location.href='admin.php'"
                        class="form-control">
                </fieldset>
            </form>
        </div>
    </main>
    <footer>ĐẶNG QUANG CHIẾN - 92443 - TTM62DH</footer>
</body>

</html>