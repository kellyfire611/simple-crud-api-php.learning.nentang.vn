<?php
// var_dump($_SERVER["SCRIPT_NAME"]);die;

// Biến $_SERVER là biến hệ thống do PHP quản lý, dùng để lưu trữ các thông tin về Request gởi đến Server
// Trong đó key: $_SERVER['SCRIPT_NAME']
// Dùng để lưu trữ giá trị thông tin đường dẫn URL
// Tùy theo đường dẫn URL, set giá trị Tên trang và Tiêu đề phù hợp
switch ($_SERVER['SCRIPT_NAME']) {
    // CRUD Danh mục Chức vụ
  case "/backend/chucvu/index.php":
    $CURRENT_PAGE = "backend.chucvu.index";
    $PAGE_TITLE = "Danh sách Chức vụ";
    break;

    // Tên trang và Tiêu đề mặc định
  default:
    $CURRENT_PAGE = "backend.index";
    $PAGE_TITLE = "Chào mừng các bạn đến với Nền tảng.VN!";
}
