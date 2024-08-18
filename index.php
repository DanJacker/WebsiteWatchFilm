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
            <a href="Login.html" class="user" id="user-icon">
                <img src="img/user.png" alt="" class="user-img">
            </a>
            <div class="dropdown" id="dropdown-menu" style="display: none;">
                <a href="#" id="logout-button">Đăng Xuất</a>
            </div>

            <!--nav-bar-->
            <div class="nav-bar">
                <a href="#home" class="nav-link nav-active">
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

    <!--home-->
    <section class="home container" id="home">
        <!--home-img-->
        <img src="img/home-background.png" alt="" class="home-img">
        <!--home-text-->
        <div class="home-text">
            <h1 class="home-title">Hitman 's Wife 's <br> Bodyguard </h1>
            <p>Releasing 10 April</p>
            <a href="#" class="watch-btn">
                <i class='bx bx-right-arrow'></i>
                <span>Watch the trailer</span>
            </a>
        </div>

    </section>
    <!--home-end-->
    <!--popular-start-->
    <section class="popular container" id="popular">
        <!--heading-->
        <div class="heading">
            <h2 class="heading-title">Phim nhieu nguoi xem</h2>
            <!--swiper-button-->
            <div class="swiper-btn">
                <div class="swiper-button-prev">
                    <i class='bx bx-chevron-left'></i>
                </div>
                <div class="swiper-button-next">
                    <i class='bx bx-chevron-right'></i>
                </div>
            </div>
        </div>
        <!--content-->
        <div class="popular-content swiper">
            <div class="swiper-wrapper">
                <!--movie-box 1-->
                <div class="swiper-slide">
                    <div class="movie-box" id="movie1">
                        <img src="img/popular-movie-1.jpg" alt="" class="movie-box-img">
                        <div class="box-text">
                            <h2 class="movie-title">Spider-Man: No Way Home</h2>
                            <span class="movie-type">Action</span>
                            <a href="#" class="watch-btn play-btn">
                                <i class='bx bx-right-arrow'></i>
                            </a>
                            <a href="#" class="favorite-btn" data-id="movie1">
                                <i class='bx bxs-star'></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!--movie-box 2-->
                <div class="swiper-slide" id="movie2">
                    <div class="movie-box">
                        <img src="img/popular-movie-2.jpg" alt="" class="movie-box-img">
                        <div class="box-text">
                            <h2 class="movie-title">Jungle Cruise</h2>
                            <span class="movie-type">Action/Adventure</span>
                            <a href="#" class="watch-btn play-btn">
                                <i class='bx bx-right-arrow'></i>
                            </a>
                            <a href="#" class="favorite-btn" data-id="movie2">
                                <i class='bx bxs-star'></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!--movie-box 3-->
                <div class="swiper-slide" id="movie3">
                    <div class="movie-box">
                        <img src="img/popular-movie-3.jpg" alt="" class="movie-box-img">
                        <div class="box-text">
                            <h2 class="movie-title">Loki</h2>
                            <span class="movie-type">Action</span>
                            <a href="#" class="watch-btn play-btn">
                                <i class='bx bx-right-arrow'></i>
                            </a>
                            <a href="#" class="favorite-btn" data-id="movie3">
                                <i class='bx bxs-star'></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!--movie-box 4-->
                <div class="swiper-slide" id="movie4">
                    <div class="movie-box">
                        <img src="img/popular-movie-4.jpg" alt="" class="movie-box-img">
                        <div class="box-text">
                            <h2 class="movie-title">Squid Game</h2>
                            <span class="movie-type">Action/Horror/Drama</span>
                            <a href="#" class="watch-btn play-btn">
                                <i class='bx bx-right-arrow'></i>
                            </a>
                            <a href="#" class="favorite-btn" data-id="movie4">
                                <i class='bx bxs-star'></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!--movie-box 5-->
                <div class="swiper-slide" id="movie5">
                    <div class="movie-box">
                        <img src="img/popular-movie-5.jpg" alt="" class="movie-box-img">
                        <div class="box-text">
                            <h2 class="movie-title">The Falcon and The Winter Sodier</h2>
                            <span class="movie-type">Action</span>
                            <a href="#" class="watch-btn play-btn">
                                <i class='bx bx-right-arrow'></i>
                            </a>
                            <a href="#" class="favorite-btn" data-id="movie5">
                                <i class='bx bxs-star'></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!--movie-box 6-->
                <div class="swiper-slide" id="movie6">
                    <div class="movie-box">
                        <img src="img/popular-movie-6.jpg" alt="" class="movie-box-img">
                        <div class="box-text">
                            <h2 class="movie-title">Haweye</h2>
                            <span class="movie-type">Action</span>
                            <a href="#" class="watch-btn play-btn">
                                <i class='bx bx-right-arrow'></i>
                            </a>
                            <a href="#" class="favorite-btn" data-id="movie6">
                                <i class='bx bxs-star'></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!--movie-box 7-->
                <div class="swiper-slide" id="movie7">
                    <div class="movie-box">
                        <img src="img/popular-movie-7.jpg" alt="" class="movie-box-img">
                        <div class="box-text">
                            <h2 class="movie-title">Agents of S.H.E.I.L.D.</h2>
                            <span class="movie-type">Action</span>
                            <a href="#" class="watch-btn play-btn">
                                <i class='bx bx-right-arrow'></i>
                            </a>
                            <a href="#" class="favorite-btn" data-id="movie7">
                                <i class='bx bxs-star'></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!--movie-box 8-->
                <div class="swiper-slide" id="movie8">
                    <div class="movie-box">
                        <img src="img/popular-movie-8.jpg" alt="" class="movie-box-img">
                        <div class="box-text">
                            <h2 class="movie-title">The Flash</h2>
                            <span class="movie-type">Action</span>
                            <a href="#" class="watch-btn play-btn">
                                <i class='bx bx-right-arrow'></i>
                            </a>
                            <a href="#" class="favorite-btn" data-id="movie8">
                                <i class='bx bxs-star'></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!--popular-end-->
    <!--movie-start-->
    <section class="movies container" id="movies">
        <!--heading-->
        <div class="heading">
            <h2 class="heading-title">Movies and Show</h2>
        </div>
        <!--movies content-->
        <div class="movies-content">
            <?php include 'movies.php'; ?>
            <div class="movie-box">
                <img src="img/movie-1.jpg" alt="" class="movie-box-img">
                <div class="box-text">
                    <h2 class="movie-title">Example Movie</h2>
                    <span class="movie-type">Action/Comedy</span>
                    <a href="play-page.html" class="watch-btn play-btn">
                        <i class='bx bx-right-arrow'></i>
                    </a>
                </div>
            </div>
            <!-- Repeat for other movies -->
        </div>

    </section>
    <!--movie-end-->
    <!--Next page-->
    <div class="next-page">
        <a href="#" class="next-btn">Next page</a>
    </div>
    <!--copy-right-->
    <div class="copyright">
        <p>&#169; Nhom 6</p>
    </div>

    <!--swiper js-->
    <script src="js/swiper-bundle.min.js"></script>
    <!--js-->
    <script src="js/main.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
    const favoriteButtons = document.querySelectorAll('.favorite-btn');

    favoriteButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();

            const movieId = this.getAttribute('data-id');

            // Kiểm tra xem người dùng đã đăng nhập chưa
            fetch('check_login.php')
                .then(response => response.json())
                .then(data => {
                    if (data.loggedIn) {
                        // Nếu đã đăng nhập, gửi yêu cầu thêm bộ phim vào danh sách yêu thích
                        fetch('add_favorite.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: `movie_id=${movieId}`
                        })
                        .then(response => response.text())
                        .then(result => {
                            alert(result);
                        });
                    } else {
                        // Nếu chưa đăng nhập, thông báo và chuyển hướng đến trang đăng nhập
                        alert('Bạn chưa đăng nhập. Vui lòng đăng nhập để thêm vào danh sách yêu thích.');
                        window.location.href = 'login.html';
                    }
                });
        });
    });
});

</script>

</body>
<!--swiper files-->
<script src="js/swiper-bundle.min.js"></script>
<!--js-->
<script src="js/main.js"></script>

</html>