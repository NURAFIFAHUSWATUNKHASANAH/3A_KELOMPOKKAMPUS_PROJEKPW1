<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $hari = $_POST["hari"];
    $mata_kuliah = $_POST["mata_kuliah"];
    $kode_mata_kuliah = $_POST["kode_mata_kuliah"];
    $dosen_nidn = $_POST["dosen_nidn"];

    $updateQuery = "UPDATE jadwal_kuliah 
                    SET hari='$hari', mata_kuliah='$mata_kuliah', kode_mata_kuliah='$kode_mata_kuliah', dosen_nidn='$dosen_nidn' 
                    WHERE id=$id";

    if ($conn->query($updateQuery) === TRUE) {
        header("Location: Jadwal.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the record from the database for editing
    $selectQuery = "SELECT * FROM jadwal_kuliah WHERE id = $id";
    $result = $conn->query($selectQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Display the form for editing
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #0F2167;
            text-align: center;
            margin-top: 20px;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #0F2167;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: #0F2167;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
        </head>
        <body>

        <h1>Edit Data Jadwal Kuliah</h1>

        <form action="edit_jadwal.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <label for="hari">Hari:</label>
            <input type="text" name="hari" value="<?php echo $row['hari']; ?>" required>

            <label for="mata_kuliah">Mata Kuliah:</label>
            <input type="text" name="mata_kuliah" value="<?php echo $row['mata_kuliah']; ?>" required>

            <label for="kode_mata_kuliah">Kode Mata Kuliah:</label>
            <input type="text" name="kode_mata_kuliah" value="<?php echo $row['kode_mata_kuliah']; ?>" required>

            <label for="dosen_nidn">Dosen NIDN:</label>
            <input type="text" name="dosen_nidn" value="<?php echo $row['dosen_nidn']; ?>" required>

            <button type="submit">Update Data</button>
        </form>

        </body>
        </html>
        <?php
    } else {
        echo "Record not found";
    }
} else {
    echo "Invalid request. Missing ID parameter.";
}

$conn->close();
?>
