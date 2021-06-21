<?php
// Hiển thị tất cả lỗi trong PHP
// Chỉ nên hiển thị lỗi khi đang trong môi trường Phát triển (Development)
// Không nên hiển thị lỗi trên môi trường Triển khai (Production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Truy vấn database
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once(__DIR__ . '/../../dbconnect.php');

// 2. Chuẩn bị câu truy vấn $sql
// Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter key1=value1&key2=value2...
$CV_MA = $_GET['CV_MA'];
$sql = "DELETE FROM `CHUCVU` WHERE CV_MA='$CV_MA'";

// 3. Thực thi câu lệnh DELETE
$result = mysqli_query($conn, $sql);
$resultAffectedRows = mysqli_affected_rows($conn);

// 4. Đóng kết nối
mysqli_close($conn);

// Dữ liệu JSON, từ array PHP -> JSON
$responseData = [];
if($resultAffectedRows > 0) {
    $responseData = [
        'statusCode' => 200,
        'msg' => 'Đã xóa dữ liệu thành công!'
    ];
} else {
    $responseData = [
        'statusCode' => 500,
        'msg' => 'Không thể xóa dữ liệu!'
    ];
}
echo json_encode($responseData);