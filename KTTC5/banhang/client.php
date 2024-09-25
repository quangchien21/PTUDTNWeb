<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Trang chủ</title>
</head>
<?php 
	session_start();
    unset($_SESSION['tendaydu']);
	// if(isset($_SESSION['tendaydu'])) {
		
	// }else {
	// 	header("location:login.php");
	// }
?>
<?php 
	function getDataFromDB($hostName, $dbName, $userName, $pass, $query)
	{
		$connect = mysqli_connect($hostName, $userName, $pass, $dbName);

		if(!$connect) {
				echo 'Connect DB Error!';
		}else {
			$result = mysqli_query($connect, $query);
			$output = array();
			if(mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_array($result))
				{
					$output[$row['id']] = array();
					foreach ($row as $key => $value) {
						if(is_string($key)) {
							$output[$row['id']][$key] = $row[$key];
						}
					}
				}
				$connect->close();
				return $output;
			}
		}
	}

	$donhang = getDataFromDB("localhost", "banhang2", "Student", "123", "SELECT * from donhang_view");
	
?>

<body>
    <!-- Header -->
    <header>
        <img src="logo.jpg" alt="logo" class="rounded float-start" width="100" height="100">
        <h1 class="text-center text-uppercase">Ứng dụng quản lí bán hàng</h1>
    </header>
    <div class="container">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="#">Trang chủ</a>
            </li>

            <!-- <li class="nav-item">
                <a class="nav-link" href="./add.php">Tạo mới đơn hàng</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="./login.php">Đăng nhập</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./anhcau1.jpg">Ảnh câu 1</a>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <content>
        <div class="content mt-5">
            <div class="container">
                <h2 class="text-center text-uppercase">Danh sách đơn hàng</h2>
            </div>

            <div class="container d-flex justify-content-between">
                <input id="search" type="" name="" style="width: 80%;" placeholder="Tìm kiếm đơn hàng theo ID....">
                <!-- <a href="./add.php" class="btn btn-success">Thêm mới đơn hàng</a> -->
            </div>

            <table class="table table-hover mt-2" style="width: 98%!important; margin: auto;">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Khách hàng</th>
                        <th>Trạng thái</th>
                        <th>Khuyến mại</th>
                        <th>Ngày bán</th>
                        <th>Ngày giao hàng</th>
                        <th>Ghi chú</th>


                    </tr>
                </thead>
                <tbody id="search-container">
                    <?php foreach ($donhang as $value): ?>
                    <tr>
                        <td class="search-item" hidden><?= $value['id'] ?></td>
                        <td>#<?= $value['id'] ?></td>
                        <td><?= $value['hovaten'] ?></td>
                        <td><?= $value['trangthai'] == '1' ? 'Đã giao' : 'Chưa giao' ?></td>
                        <td><?= $value['khuyenmai'] ?>%</td>
                        <td><?= date('Y/m/d', strtotime($value['ngayban'])) ?></td>
                        <td><?= date('Y/m/d', strtotime($value['ngaygiaohang'])) ?></td>
                        <td><?= $value['ghichu'] ?></td>

                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>
    </content>
    <br>
    <!-- Footer -->
    <footer>
        <p>ĐẶNG QUANG CHIẾN - 92443 - TTM62DH</p>
        <!-- <p>Hi <?= $_SESSION['tendaydu'] ?></p> -->
    </footer>
</body>
<script>
$(document).ready(function() {
    $('body').on('keyup', '#search', function(event) {
        event.preventDefault();
        var searchKey = $(this).val();
        $("#search-container").children('tr').each((i, e) => {
            if ($(e).children('.search-item').text() != searchKey) {
                $(e).hide();
            } else {
                $(e).show();
            }
            if (searchKey == "") {
                $(e).show();
            }
        });
    });
});
</script>

</html>