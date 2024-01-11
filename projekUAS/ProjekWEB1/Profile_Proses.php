<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"])) {
    if ($_POST["action"] == "update") {
        $name = $_POST["name"];
        $nim = $_POST["nim"];

        $sql = "UPDATE mahasiswa1 SET nama='$name', nim='$nim' WHERE id=1";
        if ($conn->query($sql) === TRUE) {
            header("Location: profile.php");
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
}

$conn->close();
?>
