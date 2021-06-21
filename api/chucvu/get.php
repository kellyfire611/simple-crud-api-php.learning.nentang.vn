<?php
// Truy vấn database để lấy danh sách
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once(__DIR__.'/../../dbconnect.php');

// 2. Chuẩn bị câu truy vấn $sql
$sqlSelect = "select * from `CHUCVU`";

// Tìm theo tham số
$CV_MA = isset($_GET['CV_MA']) ? $_GET['CV_MA'] : '';

$sqlWhereArr = [];
if (!empty($CV_MA)) {
    $sqlWhereArr[] = "CV_MA = '$CV_MA'";
}

if (count($sqlWhereArr) > 0) {
    $sqlWhere = "WHERE " . implode(' AND ', $sqlWhereArr);
    $sqlSelect .= $sqlWhere;
}

// 3. Thực thi câu truy vấn SQL để lấy về dữ liệu
$result = mysqli_query($conn, $sqlSelect);

// 4. Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
// Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
// Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
$dataChucVu = [];
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
    $dataChucVu[] = array(
        'CV_MA' => $row['CV_MA'],
        'CV_TEN' => $row['CV_TEN'],
        'CV_TILE' => $row['CV_TILE'],
        'CV_NAMAPDUNG' => $row['CV_NAMAPDUNG'],
        'CV_GHICHU' => $row['CV_GHICHU']
    );
}

// 5. Chuyển đổi dữ liệu về định dạng JSON
$responseData = [];
if(count($dataChucVu) > 0) {
    $responseData = [
        'statusCode' => 200,
        'msg' => 'Đã tải dữ liệu thành công!',
        'data' => $dataChucVu
    ];
} else {
    $responseData = [
        'statusCode' => 500,
        'msg' => 'Không tìm thấy dữ liệu!',
        'data' => $dataChucVu
    ];
}
// Dữ liệu JSON, từ array PHP -> JSON
echo json_encode($responseData);