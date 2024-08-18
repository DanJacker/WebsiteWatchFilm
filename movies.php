<?php
include 'config.php';

// Truy vấn dữ liệu
$sql = "SELECT * FROM movies";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $title = $row['title'];
        $type = $row['type'];
        $image_url = isset($row['image']) ? $row['image'] : 'default-image.jpg'; // Cung cấp giá trị mặc định nếu không có image

        // In HTML cho mỗi bộ phim
        echo '<div class="movie-box">';
        echo '<img src="' . htmlspecialchars($image_url) . '" alt="" class="movie-box-img">';
        echo '<div class="box-text">';
        echo '<h2 class="movie-title">' . htmlspecialchars($title) . '</h2>';
        echo '<span class="movie-type">' . htmlspecialchars($type) . '</span>';
        echo '<a href="play-page.html" class="watch-btn play-btn">';
        echo '<i class=\'bx bx-right-arrow\'></i>';
        echo '</a>';
        echo '<a href="#" class="favorite-btn" data-id="' . htmlspecialchars($id) . '">';
        echo '<i class=\'bx bxs-star\'></i>';
        echo '</a>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "<p>Không có bộ phim nào.</p>";
}

$conn->close();
?>
