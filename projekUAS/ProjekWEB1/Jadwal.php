<?php
include('db.php');

// Your existing code for adding data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hari = $_POST['hari'];
    $mata_kuliah = $_POST['mata_kuliah'];
    $kode_mata_kuliah = $_POST['kode_mata_kuliah'];
    $dosen_nidn = $_POST['dosen_nidn'];

    $sql = "INSERT INTO jadwal_kuliah (hari, mata_kuliah, kode_mata_kuliah, dosen_nidn) 
            VALUES ('$hari', '$mata_kuliah', '$kode_mata_kuliah', '$dosen_nidn')";

    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch and display existing data
$result = $conn->query("SELECT * FROM jadwal_kuliah");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
                .navbar {
            overflow: hidden;
            background-color: #0F2167;
            position: fixed;
            top: 0;
            width: 100%;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        h1 {
            color: #0F2167;
            text-align: center;
            margin-top: 80px;
        }

        h2 {
            color: #0F2167;
            text-align: center;
            margin-top: 20px;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #0F2167;
            color: white;
        }

        tr:hover {
            background-color: #e0e0e0;
            cursor: pointer; /* Add cursor pointer on hover */
        }

        a {
            text-decoration: none;
            color: #0F2167;
            transition: color 0.3s;
        }

        a:hover {
            color: #45a049;
        }

        .add-link {
            display: inline-block;
            margin: 20px auto;
            padding: 12px 20px;
            background-color: #0F2167;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .add-link:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<nav>
    <div class="navbar">
        <a href="Home.php">Home</a>
        <a href="Jadwal.php">Jadwal</a>
        <a href="Presensi.php">Presensi</a>
        <a href="Profile.php">Profile</a>
    </div>
</nav>

<h1>Data Jadwal Kuliah</h1>

<table>
    <thead>
    <tr>
        <th>Hari</th>
        <th>Mata Kuliah</th>
        <th>Kode Mata Kuliah</th>
        <th>Dosen NIDN</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    // Loop through the result set and display data
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['hari'] . "</td>";
        echo "<td>" . $row['mata_kuliah'] . "</td>";
        echo "<td>" . $row['kode_mata_kuliah'] . "</td>";
        echo "<td>" . $row['dosen_nidn'] . "</td>";
        echo "<td>
                <a href='edit_jadwal.php?id=" . $row['id'] . "'>Edit</a> |
                <a href='delete_jadwal.php?id=" . $row['id'] . "'>Delete</a>
              </td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>

<!-- Form for adding new data -->
<form action="Jadwal.php" method="post" style="max-width: 400px; margin: 20px auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; background-color: #fff;">
    <label for="hari" style="display: block; margin-bottom: 8px;">Hari:</label>
    <input type="text" name="hari" required style="width: 100%; padding: 8px; margin-bottom: 16px; box-sizing: border-box;">

    <label for="mata_kuliah" style="display: block; margin-bottom: 8px;">Mata Kuliah:</label>
    <input type="text" name="mata_kuliah" required style="width: 100%; padding: 8px; margin-bottom: 16px; box-sizing: border-box;">

    <label for="kode_mata_kuliah" style="display: block; margin-bottom: 8px;">Kode Mata Kuliah:</label>
    <input type="text" name="kode_mata_kuliah" required style="width: 100%; padding: 8px; margin-bottom: 16px; box-sizing: border-box;">

    <label for="dosen_nidn" style="display: block; margin-bottom: 8px;">Dosen NIDN:</label>
    <input type="text" name="dosen_nidn" required style="width: 100%; padding: 8px; margin-bottom: 16px; box-sizing: border-box;">

    <button type="submit" style="background-color: #0F2167; color: #fff; padding: 10px; border: none; border-radius: 4px; cursor: pointer;">Add Data</button>
</form>


</body>
</html>
