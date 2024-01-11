<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi input
    $name = htmlspecialchars($_POST["name"]);
    $student_id = htmlspecialchars($_POST["student_id"]);
    $attendance_date = htmlspecialchars($_POST["attendance_date"]);
    $matakuliah = htmlspecialchars($_POST["matakuliah"]);  // Add this line
    $status = htmlspecialchars($_POST["status"]);

    // Gunakan prepared statement untuk menghindari SQL injection
    $sql = $conn->prepare("INSERT INTO students (name, student_id, attendance_date, matakuliah, status) VALUES (?, ?, ?, ?, ?)");
    $sql->bind_param("sssss", $name, $student_id, $attendance_date, $matakuliah, $status);

    if ($sql->execute()) {
        header("Location: index_home.php");
        exit();
    } else {
        echo "Error: " . $sql->error;
    }
}    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Attendance</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

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
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .content {
            margin-top: 60px; /* Adjust this value based on your navbar height */
            padding: 16px;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #0F2167;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            display: inline-block;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="navbar">
    <a href="Home.php">Home</a>
    <a href="Jadwal.php">Jadwal</a>
    <a href="Presensi.php">Presensi</a>
</div>

<div class="content">
    <h2>Add Attendance</h2>

    <form method="post" action="add_home.php">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name"><br>

    <label for="student_id">Student ID:</label>
    <input type="text" name="student_id" id="student_id"><br>

    <label for="attendance_date">Attendance Date:</label>
    <input type="date" name="attendance_date" id="attendance_date"><br>

    <label for="matakuliah">Mata Kuliah:</label>
<select name="matakuliah" id="matakuliah">
    <option value="E-Commerce">E-Commerce</option>
    <option value="Aljabar Linear">Aljabar Linear</option>
    <option value="ADPL">ADPL</option>
    <option value="IMK">IMK</option>
    <option value="RPL">RPL</option>
    <option value="Matdis">Matdis</option>
    <option value="Logika Informat">Logika Informat</option>
</select><br>

<label for="status">Status:</label>
<select name="status" id="status">
    <option value="Hadir">Hadir</option>
    <option value="Alpha">Alpha</option>
    <option value="Izin">Izin</option> 
    <option value="Sakit">Sakit</option> <!-- Corrected order -->
</select><br>

    <input type="submit" value="Kirim">
</form>


</div>

</body>
</html>
