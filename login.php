<?php
include 'config.php';
include 'UserModel.php';

$userModel = new UserModel($conn);

$email = $_POST['email'];
$password = $_POST['password'];

// Tìm người dùng
$user = $userModel->login($email, $password);

$response = array();

if ($user) {
    session_start();
    $_SESSION['user_id'] = $user['id']; // Lưu thông tin người dùng vào session
    $_SESSION['username'] = $user['username'];
    
    $response['status'] = 'success';
    $response['message'] = 'Đăng nhập thành công.';
    $response['redirect'] = 'index.php'; // Thêm URL để chuyển hướng
} else {
    $response['status'] = 'error';
    $response['message'] = 'Email hoặc mật khẩu không đúng.';
}

echo json_encode($response);

$conn->close();
?>
