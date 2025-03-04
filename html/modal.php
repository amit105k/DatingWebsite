<?php
include("db.php");
session_start();
if (!isset($_SESSION['user'])) {
    echo "<script>Swal.fire('Not Logged In', 'Please login to continue!', 'warning');</script>";
}
$loggedInUser = ($_SESSION['user']);
$data = ($_SESSION['user']);

$query = "SELECT * FROM customer_reg WHERE email=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $data['email']);
$stmt->execute();
$resultt = $stmt->get_result();
$amit = $resultt->fetch_assoc();


function getRandomProfile($gender, $conn)
{
    $oppositeGender = ($gender === 'Male') ? 'Female' : 'Male';
    $query = "SELECT * FROM customer_reg WHERE Gender = ? ORDER BY RAND() LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $oppositeGender);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

$oppositeProfile = getRandomProfile($amit['Gender'], $conn);




//----------------------------------------

function getRandomMovie($conn) {
    $result = $conn->query("SELECT * FROM movie_details ORDER BY RAND() LIMIT 1");
    return $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['getRandomMovie'])) {
    $movie = getRandomMovie($conn);
} else {
    $movie = getRandomMovie($conn);
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Dating</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f0f0f0;
        }

        .hero {
            text-align: center;
            padding: 20px;
            background: #ff6b6b;
            color: #fff;
        }

        .btn {
            padding: 10px 20px;
            background: #fff;
            color: #ff6b6b;
            border: none;
            cursor: pointer;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background: #fff;
            padding: 20px;
            margin: 10% auto;
            width: 80%;
            max-width: 1000px;
            border-radius: 10px;
        }

        .container {
            display: flex;
            justify-content: space-between;
        }

        .left-section,
        .right-section {
            width: 30%;
        }

        .center-section {
            width: 30%;
            text-align: center;
        }

        .close {
            float: right;
            font-size: 28px;
            cursor: pointer;
        }
        /*********************** */
        .center-section {
            text-align: center;

        }

        img {
            width: 200px;
            height: 200px;
            margin-top: 20px;
        }

        #confirm_book {
            background-color: red;
            padding: 10px;
            margin-top: 30px;
            align-items: center;
        }
        button[type='submit']{
            padding: 10px;
            cursor: pointer;
        }
        #movie_details{
            width: 80%;
        }
    </style>
</head>

<body>

    <section class="hero">
        <h1>Find Your Movie Match 🎞️</h1>
        <p>Discover people who love the same movies as you!</p>
        <button class="btn" onclick="openModal()">Get Started</button>
    </section>

    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div class="container">
                <div class="left-section">
                    <img src="<?php echo htmlspecialchars($amit['image']); ?>" id="profileImage" alt="Profile Image"
                        style="height: 200px; width: 200px;">
                    <p>Name: <?php echo htmlspecialchars($amit['Customer_Name']); ?></p>
                    <p>Age: <?php echo $amit['Age'] ?? '-'; ?></p>
                    <p>Gender: <?php echo $amit['Gender'] ?? '-'; ?></p>
                    <p>Address: <?php echo $amit['Address'] ?? '-'; ?></p>
                </div>
                <!-------------------------------------------------->
                <div class="center-section">
                    <div id="movie-info">
                        <?php if ($movie): ?>
                            <img id="movie-image" src="<?php echo htmlspecialchars($movie['m_image']); ?>"
                                alt="Movie Image">
                            <h2 id="movie-name"><?php echo htmlspecialchars($movie['Name']); ?></h2>
                            <h4>Description</h4>
                            <p id="movie_details"><?php echo htmlspecialchars($movie['movie_details']); ?></p>
                        <?php elseif (isset($error)): ?>
                            <p style="color: red;"><?php echo $error; ?></p>
                        <?php endif; ?>
                        <form method="post">
                            <button type="submit" name="getRandomMovie">Get Random Movie</button>
                        </form>
                    </div>
                    <button id="confirm_book"> Confirm Booking</button>

                </div>


                <!------------------------------------------------------------------->
                <div class="right-section">
                    <?php if ($oppositeProfile): ?>
                    <img src="<?php echo htmlspecialchars($oppositeProfile['image']); ?>" id="profileImage"
                        alt="Profile Image" style="height: 200px; width: 200px;">
                    <p>Name:
                        <?php echo htmlspecialchars($oppositeProfile['Customer_Name']); ?>
                    </p>
                    <p>Age:
                        <?php echo $oppositeProfile['Age'] ?? '-'; ?>
                    </p>
                    <p>Gender:
                        <?php echo $oppositeProfile['Gender'] ?? '-'; ?>
                    </p>
                    <p>Address: <?php echo $amit['Address'] ?? '-'; ?></p>

                    <form method="post">
                        <button type="submit" name="showAnother">Another</button>
                    </form>
                    <?php else: ?>
                    <p>No profiles found.</p>
                    <?php endif; ?>
                </div>
                <!---------------------------------->
            </div>
        </div>
    </div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['showAnother'])) {
        $oppositeProfile = getRandomProfile($amit['Gender'], $conn);
    }

    ?>
    <script>
        function openModal() {
            document.getElementById('modal').style.display = 'block';
        }
        function closeModal() {
            document.getElementById('modal').style.display = 'none';
        }
    </script>

</body>

</html>