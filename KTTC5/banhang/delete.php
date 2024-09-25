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
        $checkSql = "SELECT COUNT(*) FROM donhang WHERE id = :id";
        $checkStmt = $conn->prepare($checkSql);
        $checkStmt->bindParam(':id', $ID, PDO::PARAM_INT);
        $checkStmt->execute();
        $count = $checkStmt->fetchColumn();

        if ($count > 0) {
                    try {
                    // Bắt đầu một giao dịch
                    $conn->beginTransaction();

                    // Xóa chi tiết đơn hàng
                    $sql1 = "DELETE FROM chitietdonhang WHERE donhang_id = :id";
                    $stmt1 = $conn->prepare($sql1);
                    $stmt1->bindParam(':id', $ID, PDO::PARAM_INT);

                    // Xóa đơn hàng
                    $sql2 = "DELETE FROM donhang WHERE id = :id";
                    $stmt2 = $conn->prepare($sql2);
                    $stmt2->bindParam(':id', $ID, PDO::PARAM_INT);

                    // Thực thi các câu lệnh
                    $stmt1->execute();
                    $stmt2->execute();

                    // Cam kết giao dịch
                    $conn->commit();

                    // Chuyển hướng tới trang index
                    header("Location: index.php");
                    exit();
                } catch (PDOException $e) {
                    // Nếu có lỗi, hủy giao dịch
                    $conn->rollBack();
                    echo "Xóa đơn hàng không thành công, vui lòng thử lại! Lỗi: " . $e->getMessage();
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