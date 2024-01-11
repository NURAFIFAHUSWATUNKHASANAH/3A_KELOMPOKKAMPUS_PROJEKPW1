<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve data from the form
    $id = $_POST['id'];
    $hari = $_POST['hari'];
    $mata_kuliah = $_POST['mata_kuliah'];
    $kode_mata_kuliah = $_POST['kode_mata_kuliah'];
    $dosen_nidn = $_POST['dosen_nidn'];

    // Update the record in the database
    $updateQuery = "UPDATE jadwal_kuliah 
                    SET hari='$hari', mata_kuliah='$mata_kuliah', kode_mata_kuliah='$kode_mata_kuliah', dosen_nidn='$dosen_nidn' 
                    WHERE id=$id";

    if ($conn->query($updateQuery) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request. Please submit the form.";
}
?>
