<?php
session_start();
if (!isset($_SESSION['tendaydu'])) {
    header('Location: login.php');
    exit(); 
}

include('connect.php');

if (isset($_GET['ID']) && !empty($_GET['ID'])) {
    $ID = $_GET['ID'];
    try {
        $sql = "DELETE FROM donhang WHERE ID = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $ID, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("Location: admin.php");
            exit(); 
        } else {
            echo "Xóa đơn hàng không thành công, vui lòng thử lại!";
        }
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
} else {
    echo "ID không được xác định!";
}
?>