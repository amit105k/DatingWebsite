<?php
$bookingDetails = isset($_SESSION['bookingDetails']) ? json_decode($_SESSION['bookingDetails'], true) : null;
?>

<?php 
// include("db.php");

// $id=$bookingDetails['movie']['id'];
// $stmt = $conn->prepare("SELECT * FROM movie_details WHERE id = ?");
// $stmt->bind_param("i", $id); 
// $stmt->execute();
// $result = $stmt->get_result();
// if($result->num_rows){
//     while($row=$result->fetch_assoc()){
//         $movie_id=$row['id'];
//     }
// }

include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $movieName = $_POST['movieName'];
    $movieDescription = $_POST['movieDescription'];
    $movieImage = $_POST['movieImage'];
    $movieId = $_POST['movieId'];

    $userProfileName = $_POST['userProfileName'];
    $userProfileAge = $_POST['userProfileAge'];
    $userProfileGender = $_POST['userProfileGender'];
    $userProfileAddress = $_POST['userProfileAddress'];
    $userProfileImage = $_POST['userProfileImage'];

    $oppositeProfileName = $_POST['oppositeProfileName'];
    $oppositeProfileAge = $_POST['oppositeProfileAge'];
    $oppositeProfileGender = $_POST['oppositeProfileGender'];
    $oppositeProfileAddress = $_POST['oppositeProfileAddress'];
    $oppositeProfileImage = $_POST['oppositeProfileImage'];

    $sql = "INSERT INTO bookings (movie, mname, mdesc, rsr, rname, rage, rgender, raddress, profile_id) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssssssssssss", $movieName, $movieDescription, $movieImage, $movieId,
                                             $userProfileName, $userProfileAge, $userProfileGender, $userProfileAddress, $userProfileImage,
                                             $oppositeProfileName, $oppositeProfileAge, $oppositeProfileGender, $oppositeProfileAddress, $oppositeProfileImage);

        if ($stmt->execute()) {
            echo "Booking confirmed successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Booking</title>
</head>
<body>

    
    <form id="reviewForm">
            <!-- <h1>Review Your Booking</h1> -->
            <!-- Movie Details -->

            <!-- <p>Movie ID: <?php echo htmlspecialchars($movie_id); ?></p> -->
            <h2>Movie Details</h2>
            <label for="movieName">Movie Name</label>
            <input type="text" id="movieName" name="movieName" value="<?php echo $bookingDetails['movie']['name']; ?>" readonly><br>

            <label for="movieDescription">Movie Description</label>
            <textarea id="movieDescription" name="movieDescription" readonly><?php echo $bookingDetails['movie']['description']; ?></textarea><br>

            <label for="movieImage">Movie Image URL</label>
            <input type="text" id="movieImage" name="movieImage" value="<?php echo $bookingDetails['movie']['image']; ?>" readonly><br>

            <label for="movieId">Movie ID</label>
            <input type="text" id="movieId" name="movieId" value="<?php echo $bookingDetails['movie']['id']; ?>" readonly><br>

            <!-- User Profile -->
            <h2>Your Profile</h2>
            <label for="userProfileName">Your Name</label>
            <input type="text" id="userProfileName" name="userProfileName" value="<?php echo $bookingDetails['userProfile']['name']; ?>" readonly><br>

            <label for="userProfileAge">Your Age</label>
            <input type="text" id="userProfileAge" name="userProfileAge" value="<?php echo $bookingDetails['userProfile']['age']; ?>" readonly><br>

            <label for="userProfileGender">Your Gender</label>
            <input type="text" id="userProfileGender" name="userProfileGender" value="<?php echo $bookingDetails['userProfile']['gender']; ?>" readonly><br>

            <label for="userProfileAddress">Your Address</label>
            <input type="text" id="userProfileAddress" name="userProfileAddress" value="<?php echo $bookingDetails['userProfile']['address']; ?>" readonly><br>

            <label for="userProfileImage">Your Profile Image URL</label>
            <input type="text" id="userProfileImage" name="userProfileImage" value="<?php echo $bookingDetails['userProfile']['image']; ?>" readonly><br>

            <!-- Opposite Profile -->
            <h2>Opposite Profile</h2>
            <label for="oppositeProfileName">Opposite Profile Name</label>
            <input type="text" id="oppositeProfileName" name="oppositeProfileName" value="<?php echo $bookingDetails['oppositeProfile']['name']; ?>" readonly><br>

            <label for="oppositeProfileAge">Opposite Profile Age</label>
            <input type="text" id="oppositeProfileAge" name="oppositeProfileAge" value="<?php echo $bookingDetails['oppositeProfile']['age']; ?>" readonly><br>

            <label for="oppositeProfileGender">Opposite Profile Gender</label>
            <input type="text" id="oppositeProfileGender" name="oppositeProfileGender" value="<?php echo $bookingDetails['oppositeProfile']['gender']; ?>" readonly><br>

            <label for="oppositeProfileAddress">Opposite Profile Address</label>
            <input type="text" id="oppositeProfileAddress" name="oppositeProfileAddress" value="<?php echo $bookingDetails['oppositeProfile']['address']; ?>" readonly><br>

            <!-- <label for="oppositeProfileImage">Opposite Profile Image URL</label>
            <input type="text" id="oppositeProfileImage" name="oppositeProfileImage" value="<?php echo $bookingDetails['oppositeProfile']['image']; ?>" readonly><br> -->
            <img src="<?php echo $bookingDetails['oppositeProfile']['image']; ?>" alt="Opposite Profile Image" style="width: 200px; height: 200px; object-fit: cover; border-radius: 8px;">

             

            <button type="submit">Confirm Booking</button>
        </form>
   
</body>
<style>
    /* General Styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    padding: 20px;
    display: flex;
}

.container {
    max-width: 900px;
    margin: auto;
    background: #fff;
    padding: 30px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    margin-top: 40px;
}
input{
    display: readonly;
}
#reviewForm{
    width: 70%;
    margin: auto;
}
h1 {
    text-align: center;
    color: #333;
    font-size: 2rem;
    margin-bottom: 20px;
}

h2 {
    color: #5aa15e;
    font-size: 1.5rem;
    margin-top: 20px;
}

h3 {
    font-size: 1.25rem;
    margin-top: 10px;
    color: #333;
}

/* Form Section Styling */
.form-section {
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 1px solid #e4e4e4;
}

label {
    display: block;
    font-weight: bold;
    margin-top: 10px;
    color: #444;
}

input,
textarea {
    width: 100%;
    padding: 12px;
    margin-top: 5px;
    margin-bottom: 15px;
    border-radius: 8px;
    border: 1px solid #ddd;
    background-color: #f9f9f9;
    box-sizing: border-box;
    font-size: 1rem;
    color: #333;
}

input:focus,
textarea:focus {
    border-color: #4CAF50;
    outline: none;
    box-shadow: 0 0 5px rgba(76, 175, 80, 0.2);
}

textarea {
    height: 120px;
    resize: vertical;
}

/* Readonly Fields Styling */
.readonly {
    background-color: #f5f5f5;
    cursor: not-allowed;
}

/* Button Styling */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 28px;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
    width: 100%;
}

button:hover {
    background-color: #45a049;
}

/* Responsive Styles */
@media screen and (max-width: 768px) {
    .container {
        padding: 20px;
    }

    h1 {
        font-size: 1.5rem;
    }

    input,
    textarea {
        font-size: 0.9rem;
    }

    button {
        font-size: 1rem;
    }
}

@media screen and (max-width: 480px) {
    h1 {
        font-size: 1.3rem;
    }

    .container {
        padding: 15px;
    }
}

</style>
</html>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const bookingDetails = JSON.parse(sessionStorage.getItem('bookingDetails'));

        if (bookingDetails) {
            document.getElementById('movieName').value = bookingDetails.movie.name;
            document.getElementById('movieDescription').value = bookingDetails.movie.description;
            document.getElementById('movieImage').value = bookingDetails.movie.image;
            document.getElementById('movieId').value = bookingDetails.movie.id;

            document.getElementById('userProfileName').value = bookingDetails.userProfile.name;
            document.getElementById('userProfileAge').value = bookingDetails.userProfile.age;
            document.getElementById('userProfileGender').value = bookingDetails.userProfile.gender;
            document.getElementById('userProfileAddress').value = bookingDetails.userProfile.address;
            document.getElementById('userProfileImage').value = bookingDetails.userProfile.image;

            document.getElementById('oppositeProfileName').value = bookingDetails.oppositeProfile.name;
            document.getElementById('oppositeProfileAge').value = bookingDetails.oppositeProfile.age;
            document.getElementById('oppositeProfileGender').value = bookingDetails.oppositeProfile.gender;
            document.getElementById('oppositeProfileAddress').value = bookingDetails.oppositeProfile.address;
            document.getElementById('oppositeProfileImage').value = bookingDetails.oppositeProfile.image;
        }
    });
</script>