<?php
// var_dump($_SERVER["SCRIPT_NAME"]);die;

// Biến $_SERVER là biến hệ thống do PHP quản lý, dùng để lưu trữ các thông tin về Request gởi đến Server
// Trong đó key: $_SERVER['SCRIPT_NAME']
// Dùng để lưu trữ giá trị thông tin đường dẫn URL
// Tùy theo đường dẫn URL, set giá trị Tên trang và Tiêu đề phù hợp
switch ($_SERVER['SCRIPT_NAME']) {
    // CRUD Danh mục Loại sản phẩm
    case "/index.php":
        $CURRENT_PAGE = "";
        $PAGE_TITLE = "GShop - ABC";
        break;
    case "/about.php":
        $CURRENT_PAGE = "";
        $PAGE_TITLE = "GShop - Về GShop";
        break;
    case "backend/functions/shop_categories/edit.php":
        $CURRENT_PAGE = "backend.shop_categories.edit";
        $PAGE_TITLE = "Sửa Loại sản phẩm";
        break;
    // Tên trang và Tiêu đề mặc định
    default:
        $CURRENT_PAGE = "backend.index";
        $PAGE_TITLE = "GShop - ABC";
}
