<?php
session_start();

// Ganti dengan validasi login sesuai kebutuhan, contoh sederhana:
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Gantilah dengan validasi login yang sesuai, bisa menggunakan database atau sumber lainnya
    // Misalnya, jika menggunakan username "afifah" dan password "123"
    if ($username == "afifah" && $password == "123") {
        $_SESSION["username"] = $username;
        header("Location: home.php");
        exit();
    } else {
        $error_message = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Process</title>
</head>
<body>
    <?php if (isset($error_message)): ?>
        <p><?php echo $error_message; ?></p>
    <?php endif; ?>
</body>
</html>
