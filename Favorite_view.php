<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Movie Websites</title>
    <!--css-->
    <link rel="stylesheet" href="css/style.css">
    <!--swiper css-->
    <link rel="stylesheet" href="css/swiper.css">
    <!--fav-icon-->
    <link rel="shortcut icon" href="img/fav-icon.png" type="image/x-icon">
    <!--box-icon-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
</head>

<body>
    <!--header-->
    <header>
        <!--nav-->
        <div class="nav container">
            <!--logo-->
            <a href="index.php" class="logo">
                Phim <span>moi</span>
            </a>
            <!--search-box-->
            <div class="search-box">
                <input type="search" name="" id="search-input" placeholder=" Tim kiem">
                <i class='bx bx-search'></i>
            </div>
            <!--user-->
            <a href="#" class="user" id="user-icon">
                <img src="img/user.png" alt="" class="user-img">
            </a>
            <div class="dropdown" id="dropdown-menu" style="display: none;">
                <a href="#" id="logout-button">Logout</a>
            </div>

            <!--nav-bar-->
            <div class="nav-bar">
                <a href="index.php" class="nav-link nav-active">
                    <i class='bx bx-home'></i>
                    <span class="nav-link-title">Trang chủ</span>
                </a>
                <a href="#popular" class="nav-link">
                    <i class='bx bxs-hot'></i>
                    <span class="nav-link-title">Thịnh hành</span>
                </a>
                <a href="Theloai.html" class="nav-link">
                    <i class='bx bx-compass'></i>
                    <span class="nav-link-title">Thể loại</span>
                </a>
                <a href="#movies" class="nav-link">
                    <i class='bx bx-tv'></i>
                    <span class="nav-link-title">Phim</span>
                </a>
                <a href="Favorite_view.php" class="nav-link">
                    <i class='bx bx-star'></i>
                    <span class="nav-link-title">Yêu thích</span>
                </a>
                <a href="logout.php" class="logout-btn">Đăng xuất</a>
            </div>
        </div>
    </header>
    <section class="movies container" id="movies">
        <!--heading-->
        <div class="heading">
            <h2 class="heading-title">Movies and Show</h2>
        </div>
        <!--movies content-->
        <div class="movies-content">
            <?php include 'get_favorites.php'; ?>
            <!-- Repeat for other movies -->
        </div>

    </section>
    <!--js-->
    <script>
document.addEventListener('DOMContentLoaded', function () {
    // Lắng nghe sự kiện click trên nút xóa
    document.querySelectorAll('.remove-favorite-btn').forEach(function (button) {
        button.addEventListener('click', function () {
            var movieId = this.getAttribute('data-id');

            if (confirm('Bạn có chắc chắn muốn xóa phim này khỏi danh sách yêu thích?')) {
                fetch('remove_favorite.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'movie_id=' + movieId
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        alert(data.message);
                        // Xóa phim khỏi giao diện sau khi xóa thành công
                        this.closest('.movie-box').remove();
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        });
    });
});
</script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const favoriteContent = document.getElementById('favorite-content');
            const favorites = JSON.parse(localStorage.getItem('favorites')) || [];

            favorites.forEach(movieId => {
                // Find the corresponding movie box from the main page
                const movieBox = document.querySelector(`#${movieId}`).cloneNode(true);
                favoriteContent.appendChild(movieBox);
            });
        });
    </script>
</body>


<!--swiper files-->
<script src="js/swiper-bundle.min.js"></script>
<!--js-->
<script src="js/main.js"></script>