<?php
$servername = "127.0.0.1"; // Thay bằng địa chỉ IP của MySQL Server nếu cần
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
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            echo "Đăng nhập thành công";
        } else {
            echo "Sai mật khẩu";
        }
    } else {
        echo "Không tìm thấy tài khoản";
    }
}

$conn->close();
?>
