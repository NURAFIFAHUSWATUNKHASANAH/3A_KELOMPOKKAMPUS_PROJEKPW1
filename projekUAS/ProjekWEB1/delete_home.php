<?php
include("db.php");

$id = $_GET["id"];

$sql = "DELETE FROM students WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: index_home.php");
    exit();
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
