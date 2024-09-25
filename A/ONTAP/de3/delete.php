<?php 
    session_start();
    if(!isset($_SESSION['tendaydu'])){
        header('location: login.php');
    }

    include('connect.php');
    if(isset($_GET['ID'])){
        $id = $_GET['ID'];
        $sql = "DELETE FROM tongketnam WHERE id = '$id'";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        if($query){
          header('location: admin.php');
          exit();
        }
        else{
            echo "Xoa khong thanh cong";
        }
    }
?>