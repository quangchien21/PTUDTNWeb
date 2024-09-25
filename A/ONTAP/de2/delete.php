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
        // Kiểm tra xem ID có tồn tại trong cơ sở dữ liệu trước khi xóa
        $checkSql = "SELECT COUNT(*) FROM nhansu WHERE id = :id";
        $checkStmt = $conn->prepare($checkSql);
        $checkStmt->bindParam(':id', $ID, PDO::PARAM_INT);
        $checkStmt->execute();
        $count = $checkStmt->fetchColumn();

        if ($count > 0) {
           
            $sql = "DELETE FROM nhansu WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $ID, PDO::PARAM_INT);

            if ($stmt->execute()) {
                header("Location: admin.php");
                exit();
            } else {
                echo "Xóa điều trị không thành công, vui lòng thử lại!";
            }
        } else {
            echo "ID không tồn tại trong cơ sở dữ liệu!";
        }
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
} else {
    echo "ID không được xác định!";
}
?>