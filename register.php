<?php
header('Content-Type: application/json; charset=UTF-8');

include 'config.php';
include 'UserModel.php';

$userModel = new UserModel($conn);

$username = $_POST['username'] ?? null;
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$confirmPassword = $_POST['confirmPassword'] ?? null;

// Kiểm tra nếu mật khẩu và xác nhận mật khẩu khớp nhau
if ($password !== $confirmPassword) {
    $response = array('status' => 'error', 'message' => 'Mật khẩu không khớp.');
    echo json_encode($response);
    exit();
}

// Kiểm tra xem username hoặc email đã tồn tại chưa
if ($userModel->usernameExists($username)) {
    $response = array('status' => 'error', 'message' => 'Username đã tồn tại.');
    echo json_encode($response);
    exit();
}

if ($userModel->emailExists($email)) {
    $response = array('status' => 'error', 'message' => 'Email đã tồn tại.');
    echo json_encode($response);
    exit();
}

// Thực hiện đăng ký
$result = $userModel->register($username, $email, $password);

if ($result) {
    $response = array('status' => 'success', 'message' => 'Đăng ký thành công.');
} else {
    $response = array('status' => 'error', 'message' => 'Đã xảy ra lỗi khi đăng ký.');
}

echo json_encode($response);

$conn->close();
?>
