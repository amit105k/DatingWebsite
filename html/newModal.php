<?php
session_start();
include("db.php");

if (!isset($_SESSION['user'])) {
    echo "<script>Swal.fire('Not Logged In', 'Please login to continue!', 'warning');</script>";
    exit();
}

$loggedInUser = $_SESSION['user'];
$email = $loggedInUser['email'];

$query = "SELECT * FROM customer_reg WHERE email=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$amit = $result->fetch_assoc();

function getRandomProfile($gender, $conn) {
    $oppositeGender = ($gender === 'Male') ? 'Female' : 'Male';
    $query = "SELECT * FROM customer_reg WHERE Gender = ? ORDER BY RAND() LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $oppositeGender);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function getRandomMovie($conn) {
    $result = $conn->query("SELECT * FROM movie_details ORDER BY RAND() LIMIT 1");
    return $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'getRandomMovie') {
            echo json_encode(getRandomMovie($conn));
        } elseif ($_POST['action'] === 'getAnotherProfile') {
            echo json_encode(getRandomProfile($amit['Gender'], $conn));
        }
        exit();
    }
}

$movie = getRandomMovie($conn);
$oppositeProfile = getRandomProfile($amit['Gender'], $conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie & Profile Matching</title>
    <link rel="stylesheet" href="../css/newModal.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function openModal() {
            document.getElementById('modal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('modal').style.display = 'none';
        }

        function fetchContent(action, container, callback) {
            fetch("", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "action=" + action
            })
            .then(response => response.json())
            .then(data => callback(data, container))
            .catch(error => console.error("Error:", error));
        }

        function updateMovie(movie, container) {
            container.innerHTML = `
                <img src="${movie.m_image}" alt="Movie Image">
                <h2>${movie.Name}</h2>
                <h4>Description</h4>
                <p>${movie.movie_details}</p>
                <button onclick="fetchContent('getRandomMovie', document.querySelector('#movie-info'), updateMovie)">
                    Get Random Movie
                </button>
                <button id="confirm_book">Confirm Booking</button>
            `;
        }

        function updateProfile(profile, container) {
            container.innerHTML = `
                <img src="${profile.image}" alt="Profile Image" style="height: 200px; width: 200px;">
                <p>Name: ${profile.Customer_Name}</p>
                <p>Age: ${profile.Age ?? '-'}</p>
                <p>Gender: ${profile.Gender ?? '-'}</p>
                <p>Address: ${profile.Address ?? '-'}</p>
                <button onclick="fetchContent('getAnotherProfile', document.querySelector('.right-section'), updateProfile)">
                    Another
                </button>
            `;
        }
    </script>
</head>
<body>

<!-- Hero Section -->
<section class="hero">
    <h1>Find Your Movie Match 🎞️</h1>
    <p>Discover people who love the same movies as you!</p>
    <button class="btn" onclick="openModal()">Get Started</button>
</section>

<!-- Modal -->
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div class="container">

            <!-- Left Section - Logged-in User -->
            <div class="left-section">
                <img src="<?php echo htmlspecialchars($amit['image']); ?>" alt="Profile Image" style="height: 200px; width: 200px;">
                <p>Name: <?php echo htmlspecialchars($amit['Customer_Name']); ?></p>
                <p>Age: <?php echo $amit['Age'] ?? '-'; ?></p>
                <p>Gender: <?php echo $amit['Gender'] ?? '-'; ?></p>
                <p>Address: <?php echo $amit['Address'] ?? '-'; ?></p>
            </div>

            <!-- Center Section - Movie Info -->
            <div class="center-section">
                <div id="movie-info">
                    <img src="<?php echo htmlspecialchars($movie['m_image']); ?>" alt="Movie Image">
                    <h2><?php echo htmlspecialchars($movie['Name']); ?></h2>
                    <h4>Description</h4>
                    <p><?php echo htmlspecialchars($movie['movie_details']); ?></p>
                    <button onclick="fetchContent('getRandomMovie', document.querySelector('#movie-info'), updateMovie)">
                        Get Random Movie
                    </button>
                    <button id="confirm_book">Confirm Booking</button>
                </div>
            </div>

            <!-- Right Section - Opposite Profile -->
            <div class="right-section">
                <?php if ($oppositeProfile): ?>
                    <img src="<?php echo htmlspecialchars($oppositeProfile['image']); ?>" alt="Profile Image" style="height: 200px; width: 200px;">
                    <p>Name: <?php echo htmlspecialchars($oppositeProfile['Customer_Name']); ?></p>
                    <p>Age: <?php echo $oppositeProfile['Age'] ?? '-'; ?></p>
                    <p>Gender: <?php echo $oppositeProfile['Gender'] ?? '-'; ?></p>
                    <p>Address: <?php echo $oppositeProfile['Address'] ?? '-'; ?></p>
                    <button onclick="fetchContent('getAnotherProfile', document.querySelector('.right-section'), updateProfile)">
                        Another
                    </button>
                <?php else: ?>
                    <p>No profiles found.</p>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>

</body>
</html>
