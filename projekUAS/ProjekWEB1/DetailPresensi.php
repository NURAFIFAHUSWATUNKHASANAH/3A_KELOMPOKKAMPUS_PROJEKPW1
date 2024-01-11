<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Presensi</title>
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
        }

        a {
            text-decoration: none;
            color: #0F2167;
            transition: color 0.3s;
        }

        a:hover {
            color: #45a049;
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

    <div class="content-container">
        <header>
            <h2>Detail Presensi - Mata Kuliah ADPL</h2>
        </header>

       
            <table>
    <tr>
        <th>Attendance Date</th>
        <th>Mata Kuliah</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php
    include('db.php'); // Include the database connection file

    if (isset($_GET['matakuliah'])) {
        $matakuliah = $_GET['matakuliah'];

        // Replace this with your actual database query with filtering by matakuliah
        $sql = "SELECT id, attendance_date, matakuliah, status FROM students WHERE matakuliah = '$matakuliah'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['attendance_date'] . "</td>";
                echo "<td>" . $row['matakuliah'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td><a href='edit_home.php?id=" . $row['id'] . "'>Edit</a></td>"; // Replace 'edit.php' with your actual edit page
                echo "<td><a href='delete_home.php?id=" . $row['id'] . "'>Delete</a></td>"; // Replace 'delete.php' with your actual delete page
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No records found</td></tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Invalid request</td></tr>";
    }

    $conn->close();
    ?>
</table>

</body>
</html>