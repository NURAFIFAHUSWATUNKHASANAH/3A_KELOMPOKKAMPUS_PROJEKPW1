<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $student_id = $_POST["student_id"];
    $attendance_date = $_POST["attendance_date"];
    $status = $_POST["status"];

    $sql = "UPDATE students SET name='$name', student_id='$student_id', attendance_date='$attendance_date', status='$status' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index_home.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$id = $_GET["id"];
$sql = "SELECT * FROM students WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Attendance</title>
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

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

<h2>Edit Attendance</h2>

<form method="post" action="edit_home.php">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
    Student ID: <input type="text" name="student_id" value="<?php echo $row['student_id']; ?>"><br>
    Attendance Date: <input type="date" name="attendance_date" value="<?php echo $row['attendance_date']; ?>"><br>
    Status: 
    <select name="status">
    <option value="Hadir" <?php if ($row['status'] == 'Present') echo 'selected'; ?>>Hadir</option>
    <option value="Alpha" <?php if ($row['status'] == 'Absent') echo 'selected'; ?>>Alpha</option>
    <option value="Izin" <?php if ($row['status'] == 'Izin') echo 'selected'; ?>>Izin</option>
    <option value="Sakit" <?php if ($row['status'] == 'Sakit') echo 'selected'; ?>>Sakit</option>
</select><br>

    <input type="submit" value="Save">
</form>

</body>
</html>
