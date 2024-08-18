<?php
session_start();
header('Content-Type: application/json');

// Kết nối đến cơ sở dữ liệu
include('config.php');

// Kiểm tra nếu người dùng đã đăng nhập
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'not_logged_in']);
    exit;
}

$userId = $_SESSION['user_id'];
$movieId = isset($_POST['movie_id']) ? intval($_POST['movie_id']) : 0;
$action = isset($_POST['action']) ? $_POST['action'] : '';

if ($action == 'toggle' && $movieId > 0) {
    // Kiểm tra xem phim đã có trong danh sách yêu thích của người dùng chưa
    $stmt = $conn->prepare("SELECT * FROM favorites WHERE user_id = ? AND movie_id = ?");
    $stmt->bind_param("ii", $userId, $movieId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Nếu có, xóa phim khỏi danh sách yêu thích
        $stmt = $conn->prepare("DELETE FROM favorites WHERE user_id = ? AND movie_id = ?");
        $stmt->bind_param("ii", $userId, $movieId);
        if ($stmt->execute()) {
            echo json_encode(['status' => 'removed']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to remove favorite']);
        }
    } else {
        // Nếu không có, thêm phim vào danh sách yêu thích
        $stmt = $conn->prepare("INSERT INTO favorites (user_id, movie_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $userId, $movieId);
        if ($stmt->execute()) {
            echo json_encode(['status' => 'added']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to add favorite']);
        }
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid action or movie ID']);
}

$stmt->close();
$conn->close();
?>
