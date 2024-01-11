<?php
include('db.php');

// Check if the ID parameter is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the record from the database
    $deleteQuery = "DELETE FROM jadwal_kuliah WHERE id = $id";

    if ($conn->query($deleteQuery) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request. Missing ID parameter.";
}

// Redirect back to the main page after deleting
header("Location: Jadwal.php");
exit();
?>
