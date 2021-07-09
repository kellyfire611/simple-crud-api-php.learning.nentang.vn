<?php
// Truy vấn database để lấy danh sách
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once(__DIR__.'/../../dbconnect.php');

// 2. Chuẩn bị câu truy vấn $sql
$sqlSelect = "SELECT `id`, `category_code`, `category_name`, `description`, `image`, `created_at`, `updated_at` 
            FROM `shop_categories` ";

// Tìm theo tham số
$id = isset($_GET['id']) ? $_GET['id'] : '';

$sqlWhereArr = [];
if (!empty($id)) {
    $sqlWhereArr[] = "id = '$id'";
}

if (count($sqlWhereArr) > 0) {
    $sqlWhere = " WHERE " . implode(' AND ', $sqlWhereArr);
    $sqlSelect .= $sqlWhere;
}

// 3. Thực thi câu truy vấn SQL để lấy về dữ liệu
$result = mysqli_query($conn, $sqlSelect);

// 4. Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
// Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
// Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
$data = [];
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $data[] = array(
        'id' => $row['id'],
        'category_code' => $row['category_code'],
        'category_name' => $row['category_name'],
        'description' => $row['description'],
        'image' => $row['image'],
        'created_at' => $row['created_at'],
        'updated_at' => $row['updated_at']
    );
}

// 5. Chuyển đổi dữ liệu về định dạng JSON
$responseData = [];
if(count($data) > 0) {
    $responseData = [
        'statusCode' => 200,
        'msg' => 'Đã tải dữ liệu thành công!',
        'data' => $data
    ];
} else {
    $responseData = [
        'statusCode' => 500,
        'msg' => 'Không tìm thấy dữ liệu!',
        'data' => $data
    ];
}
// Dữ liệu JSON, từ array PHP -> JSON
// echo json_encode($responseData);

echo json_encode($responseData, JSON_UNESCAPED_UNICODE);