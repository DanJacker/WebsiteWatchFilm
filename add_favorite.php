<?php
session_start();
include 'config.php';

// Kiểm tra trạng thái đăng nhập
if (!isset($_SESSION['user_id'])) {
    echo 'Bạn cần đăng nhập để thực hiện hành động này.';
    exit();
}

// Lấy ID bộ phim từ yêu cầu POST
$movie_id = $_POST['movie_id'];
$user_id = $_SESSION['user_id'];

// Kiểm tra xem bộ phim đã tồn tại trong danh sách yêu thích chưa
$sql = "SELECT * FROM favorites WHERE user_id = ? AND movie_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $user_id, $movie_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo 'Bộ phim này đã có trong danh sách yêu thích của bạn.';
} else {
    // Thêm bộ phim vào danh sách yêu thích của người dùng
    $sql = "INSERT INTO favorites (user_id, movie_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $movie_id);

    if ($stmt->execute()) {
        echo 'Bộ phim đã được thêm vào danh sách yêu thích.';
    } else {
        echo 'Đã xảy ra lỗi. Vui lòng thử lại.';
    }
}

$stmt->close();
$conn->close();
?>
