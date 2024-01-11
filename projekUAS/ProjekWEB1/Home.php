<?php
include('db.php');

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $kode_mata_kuliah = $_POST["kode"];
    $mata_kuliah = $_POST["mata_kuliah"];

    // Insert data into the database
    $sql = "INSERT INTO mata_kuliah (kode_mata_kuliah, mata_kuliah) VALUES ('$kode_mata_kuliah', '$mata_kuliah')";

    if ($conn->query($sql) === TRUE) {
        echo "Jadwal berhasil ditambahkan!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Display existing schedule rows
$result = $conn->query("SELECT kode_mata_kuliah, mata_kuliah FROM mata_kuliah");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-image: url('Home2.png');
    background-size: 40% 50%;
    background-position: center 50%;
    background-repeat: no-repeat;
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
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .content {
            text-align: center;
            margin-top: 40px;
            margin-left: 40px;
            padding: 1px;
        }
        h1 {
            color: #92C7CF; /* Set the color for the h1 text (blue) */
            font-size: 20px; /* Adjust the font size as needed */
            text-align: right; /* Center the text */
            margin-top: 10px;
            margin-right:15px ; /* Adjust the top margin as needed */
        }

        h2 {
            color: #0F2167;
            margin-top: 0px;
        }



        .profile {
            max-width: 400px;
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
        }
span {
            display: block;
            font-size: 18px;
            color: #333;
            text-align: center; /* Center the text */
        }


        .profile img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .profile span {
            color: #0F2167;
        }

        table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background-color: rgba(255, 255, 255, 0.8); /* Add a semi-transparent white background to the table */
            padding: 10px;
            border-radius: 8px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #0F2167;
            color: white;
        }
        
.navbar-button {
    display: inline-block;
    padding: 10px 100px;
    text-decoration: none;
    color: #ffffff; /* Text color */
    background-color: #0F2167; /* Button background color */
    border-radius: 5px; /* Rounded corners */
    transition: background-color 0.3s ease; 
    float: right;
    
}

.navbar-button:hover {
    background-color: #2980b9; /* Button background color on hover */
}

.presensi {
    
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
    <h1 >ABCENCYH</h1>
</div>
<div class="content">
    <div class="profile">
        <img src="AFI3.jpg" alt="Your Photo">
        <span><b>NUR AFIFAH USWATUN KHASANAH</b></span>
    </div>
    </nav>
    <a href="Presensi.php" class="navbar-button presensi" style="margin-right: 127px;">Presensi</a>
    <a href="Profile.php" class="navbar-button presensi" style="margin-right: 30px;">Profile</a>
    <div class="content">
        <table>
    <tr>
        <th>Kode Mata Kuliah</th>
        <th>Mata Kuliah</th>
    </tr>
    <!-- Existing schedule rows... -->
    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<tr class='clickable-row' onclick=\"window.location='add_home.php?id=" . $row["mata_kuliah"] . "';\">";
        echo "<td>" . $row["kode_mata_kuliah"] . "</td>";
        echo "<td>" . $row["mata_kuliah"] . "</td>";
        echo "</tr>";
    }

    $conn->close();
    ?>
</table>

<style>
    .clickable-row {
        cursor: pointer;
    }
</style>
<!-- Form for adding and editing schedule -->
<form action="" method="post" style="max-width: 400px; margin: 20px auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; background-color: #fff; box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);">
    <h2 style="color: #0F2167;">Tambah Jadwal</h2>

    <label for="kode" style="display: block; margin-bottom: 8px; color: #333;">Kode Mata Kuliah:</label>
    <input type="text" name="kode" required style="width: 100%; padding: 8px; margin-bottom: 16px; border: 1px solid #ddd; border-radius: 4px;">

    <label for="mata_kuliah" style="display: block; margin-bottom: 8px; color: #333;">Mata Kuliah:</label>
    <input type="text" name="mata_kuliah" required style="width: 100%; padding: 8px; margin-bottom: 16px; border: 1px solid #ddd; border-radius: 4px;">

    <button type="submit" name="submit" style="background-color: #0F2167; color: #fff; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Tambah Jadwal</button>
</form>

    </div>
</body>
</html>
