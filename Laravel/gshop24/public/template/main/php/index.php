<!-- Nhúng file cấu hình để xác định được Tên và Tiêu đề của trang hiện tại người dùng đang truy cập -->
<?php include_once(__DIR__ . '/back-end/layouts/config.php'); ?>

<!DOCTYPE html>
<html>
  <head>
    <!-- Nhúng file quản lý phần HEAD -->
    <?php include_once(__DIR__ . '/back-end/layouts/head.php'); ?>
  </head>


  <body>
    
    <?php include_once(__DIR__ . '/back-end/layouts/partials/messenger-plugin.php'); ?>
    
    <header>
          <?php include_once(__DIR__ . '/back-end/layouts/partials/header.php'); ?>

    </header>
    
    <?php include_once(__DIR__ . '/back-end/layouts/contents/index-content.php'); ?>

    <!-- ------------------------------------ -->
  <!-- Footer -->
    <?php include_once(__DIR__ . '/back-end/layouts/partials/footer.php'); ?>
  <!-- Footer -->
    
    <?php include_once(__DIR__ . '/back-end/layouts/scripts-body.php'); ?>

        </body>
</html>
