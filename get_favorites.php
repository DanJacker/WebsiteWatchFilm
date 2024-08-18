<?php
session_start();
include 'config.php';

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['user_id'])) {
    echo "<p>Bạn chưa đăng nhập.</p>";
    exit;
}

$user_id = $_SESSION['user_id'];

// Truy vấn danh sách phim yêu thích của người dùng
$sql = "SELECT movies.id, movies.title, movies.type, movies.image 
        FROM favorites 
        JOIN movies ON favorites.movie_id = movies.id 
        WHERE favorites.user_id = ?";

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die('Error preparing SQL query: ' . $conn->error);
}

$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $title = $row['title'];
        $type = $row['type'];
        $image_url = isset($row['image']) ? $row['image'] : 'default-image.jpg';

        // In HTML cho mỗi bộ phim yêu thích
        echo '<div class="movie-box" data-id="' . htmlspecialchars($id) . '">';
        echo '<img src="' . htmlspecialchars($image_url) . '" alt="" class="movie-box-img">';
        echo '<div class="box-text">';
        echo '<h2 class="movie-title">' . htmlspecialchars($title) . '</h2>';
        echo '<span class="movie-type">' . htmlspecialchars($type) . '</span>';
        echo '<a href="play-page.html" class="watch-btn play-btn">';
        echo '<i class=\'bx bx-right-arrow\'></i>';
        echo '</a>';
        // Thêm nút xóa phim khỏi danh sách yêu thích
        echo '<button class="remove-favorite-btn" data-id="' . htmlspecialchars($id) . '">Xóa</button>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "<p>Danh sách trống.</p>";
}

$stmt->close();
$conn->close();
?>
