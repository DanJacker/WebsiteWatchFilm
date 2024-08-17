<?php
session_start();
include 'config.php';

$response = array();

if (!isset($_SESSION['user_id'])) {
    $response['status'] = 'error';
    $response['message'] = 'Bạn cần đăng nhập để xem danh sách yêu thích.';
    echo json_encode($response);
    exit();
}

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT movie_id FROM favorites WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$favorites = array();

while ($row = $result->fetch_assoc()) {
    // Giả sử bạn có một hàm hoặc cơ chế để lấy thông tin phim từ movie_id
    $movieInfo = getMovieInfoById($row['movie_id']); // Cập nhật phần này theo cách bạn lấy thông tin phim
    $favorites[] = $movieInfo;
}

if (count($favorites) > 0) {
    $response['status'] = 'success';
    $response['favorites'] = $favorites;
} else {
    $response['status'] = 'error';
    $response['message'] = 'Bạn chưa có phim yêu thích nào.';
}

echo json_encode($response);

$conn->close();

// Hàm giả sử để lấy thông tin phim từ movie_id (cần thay đổi dựa vào cách bạn quản lý phim)
function getMovieInfoById($movie_id) {
    // Giả sử bạn có một bảng movies để lưu thông tin về phim
    global $conn;
    $stmt = $conn->prepare("SELECT title, image FROM movies WHERE id = ?");
    $stmt->bind_param("s", $movie_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}
?>
