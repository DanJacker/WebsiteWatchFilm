<?php
$servername = "fe80::621c:1b27:61ce:d437%14"; // Hoặc địa chỉ IP của MySQL Server
$username = "root"; // Tên đăng nhập MySQL Server
$password = ""; // Mật khẩu MySQL Server
$dbname = "movie_website"; // Tên cơ sở dữ liệu

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($password !== $confirmPassword) {
        echo "Mật khẩu và xác nhận mật khẩu không khớp.";
        exit();
    }

    $passwordHashed = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$passwordHashed')";

    if ($conn->query($sql) === TRUE) {
        echo "Đăng ký thành công";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
