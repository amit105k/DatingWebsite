<?php
session_start();
include("db.php");

$isSessionActive = isset($_SESSION['user']);
$movie = null;
$oppositeProfile = null;

if ($isSessionActive) {
    $loggedInUser = $_SESSION['user'];
    $email = $loggedInUser['email'];

    $query = "SELECT * FROM customer_reg WHERE email=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $amit = $result->fetch_assoc();

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

    function getRandomMovie($conn)
    {
        $result = $conn->query("SELECT * FROM movie_details ORDER BY RAND() LIMIT 1");
        return $result->fetch_assoc();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $action = $_POST['action'] ?? '';

        if ($action === 'getRandomMovie') {
            $movie = getRandomMovie($conn);
            echo json_encode($movie);
            exit();
        }

        if ($action === 'getAnotherProfile') {
            $oppositeProfile = getRandomProfile($amit['Gender'], $conn);
            echo json_encode($oppositeProfile);
            exit();
        }
    }

    if (!$movie) {
        $movie = getRandomMovie($conn);
    }

    if (!$oppositeProfile) {
        $oppositeProfile = getRandomProfile($amit['Gender'], $conn);
    }
}


// login are here 


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userEmail = $_POST['user'];
    $userPassword = $_POST['password'];

    $queryy = "SELECT id, Customer_Name, Age, Gender, email, mobile, Password, Address FROM customer_reg WHERE email = ? AND Password = ?";
    $stmt = $conn->prepare($queryy);
    $stmt->bind_param("ss", $userEmail, $userPassword);  
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['user'] = $row;
        $response = "success";

    } else {
        
        $response = "error";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie & Profile Matching</title>
    <link rel="stylesheet" href="../css/newModal.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .sessionNotPresent {
            /* background-color: red; */
            background: url("https://i.etsystatic.com/48793331/r/il/3bc4e0/5842264399/il_fullxfull.5842264399_g41r.jpg");
            background-size:cover;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        input[type='password'] {
            margin-bottom: 0;
        }

        #forget a {
            color: orange !important;
            cursor: pointer;
            text-align: right;
            display: inline-block;
            width: 95%;
            padding: 10px;
            text-decoration: none;

        }

        form {
            max-width: 400px;
            /* margin: 8% auto; */
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            text-align: center;
            margin-left: 27%;
            margin-bottom: 20px;
        }

        form h2 {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .ftext {
            text-align: center;
            background-color: black;
            color: white;
            padding: 10px;
            box-shadow: 0 0 0px 0px rgba(208, 141, 58, 0.57);
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background-color: #45a049;
            font-size: 16px;

        }

        #venderreg {
            width: 95%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: inline-block;
            font-size: 16px;
            text-align: center;
            /* margin-top: 10px; */
            text-decoration: none;
        }

        #venderreg:hover {
            background-color: #45a049;
        }
    </style>
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

    <section class="hero">
        <h1>Find Your Movie Match 🎞️</h1>
        <p>Discover people who love the same movies as you!</p>
        <button class="btn" onclick="openModal()">Get Started</button>
    </section>

    <!-- Modal Code -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>

            <div class="container">
                <?php if ($isSessionActive): ?>
                    <div class="left-section">
                        <img src="<?php echo htmlspecialchars($amit['image']); ?>" alt="Profile Image"
                            style="height: 200px; width: 200px;">
                        <p>Name: <?php echo htmlspecialchars($amit['Customer_Name']); ?></p>
                        <p>Age: <?php echo $amit['Age'] ?? '-'; ?></p>
                        <p>Gender: <?php echo $amit['Gender'] ?? '-'; ?></p>
                        <p>Address: <?php echo $amit['Address'] ?? '-'; ?></p>
                    </div>

                    <div class="center-section">
                        <div id="movie-info">
                            <img src="<?php echo htmlspecialchars($movie['m_image']); ?>" alt="Movie Image">
                            <h2><?php echo htmlspecialchars($movie['Name']); ?></h2>
                            <h4>Description</h4>
                            <p><?php echo htmlspecialchars($movie['movie_details']); ?></p>
                            <button
                                onclick="fetchContent('getRandomMovie', document.querySelector('#movie-info'), updateMovie)">
                                Get Random Movie
                            </button>
                            <button id="confirm_book">Confirm Booking</button>
                        </div>
                    </div>

                    <div class="right-section">
                        <img src="<?php echo htmlspecialchars($oppositeProfile['image']); ?>" alt="Profile Image"
                            style="height: 200px; width: 200px;">
                        <p>Name: <?php echo htmlspecialchars($oppositeProfile['Customer_Name']); ?></p>
                        <p>Age: <?php echo $oppositeProfile['Age'] ?? '-'; ?></p>
                        <p>Gender: <?php echo $oppositeProfile['Gender'] ?? '-'; ?></p>
                        <p>Address: <?php echo $oppositeProfile['Address'] ?? '-'; ?></p>
                        <button
                            onclick="fetchContent('getAnotherProfile', document.querySelector('.right-section'), updateProfile)">
                            Another
                        </button>
                    <?php else: ?>
                    </div>
                    <div class="sessionNotPresent">
                        <h2>You are not logged in!</h2>
                        <h3>Please log in to continue.</h3><br>
                        <form id="venderLogin" method="POST" action="" onsubmit="return loginUser(event)">
                            <label for="user">Enter Your Email</label>
                            <input type="text" name="user" id="user" required>

                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" required>
                            <span id="forget"><a href="CustomerPassForget.php">ForgetPassword</a></span>
                            <input type="submit" value="Login">
                            <a id="venderreg" href="CustReg.php">Register</a>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>


    <!-------------ajax for login------------------------->


<script>    
    document.addEventListener("DOMContentLoaded", function () {
        let response = "<?php echo $response; ?>";

        if (response === "success") {
            Swal.fire({
                title: 'Success!',
                text: 'Login Success',
                icon: 'success',
                confirmButtonText: 'OK'
            })
        } else if (response === "error") {
            Swal.fire({
                title: 'Error!',
                text: 'User id and password are not match.',
                icon: 'error'
            });
        }
    });
</script>
</body>

</html>