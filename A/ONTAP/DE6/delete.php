<?php 
     include('connect.php');
     if(!empty($_GET['ID'])){
        $ID =$_GET['ID'];
        $sql = "DELETE FROM dieutri WHERE ID = '$ID'";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        if($query){
            header('location: admin.php');
            exit();
        }
        else{
            echo "xoa that bai";
        }
     }
     else{
        echo "khong tim thay ID";
     }
?>