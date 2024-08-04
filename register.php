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
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($password !== $confirmPassword) {
        echo "Mật khẩu và xác nhận mật khẩu không khớp.";
        exit();
    }

    // Kiểm tra nếu email đã tồn tại trong cơ sở dữ liệu
    $emailCheckSql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($emailCheckSql);
    if ($result->num_rows > 0) {
        echo "Email đã được sử dụng.";
        exit();
    }

    // Mã hóa mật khẩu
    $passwordHashed = password_hash($password, PASSWORD_BCRYPT);

    // Chuẩn bị truy vấn
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $passwordHashed);

    if ($stmt->execute()) {
        echo "Đăng ký thành công";
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
