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
        <p>id.${movie.id}</p>
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
        <p>Id: ${profile.id ?? '-'}</p>
        <button onclick="fetchContent('getAnotherProfile', document.querySelector('.right-section'), updateProfile)">
            Another
        </button>
    `;



        }



    // function storeBookingDetailsAndRedirect() {
    // // Create an object with the necessary data
    // const bookingDetails = {
    //     movie: {
    //         name: "<?php echo htmlspecialchars($movie['Name']); ?>",
    //         image: "<?php echo htmlspecialchars($movie['m_image']); ?>",
    //         description: "<?php echo htmlspecialchars($movie['movie_details']); ?>",
    //         id: "<?php echo $movie['id'] ?? '-'; ?>"
    //     },
    //     userProfile: {
    //         name: "<?php echo htmlspecialchars($amit['Customer_Name']); ?>",
    //         age: "<?php echo $amit['Age'] ?? '-'; ?>",
    //         gender: "<?php echo $amit['Gender'] ?? '-'; ?>",
    //         address: "<?php echo $amit['Address'] ?? '-'; ?>",
    //         uid: "<?php echo $amit['id'] ?? '-'; ?>",
    //         image: "<?php echo htmlspecialchars($amit['image']); ?>"
    //     },
    //     oppositeProfile: {
    //         name: "<?php echo htmlspecialchars($oppositeProfile['Customer_Name']); ?>",
    //         age: "<?php echo $oppositeProfile['Age'] ?? '-'; ?>",
    //         gender: "<?php echo $oppositeProfile['Gender'] ?? '-'; ?>",
    //         address: "<?php echo $oppositeProfile['Address'] ?? '-'; ?>",
    //         oid: "<?php echo $oppositeProfile['id'] ?? '-'; ?>",
    //         image: "<?php echo htmlspecialchars($oppositeProfile['image']); ?>"
    //     }
    // };

    // // Store the booking details object in sessionStorage
    // sessionStorage.setItem('bookingDetails', JSON.stringify(bookingDetails));

    // // Redirect to ReviewBooking.php
    // window.location.href = 'ReviewBooking.php';
// }

    </script>
</head>

<body>
    <!--------------------------nav bar---------------------------->

    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="datingAdvance.php">Dating Advice</a>
        <a href="SinglesNearMe.php">Singles Near Me</a>
        <!-- <a href="CustLogin.php">Log in</a> -->
        <div class="dropdown">
            <?php if ($isSessionActive == true): ?>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="#">Register / Login</a>
                <div class="dropdown-content">
                    <div class="sub-dropdown">
                        <a href="./CustReg.php">Register</a>
                    </div>
                    <div class="sub-dropdown">
                        <a href="./CustLogin.php">Login</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!------------------------------------------------------------------>
    <section class="hero">
        <h1>Find Your Movie Match 🎞️</h1>
        <p>Discover people who love the same movies as you!</p>
        <button class="btn" onclick="openModal()">Get Started</button>
    </section>




    <!--------------------------next image is here------------------------------------>

    <div class="n-second">
        <img src="../images/newmodalimg2.jpg" alt="">
    </div>
    <!-- Modal Code -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">X</span>

            <div class="container">
                <?php if ($isSessionActive): ?>
                    <div class="left-section">
                        <img src="<?php echo htmlspecialchars($amit['image']); ?>" alt="Profile Image"
                            style="height: 200px; width: 200px;">
                        <p>Name: <?php echo htmlspecialchars($amit['Customer_Name']); ?></p>
                        <p>Age: <?php echo $amit['Age'] ?? '-'; ?></p>
                        <p>Gender: <?php echo $amit['Gender'] ?? '-'; ?></p>
                        <p>Address: <?php echo $amit['Address'] ?? '-'; ?></p>
                        <p>Uid: <?php echo $amit['id'] ?? '-'; ?></p>
                    </div>

                    <div class="center-section">
                        <div id="movie-info">
                            <img src="<?php echo htmlspecialchars($movie['m_image']); ?>" alt="Movie Image">
                            <h3><?php echo htmlspecialchars($movie['Name']); ?></h3>
                            <h4>Description</h4>
                            <p><?php echo htmlspecialchars($movie['movie_details']); ?></p>
                            <p>Mid: <?php echo $amit['id'] ?? '-'; ?></p>

                            <button
                                onclick="fetchContent('getRandomMovie', document.querySelector('#movie-info'), updateMovie)">
                                Get Random Movie
                            </button>
                            <button id="confirm_book" onclick="confirmBooking()">Confirm Booking</button>
                            <!-- <button id="confirm_book" onclick="storeBookingDetailsAndRedirect()">Confirm Booking</button> -->

                        </div>
                    </div>

                    <div class="right-section">
                        <img src="<?php echo htmlspecialchars($oppositeProfile['image']); ?>" alt="Profile Image"
                            style="height: 200px; width: 200px;">
                        <p>Name: <?php echo htmlspecialchars($oppositeProfile['Customer_Name']); ?></p>
                        <p>Age: <?php echo $oppositeProfile['Age'] ?? '-'; ?></p>
                        <p>Gender: <?php echo $oppositeProfile['Gender'] ?? '-'; ?></p>
                        <p>Address: <?php echo $oppositeProfile['Address'] ?? '-'; ?></p>
                        <p>oid: <?php echo $amit['id'] ?? '-'; ?></p>

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




    <script>
        <!-------------ajax for login------------------------->
        document.addEventListener("DOMContentLoaded", function () {
            let response = "<?php echo $response; ?>";

            if (!sessionStorage.getItem('reloaded') && response === "success") {
                Swal.fire({
                    title: 'Success!',
                    text: 'Login Success',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    sessionStorage.setItem('reloaded', 'true');
                    location.reload();
                });
            } else if (response === "error") {
                Swal.fire({
                    title: 'Error!',
                    text: 'User id and password are not match.',
                    icon: 'error'
                });
            }

            if (sessionStorage.getItem('reloaded') === 'true') {
                openModal();
                sessionStorage.removeItem('reloaded');
            } else {
                openModal();
            }
        });
    </script>


<script>
    function confirmBooking() {

    const userId = <?php echo json_encode($amit['id'] ?? ''); ?>;
    const userEmail = <?php echo json_encode($amit['email'] ?? ''); ?>;
    const oppositeUserId = <?php echo json_encode($oppositeProfile['id'] ?? ''); ?>;
    const movieId = <?php echo json_encode($movie['id'] ?? ''); ?>; 
    const data = {
        user_id: userId,
        user_email: userEmail,
        opposite_user_id: oppositeUserId,
        movie_id: movieId
    };

    fetch('save_booking.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                    title: 'Success!',
                    text: 'Your request has been submitted Wait for Confirmation ',
                    icon: 'success',
                    confirmButtonText: 'OK'
                })
        } else {
            Swal.fire({
                    title: 'Error',
                    text: 'Something went wrong',
                    icon: 'success',
                    confirmButtonText: 'OK'
                })
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
                    title: 'Error',
                    text: 'database connection has been disabled',
                    icon: 'success',
                    confirmButtonText: 'OK'
                })
    });
}

</script>
</body>
</html>