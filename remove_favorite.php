<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(array('status' => 'error', 'message' => 'Bạn chưa đăng nhập.'));
    exit;
}

$user_id = $_SESSION['user_id'];
$movie_id = $_POST['movie_id'];

$sql = "DELETE FROM favorites WHERE user_id = ? AND movie_id = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    echo json_encode(array('status' => 'error', 'message' => 'Lỗi khi chuẩn bị câu truy vấn.'));
    exit;
}

$stmt->bind_param("ii", $user_id, $movie_id);

if ($stmt->execute()) {
    echo json_encode(array('status' => 'success', 'message' => 'Xóa phim khỏi danh sách yêu thích thành công.'));
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Lỗi khi xóa phim.'));
}

$stmt->close();
$conn->close();
?>
