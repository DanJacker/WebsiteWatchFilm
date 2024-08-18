<?php

class FavoriteModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function addFavorite($userId, $movieId) {
        $stmt = $this->conn->prepare("INSERT INTO favorites (user_id, movie_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $userId, $movieId);
        return $stmt->execute();
    }

    public function removeFavorite($userId, $movieId) {
        $stmt = $this->conn->prepare("DELETE FROM favorites WHERE user_id = ? AND movie_id = ?");
        $stmt->bind_param("ii", $userId, $movieId);
        return $stmt->execute();
    }

    public function getFavorites($userId) {
        $stmt = $this->conn->prepare("SELECT movie_id FROM favorites WHERE user_id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
