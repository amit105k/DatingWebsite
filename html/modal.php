<?php

session_start();
if (!isset($_SESSION['user'])) {
    echo "<script>Swal.fire('Not Logged In', 'Please login to continue!', 'warning');</script>";
}
$data = ($_SESSION['user']);

include("db.php");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$query = "SELECT * FROM customer_reg WHERE email=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $data['email']);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $amit = $row;
    }
}




//----------------------------------------

$sql = "SELECT * FROM movie_details ORDER BY RAND() LIMIT 1";
$result = $conn->query($sql);

$movie = null;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $mov = $row;
    }
}

$conn->close();

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
                    <!-- <img src="user-placeholder.jpg" alt="User" style="height: 200px; width: 100px;"> -->
                    <img src="<?php echo htmlspecialchars($amit['image']); ?>" id="profileImage" alt="Profile Image"
                        style="height: 200px; width: 200px;">
                    <p>Name: <?php echo $amit['Customer_Name'] ?></p>
                    <p>Age: <?php echo $amit['Age'] ?? '-'; ?></p>
                    <p>Gender: <?php echo $amit['Gender'] ?? '-'; ?></p>

                </div>
                <div class="center-section">
                <h1>Random Movie</h1>
                <button onclick="getRandomMovie()">Get Random Movie</button>
                    <div id="movie-info" style="margin-top: 20px;">
                        <h2 id="movie-name"></h2>
                        <img id="movie-image" src="" alt="Movie Image" style="width: 300px; height: 400px;">
                    </div>



                    <!-- <img src="<?php echo htmlspecialchars($mov['m_image']); ?>" id="profileImage" alt="Profile Image" style="height: 200px; width: 200px;">
                <img id="movie-image" src="<?php echo htmlspecialchars($mov['m_image']); ?>" alt="Movie Image" style="width: 200px; height: 200px;">
                <h2 id="movie-name"></h2>

                <p>Movie name: <?php echo $mov['Name'] ?? '-'; ?></p>
                    <button onclick="selectRandomMovie()">Random Movie</button> 
                    <button onclick="getRandomMovie()">Get Random Movie</button> -->

                    <button onclick="showTrendingMovies()">Trending Movies</button>
                    <p id="movieName">Selected Movie: -</p>
                </div>
                <div class="right-section">
                    <img src="<?php echo htmlspecialchars($amit['image']); ?>" id="profileImage" alt="Profile Image"
                        style="height: 200px; width: 200px;">
                    <p>Name: <?php echo $amit['Customer_Name'] ?></p>
                    <p>Age: <?php echo $amit['Age'] ?? '-'; ?></p>
                    <p>Gender: <?php echo $amit['Gender'] ?? '-'; ?></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('modal').style.display = 'block';
        }
        function closeModal() {
            document.getElementById('modal').style.display = 'none';
        }
        function selectRandomMovie() {
            const movies = ['Inception', 'The Matrix', 'Interstellar', 'Fight Club', 'The Dark Knight'];
            const randomMovie = movies[Math.floor(Math.random() * movies.length)];
            document.getElementById('movieName').innerText = 'Selected Movie: ' + randomMovie;
        }
        function showTrendingMovies() {
            alert('Trending Movies: Dune, Oppenheimer, Barbie, Spider-Man: No Way Home');
        }
    </script>
    <script>
        function getRandomMovie() {
            fetch('random_movie.php')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('movie-name').textContent = data.movie_name;
                    document.getElementById('movie-image').src = data.movie_image;
                })
                .catch(err => console.error('Error fetching movie:', err));
        }
    </script>
</body>

</html>