<?php
session_start();
include 'koneksi.php'; // file koneksi database

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query user berdasarkan username atau email
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? ");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $user = $result->fetch_assoc();

        // Verifikasi password
        if(password_verify($password, $user['password'])){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: dashboard.php");
            exit;
        } else {
            echo "Password salah!";
        }
    } else {
        echo "User tidak ditemukan!";
    }
}
?>
