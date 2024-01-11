<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Attendance</title>
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

    <div class="content-container">
        <header>
            <h1>Daftar Kehadiran Saya</h1>
        </header>

        <table>
            <tr>
                <th>Mata Kuliah</th>
                <th>Total Kehadiran</th>
            </tr>
            <?php
            include('db.php'); // Include the database connection file

            // Replace this with your actual database query
            $sql = "SELECT matakuliah, COUNT(*) AS total_kehadiran FROM students GROUP BY matakuliah";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr onclick=\"window.location='DetailPresensi.php?matakuliah=" . $row['matakuliah'] . "';\">";
                    echo "<td>" . $row['matakuliah'] . "</td>";
                    echo "<td>" . $row['total_kehadiran'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No records found</td></tr>";
            }
            $conn->close();
            ?>
        </table>
    </div>

</body>
</html>
