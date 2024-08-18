<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập hay chưa
$response = array('loggedIn' => isset($_SESSION['user_id']));

echo json_encode($response);
?>
