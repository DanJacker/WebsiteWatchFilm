<?php
session_start();

// Hủy tất cả các biến phiên
$_SESSION = array();

// Xóa cookie phiên nếu có
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Hủy phiên
session_destroy();

// Chuyển hướng đến trang đăng nhập hoặc trang chủ
header("Location: login.html");
exit();
?>
