<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    die("Bạn cần đăng nhập để xem danh sách yêu thích.");
}

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT movie_id FROM favorites WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$favoriteMovies = array();
while ($row = $result->fetch_assoc()) {
    $favoriteMovies[] = $row['movie_id'];
}

// Hiển thị các bộ phim dựa trên movie_id
foreach ($favoriteMovies as $movieId) {
    // Giả sử bạn có mã để hiển thị thông tin phim từ movie_id
    echo "<div class='movie-box' id='$movieId'>Phim $movieId</div>";
}

$conn->close();
?>
