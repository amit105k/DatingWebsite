<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: CustLogin.php");
    exit();
}
$user = $_SESSION['user'];
$email = $user['email'];


include("db.php");

$query = "SELECT image FROM customer_reg WHERE email=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$logo = "default.png";

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $logo = $row['image'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['profileImage'])) {
    $targetDir = "logo/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    if ($logo !== "default.png" && file_exists($logo)) {
        unlink($logo);
    }

    $fileName = time() . "_" . basename($_FILES["profileImage"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
    if (in_array($fileType, $allowedTypes)) {
        if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $targetFilePath)) {


            $updateQuery = "UPDATE customer_reg SET image=? WHERE email=?";
            $updateStmt = $conn->prepare($updateQuery);
            $updateStmt->bind_param("ss", $targetFilePath, $email);
            if ($updateStmt->execute()) {
                $_SESSION['user']['image'] = $targetFilePath;
                $_SESSION['success'] = "Profile image uploaded successfully.";

                header("Location: customerProfile.php");
                exit();
            } else {
                $_SESSION['error'] = "Failed to update database.";
            }
        } else {
            $_SESSION['error'] = "File upload failed.";
        }
    } else {
        $_SESSION['error'] = "Invalid file format. Only JPG, PNG, or GIF allowed.";
    }
}

// update status into table

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['status_action'])) {
    $bookingId = $_POST['booking_id'];
    $status = $_POST['status_action'];

    $updateStatusQuery = "UPDATE bookings SET Status=? WHERE id=?";
    $stmt = $conn->prepare($updateStatusQuery);
    $stmt->bind_param("si", $status, $bookingId);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Status updated successfully.";
    } else {
        $_SESSION['error'] = "Failed to update status.";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile</title>
    <link rel="stylesheet" href="../css/index.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Arima:wght@100..700&family=Dancing+Script:wght@400..700&family=Roboto+Slab:wght@100..900&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body>



    <!-- ...this is profile details..-->
    <h1 id="else">Request Recieved</h1>
    <div class="profile">
        <div class="profile-left">
            <div class="logo" onclick="document.getElementById('fileInput').click();">
                <img src="<?php echo htmlspecialchars($logo); ?>" id="profileImage" alt="Profile Image">
                <span class="edit-icon" onclick="document.getElementById('fileInput').click();">&#9998;</span>
            </div>
            <form id="uploadForm" method="POST" enctype="multipart/form-data">
                <input type="file" name="profileImage" id="fileInput" accept="image/*" onchange="uploadImage()">
            </form>


            <ul>
                <li><a href="CustomerProfile.php">Dashboard</a></li>
                <li><a href="dating.php">Dating</a></li>
                <li><a href="showMatching.php">Show Request</a></li>
                <li><a href="sendRequest.php">Send Request</a></li>
                <li><a href="CustomerProfileUpdate.php">Update Profile</a></li>
                <li><a href="CustomerPasswordUpdate.php">Change Password</a></li>
                <li><a href="logoutCustomer.php">Logout</a></li>

            </ul>

        </div>
        <div class="details">
            <?php
            include("db.php");

            echo '<table border="1" cellspacing="0" cellpadding="10">';
            echo '<tr>
                    <th>Sr</th>
                    <th>Movie ID</th>
                    <th>Movie Title</th>
                    <th>Movie Description</th>
                    <th>Profile ID</th>
                    <th>Profile Name</th>
                    <th>Profile Email</th>
                    <th>Status</th>
                </tr>';

            $sql = "SELECT * FROM bookings WHERE opposite_email=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $resultt = $stmt->get_result();
            $found = false; 

            if ($resultt->num_rows > 0) {
                while ($row = $resultt->fetch_assoc()) {
                    if ($row['Status'] == 'pending') {
                        $found = true;
                        $uid = $row['user_Details']; // left side id
                        $oppo = $row['opposite'];  // oposiye ka id
                        $mov = $row['movie_id'];
                        $sr = $row['id']; // auto increnet sr number
            
                        $movee = "SELECT * FROM movie_details WHERE id=?";
                        $stmt = $conn->prepare($movee);
                        $stmt->bind_param("i", $mov);
                        $stmt->execute();
                        $resu = $stmt->get_result();
                        $movie_data = $resu->fetch_assoc();

                        $opp = "SELECT * FROM customer_reg WHERE id=?";
                        $stmt->prepare($opp);
                        $stmt->bind_param("i", $uid);
                        $stmt->execute();
                        $oresult = $stmt->get_result();
                        $opposite_data = $oresult->fetch_assoc();

                        echo "<tr>";
                        echo "<td>$sr</td>";
                        echo "<td>$mov</td>";
                        echo "<td>" . ($movie_data ? $movie_data['Name'] : 'N/A') . "</td>";
                        echo "<td>" . ($movie_data ? $movie_data['movie_details'] : 'N/A') . "</td>";

                        echo "<td>$uid</td>";
                        echo "<td>" . ($opposite_data ? $opposite_data['Customer_Name'] : 'N/A') . "</td>";
                        echo "<td>" . ($opposite_data ? $opposite_data['email'] : 'N/A') . "</td>";
                        echo "<td>
                    <button class='accept-btn' data-booking-id='$sr'>Accept</button>
                    <button class='reject-btn' data-booking-id='$sr'>Reject</button>
                  </td>";

                        echo "</tr>";
                        echo "</tr>";
                        echo "</tr>";

                    }}
                    if (!$found) {
                        echo "<tr><td colspan='8'>No accepted bookings found for this user</td></tr>";
                    }
                
            } else {
                echo "<tr><td colspan='8'>No Request found for You</td></tr>";
            }

            echo '</table>';
            ?>

        </div>


    </div>
    <!--.........................footer is here-->

    <?php
    include("footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Handle Accept button click with SweetAlert
        document.querySelectorAll('.accept-btn').forEach(button => {
            button.addEventListener('click', function () {
                const bookingId = this.getAttribute('data-booking-id');

                Swal.fire({
                    title: 'Confirm your dating',
                    showCancelButton: true,
                    confirmButtonText: 'OK',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        updateStatus(bookingId, 'Accepted');
                    }
                });
            });
        });

        function updateStatus(bookingId, status) {
            const formData = new FormData();
            formData.append('status_action', status);
            formData.append('booking_id', bookingId);

            fetch('', {
                method: 'POST',
                body: formData
            })
                .then(response => response.text())
                .then(data => {
                    window.location.reload();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>


    <style>
        /************************************************88sweet aert for updare */
        .accept-btn {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .accept-btn:hover {
            background-color: #45a049;
        }

        .reject-btn {
            background-color: #f44336;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .reject-btn:hover {
            background-color: #e53935;
        }








        /*************************************************************** */
        /* Accept Button */
        .accept-btn {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .accept-btn:hover {
            background-color: #45a049;
        }


        .reject-btn {
            background-color: #f44336;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .reject-btn:hover {
            background-color: #e53935;
        }


        button {
            margin-right: 8px;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        #else {
            text-align: center;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        #h2 {
            text-align: center;
            color: #444;
            font-size: 24px;
            /* padding: 20px; */
        }

        textarea {
            color: black !important;
        }

        table {
            margin-left: 1%;
            width: 98%;
            margin-right: 1%;
            text-align: center;
        }

        .details {
            /* display: flex; */
            justify-content: space-between;
            margin-bottom: 10px;
            width: 85%;
            justify-content: center;
            align-items: center;
        }

        .first,
        .second {
            width: 50%;
            text-align: center;
        }

        .first p,
        .second p {
            margin: 19px 0;
            font-size: 18px;
        }

        .address {
            margin-top: 20px;
            padding-top: 10px;
        }

        .details strong {
            color: #555;
        }

        .logout-container {
            text-align: center;
            margin-top: 30px;
        }



        .ftext {
            text-align: center;
            background-color: black;
            color: white;
            padding: 10px;
            font-size: 15px;
            box-shadow: 0 0 0px 0px rgba(208, 141, 58, 0.57);
        }

        /** profile deatails are here */
        .profile-left {
            background-color: black;
            /* padding: 10px; */
            width: 15%;
        }

        .profile-left ul {
            margin-top: 10px;
        }

        .profile-left ul li {
            /* list-style-type: none;
        align-items: center;
        justify-content: center; */
            display: flex;
            margin-top: 5px;
        }


        .profile-left ul li a {
            text-decoration: none;
            height: 100%;
            height: 100%;
            color: white;
            line-height: 40px;
            margin-left: 20%;
        }

        .profile-left ul li a:hover {
            color: orange;
        }

        .profile {
            /* background-color: yellow; */
            display: flex;
        }

        .logo {
            height: 13%;
            position: absolute;
            margin-top: -70px;
            /* margin-left: 10px; */
            background-color: black;
            width: 15%;
        }

        .logo img {
            width: 36%;
            border-radius: 100%;
            /* width: 100%; */
            height: 90%;
            margin-left: 28%;
        }

        .edit-icon {
            position: absolute;
            display: none;
            font-size: 16px;
            top: 0px;
            cursor: pointer;
            border-radius: 100%;
            width: 100%;
            height: 94%;
            text-align: center;
            margin-left: 40%;
            top: 10px;
            font-size: 22px;
            background: #968b8b;
            width: 38%;
        }


        .logo:hover .edit-icon {
            display: block;
            right: 36%;
            top: 0px;
        }

        #fileInput {
            display: none;
        }
    </style>


</body>

</html>