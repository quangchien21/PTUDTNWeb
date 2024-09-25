<!DOCTYPE html>
<html lang="en">
<?php 
    session_start();
    unset($_SESSION['tendaydu']);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="style.css">
    <title>Trang chu</title>
</head>

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
                <li class="nav-item">
                    <a href="list.php" class="nav-link">Danh sach hoc sinh</a>
                </li>
                <li class="nav-item">
                    <a href="cau1.jpg" class="nav-link">Anh cau 1</a>
                </li>
                <li class="nav-item">
                    <a href="login.php" class="nav-link">Dang nhap</a>
                </li>
            </ul>
        </div>
    </content>
    <footer>
        <label style="font-style: italic">Dang Quang Chien-92443-TTM62DH</label>
    </footer>
</body>

</html>