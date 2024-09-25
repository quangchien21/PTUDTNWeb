<?php 
     session_start();
    if(!isset($_SESSION['tendaydu'])){
        header('location: login.php');
    }
    include('connect.php');
    if(!empty($_GET['ID'])){
        $ID = $_GET['ID'];
        $sql = "DELETE FROM phieumuon WHERE ID = '$ID'";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        if($query){
            header('location: admin.php');
            exit();
        }
        else{
            echo "Xoa that bai";
        }
    }
    else{
        echo "Khong tim thay ID phieu muon";
    }
?>