<?php
// Bắt đầu phiên làm việc
session_start();

// Kiểm tra xem người dùng có đăng nhập hay không
if (!isset($_SESSION['tendaydu'])) {
    header('Location: login.php');
    exit(); // Dừng thực thi nếu không đăng nhập
}

// Kết nối đến cơ sở dữ liệu
include('connect.php');

// Kiểm tra sự tồn tại của tham số 'ID'
if (isset($_GET['ID']) && !empty($_GET['ID'])) {
    $ID = $_GET['ID'];

    try {
        // Sử dụng prepared statements với placeholders để ngăn chặn SQL injection
        $sql = "DELETE FROM vandon WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $ID, PDO::PARAM_INT);

        // Thực thi câu lệnh và kiểm tra kết quả
        if ($stmt->execute()) {
            // Chuyển hướng về trang admin sau khi xóa thành công
            header("Location: admin.php");
            exit(); // Dừng thực thi sau khi chuyển hướng
        } else {
            echo "Xóa đơn hàng không thành công, vui lòng thử lại!";
        }
    } catch (PDOException $e) {
        // Xử lý lỗi nếu có
        echo "Lỗi: " . $e->getMessage();
    }
} else {
    echo "ID không được xác định!";
}
?>