<?php include("db.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
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
            margin-top: 80px;
            padding: 20px;
        }

        h2 {
            color: #0F2167;
        }

        .profile {
            margin-top: 20px;
            display: flex;
            align-items: center;
            flex-direction: column;
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .profile label {
            display: block;
            margin: 10px 0;
            color: #333;
            font-weight: bold;
        }

        .profile span {
            color: #0F2167;
            font-weight: bold;
            font-size: 18px;
        }

        .crud-form {
            width: 50%;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .crud-form label {
            display: block;
            margin: 10px 0;
            color: #333;
            font-weight: bold;
        }

        .crud-form input,
        .crud-form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .crud-form input[type="submit"] {
            background-color: #0F2167;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            display: inline-block;
        }

        .crud-form input[type="submit"]:hover {
            background-color: #0F2167;
        }
    </style>
</head>
<body>

<div class="navbar">
    <a href="Home.php">Home</a>
    <a href="Jadwal.php">Jadwal</a>
    <a href="Presensi.php">Presensi</a>
    <a href="Profile.php">Profile</a>
</div>

<div class="content">
    <?php
    $sql = "SELECT * FROM mahasiswa1 WHERE id = 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    ?>
        <div class="profile">
            <img src="AFI3.jpg" alt="Your Photo">

            <label for="profile-name">Name:</label>
            <span id="profile-name"><b><?php echo $row['nama']; ?></b></span>

            <label for="profile-nim">NIM:</label>
            <span id="profile-nim"><b><?php echo $row['nim']; ?></b></span>
        </div>

        <div class="crud-form">
            <h2>Manage Profile</h2>
            <form method="post" action="Profile_Proses.php">
                <input type="hidden" name="action" value="update">

                <label for="name">Name:</label>
                <input type="text" name="name" value="<?php echo $row['nama']; ?>" required>

                <label for="nim">NIM:</label>
                <input type="text" name="nim" value="<?php echo $row['nim']; ?>" required>

                <input type="submit" value="Update Profile">
            </form>
        </div>
    <?php
    } else {
        echo "Data not found";
    }
    ?>
</div>

</body>
</html>
