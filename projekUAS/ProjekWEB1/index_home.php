<?php
include("db.php");

$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<html>
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

<h2>Student Attendance</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Student ID</th>
        <th>Attendance Date</th>
        <th>Mata Kuliah</th>
        <th>Status</th> <!-- Make sure the column name matches your database -->
        <th>Action</th>
    </tr>

    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["student_id"] . "</td>";
        echo "<td>" . $row["attendance_date"] . "</td>";
        echo "<td>" . $row["matakuliah"] . "</td>"; // Make sure the column name matches your database
        echo "<td>" . $row["status"] . "</td>"; // Make sure the column name matches your database
        echo "<td><a href='edit_home.php?id=" . $row["id"] . "'>Edit</a> | <a href='delete_home.php?id=" . $row["id"] . "'>Delete</a></td>";
        echo "</tr>";
    }
    ?>

</table>

<br>
<a href="add_home.php">Add New Attendance</a>

</body>
</html>
