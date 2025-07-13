<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "petshop_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit;
    } else {
        echo "<script>alert('Password salah!'); window.location.href='index.php';</script>";
    }
} else {
    echo "<script>alert('Username tidak ditemukan!'); window.location.href='index.php';</script>";
}
?>