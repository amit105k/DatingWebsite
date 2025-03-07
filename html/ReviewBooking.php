<?php
session_start();
$amit = isset($_SESSION['user']); 

if (!$amit) {
    header("Location: CustLogin.php"); 
   echo"something went wrong please login again";
    exit();
}
include("db.php");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_POST['user-id'];
    // $userName = $_POST['user-name'];
    // $userAge = $_POST['user-age'];
    // $userGender = $_POST['user-gender'];
    // $userAddress = $_POST['user-address'];

    $movieId = $_POST['movie-id'];
    // $movieName = $_POST['movie-name'];
    // $movieImage = $_POST['movie-image'];
    // $movieDescription = $_POST['movie-description'];

    $daterId = $_POST['dater-id'];
    // $daterName = $_POST['dater-name'];
    // $daterAge = $_POST['dater-age'];
    // $daterGender = $_POST['dater-gender'];
    // $daterAddress = $_POST['dater-address'];

    // $sql = "INSERT INTO bookings 
    //         (user_id, user_name, user_age, user_gender, user_address,
    //          movie_id, movie_name, movie_image, movie_description,
    //          dater_id, dater_name, dater_age, dater_gender, dater_address) 
    //         VALUES 
    //         ('$userId', '$userName', '$userAge', '$userGender', '$userAddress', 
    //          '$movieId', '$movieName', '$movieImage', '$movieDescription', 
    //          '$daterId', '$daterName', '$daterAge', '$daterGender', '$daterAddress')";
    $sql = "INSERT INTO bookings (user_id,movie_id,dater_id)VALUES('$userId','$movieId', '$daterId')";
    if ($conn->query($sql) === TRUE) {
        $message = "Data has been inserted into the database.";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.20/dist/sweetalert2.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            width: 400px;
            display: flex;
            flex-direction: column;
        }
        h3 {
            color: #333;
        }
        label {
            margin-top: 10px;
            font-weight: bold;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            font-size: 14px;
        }
        textarea {
            height: 80px;
        }
        .btn-submit {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            font-size: 16px;
        }
        .btn-submit:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Your Details</h3>
        <form method="POST" action="">
            <!-- Populate user details from session -->
            <label for="user-id">Your ID</label>
            <input type="text" id="user-id" name="user-id" value="<?php echo $_SESSION['user']['id']; ?>" readonly>

            <label for="user-name">Your Name</label>
            <input type="text" id="user-name" name="user-name" value="<?php echo $_SESSION['user']['name']; ?>" readonly>

            <label for="user-age">Your Age</label>
            <input type="text" id="user-age" name="user-age" value="<?php echo $_SESSION['user']['age']; ?>" readonly>

            <label for="user-gender">Your Gender</label>
            <input type="text" id="user-gender" name="user-gender" value="<?php echo $_SESSION['user']['gender']; ?>" readonly>

            <label for="user-address">Your Address</label>
            <input type="text" id="user-address" name="user-address" value="<?php echo $_SESSION['user']['address']; ?>" readonly>

            <h3>Movie Details</h3>
            <label for="movie-id">Movie ID</label>
            <input type="text" id="movie-id" name="movie-id" value="" readonly>

            <label for="movie-name">Movie Name</label>
            <input type="text" id="movie-name" name="movie-name" value="" readonly>

            <label for="movie-image">Movie Image</label>
            <input type="text" id="movie-image" name="movie-image" value="" readonly>

            <label for="movie-description">Movie Description</label>
            <textarea id="movie-description" name="movie-description" readonly></textarea>

            <h3>Date With</h3>
            <label for="dater-id">Dater ID</label>
            <input type="text" id="dater-id" name="dater-id" value="" readonly>

            <label for="dater-name">Dater Name</label>
            <input type="text" id="dater-name" name="dater-name" value="" readonly>

            <label for="dater-age">Dater Age</label>
            <input type="text" id="dater-age" name="dater-age" value="" readonly>

            <label for="dater-gender">Dater Gender</label>
            <input type="text" id="dater-gender" name="dater-gender" value="" readonly>

            <label for="dater-address">Dater Address</label>
            <input type="text" id="dater-address" name="dater-address" value="" readonly>

            <button type="submit" class="btn-submit">Send Request</button>
            <button class="btn-submit"><a href="newModal.php" >Back To Matching</a></button>
            <button class="btn-submit"><a href="index.php" >Back To Home</a></button>
        </form>
    </div>

    <?php
    if (isset($message)) {
        echo "<script>
            Swal.fire({
                title: 'Success!',
                text: '$message',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>";
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.20/dist/sweetalert2.all.min.js"></script>
</body>
</html>
<style>
    .btn-submit a{
        color: white;
        text-decoration: none;
    }
    .btn-submit{
        gap:2px !important;
        padding: 11px;
        font-size: 16px;
    }
</style>