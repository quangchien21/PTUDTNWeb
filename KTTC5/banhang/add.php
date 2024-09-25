<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <title>Thêm đơn hàng</title>
</head>
<?php
function getDataFromDB($hostName, $dbName, $userName, $pass, $query)
{
    $connect = mysqli_connect($hostName, $userName, $pass, $dbName);

    if (!$connect) {
        echo 'Connect DB Error!';
    } else {
        $result = mysqli_query($connect, $query);
        $output = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $output[$row['id']] = array();
                foreach ($row as $key => $value) {
                    if (is_string($key)) {
                        $output[$row['id']][$key] = $row[$key];
                    }
                }
            }
            $connect->close();
            return $output;
        }
    }
}

$hanghoa = getDataFromDB("localhost", "banhang2", "root", "", "SELECT * from hanghoa");
$khachhang = getDataFromDB("localhost", "banhang2", "root", "", "SELECT * from khachhang");
?>

<body>
    <div class="container">
        <h1 class="text-center">Thêm đơn hàng</h1>
    </div>
    <div class="container">
        <form method="POST" action="./addToDB.php" enctype="multipart/form-data">
            <fieldset class="form-group">
                <label for="">Hàng hóa</label>
                <select name="hanghoa_id" class="form-control">
                    <?php foreach ($hanghoa as $value): ?>
                    <option value="<?= $value['id'] ?>"><?= $value['ten'] ?></option>
                    <?php endforeach ?>
                </select>
            </fieldset>
            <fieldset class="form-group">
                <label for="">Số lượng</label>
                <input name="soluong" type="number" class="form-control" placeholder="Số lượng">
            </fieldset>
            <fieldset class="form-group">
                <label for="">Đơn giá</label>
                <input name="dongia" type="number" class="form-control" placeholder="Đơn giá">
            </fieldset>
            <!-- <fieldset class="form-group">
                <label for="">Giảm trừ</label>
                <input name="giamtru" type="number" class="form-control" placeholder="Giảm trừ">
            </fieldset> -->
            <fieldset class="form-group">
                <label for="">Khách hàng</label>
                <select name="khachhang_id" class="form-control">
                    <?php foreach ($khachhang as $value): ?>
                    <option value="<?= $value['id'] ?>"><?= $value['hovaten'] ?></option>
                    <?php endforeach ?>
                </select>
            </fieldset>
            <fieldset class="form-group">
                <label for="">Trạng thái</label>
                <select name="trangthai" class="form-control">
                    <option value="1">Đã thanh toán</option>
                    <option value="2">Chưa thanh toán</option>
                </select>
            </fieldset>
            <fieldset class="form-group">
                <label for="">Khuyến mại</label>
                <input name="khuyenmai" type="text" class="form-control" placeholder="Khuyến mại">
            </fieldset>
            <fieldset class="form-group">
                <label for="">Ngày bán</label>
                <input name="ngayban" type="datetime-local" class="form-control" placeholder="Ngày bán">
            </fieldset>
            <fieldset class="form-group">
                <label for="">Ngày giao hàng</label>
                <input name="ngaygiaohang" type="datetime-local" class="form-control" placeholder="Ngày giao hàng">
            </fieldset>
            <fieldset class="form-group">
                <label for="">Ghi chú</label>
                <textarea name="ghichu" class="form-control" placeholder="Ghi chú"></textarea>
            </fieldset>
            <button type="submit" class="btn btn-success form-control">Thêm đơn hàng</button>
        </form>
    </div>
</body>

</html>