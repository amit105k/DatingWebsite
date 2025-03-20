<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: VenderLogin.php");
    exit();
}
$user = $_SESSION['user'];
$email = $user['email'];
include("db.php");
if ($conn->connect_error) {
    die("connection error" . $conn->connect_error);
}
$sql = "SELECT * FROM customer_reg where email=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $userDetails = $result->fetch_assoc();
} else {
    echo "Some thing went wrong";
}




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



// update data are here 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];

    $sql = "UPDATE customer_reg SET Customer_Name = ?, email = ?, mobile = ?, Address = ? WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiss", $name, $email, $mobile, $address, $email);
    // if ($stmt->execute()) {
    //     echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11.4.26/dist/sweetalert2.min.js'></script>
    //         Swal.fire({
    //             title: 'Update Success',
    //             text: 'Your details have been updated! Kindely re-login',
    //             icon: 'success',
    //             confirmButtonText: 'OK'
    //         }).then(function() {
    //             window.location.href = 'CustomeLogin.php'; 
    //         });
    //       </script>";

    // } else {
    //     echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11.4.26/dist/sweetalert2.min.js'></script>
    //     Swal.fire({
    //         title: 'Something Went Wrong!',
    //         text: 'Unable to update your details.',
    //         icon: 'error',
    //         confirmButtonText: 'Try Again'
    //     });
    //   </script>";
    // }

    if ($stmt->execute()) {
        $_SESSION['update_status'] = 'success';
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        $_SESSION['update_status'] = 'error';
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
    $stmt->close();

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.26/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.26/dist/sweetalert2.min.js"></script>

    <link rel="stylesheet" href="../css/index.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Arima:wght@100..700&family=Dancing+Script:wght@400..700&family=Roboto+Slab:wght@100..900&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>
   


    <!-- ...this is profile details..-->
    <h2 id="h2">Customer Profile Update</h2>
    <div class="profile">
        <div class="profile-left">
            <div class="logo">
                <!-- <img src="../image/amit.png" alt="image"> -->
                <img src="<?php echo $userDetails['image'] ?>" alt="image">
            </div>
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
            <form action="" method="POST">
                <label for="">Name</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($userDetails['Customer_Name']); ?>">

                <h3> </h3>
                <label for="">Email</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($userDetails['email']); ?>">

                <label for="">Mobile Number</label>
                <!-- <input type="text" name="mobile" value="<?php echo htmlspecialchars($userDetails['mobile']); ?>"> -->
                <input type="text" id="mobile" name="mobile" required placeholder="Enter your Phone" minlength="10"
                    maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '');" value="<?php echo htmlspecialchars($userDetails['mobile']); ?>">

                <label for="">Address</label>
                <input type="text" name="address" value="<?php echo htmlspecialchars($userDetails['Address']); ?>">

                <input type="submit" Value="Update Details">
            </form>
        </div>
        <?php
        if (isset($_SESSION['update_status'])) {
            if ($_SESSION['update_status'] == 'success') {
                echo "<script type='text/javascript'>
                Swal.fire({
                    title: 'Update Success',
                    text: 'Your details have been updated! Kindly re-login.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(function() {
                    window.location.href = 'CustomeLogin.php'; 
                });
              </script>";
            } elseif ($_SESSION['update_status'] == 'error') {
                echo "<script type='text/javascript'>
                Swal.fire({
                    title: 'Something Went Wrong!',
                    text: 'Unable to update your details.',
                    icon: 'error',
                    confirmButtonText: 'Try Again'
                });
              </script>";
            }
            unset($_SESSION['update_status']);
        }
        ?>


    </div>
    <?php include("footer.php");
     ?>
</body>

</html>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f9;
        color: #333;
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

    .details {
        display: flex;
        /* justify-content: space-between; */
        margin-bottom: 10px;
        width: 85%;
        justify-content: center;
        align-items: center;
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

    /**profile sow and updatae here .container
     */
    form {
        display: flex;
        flex-direction: column;
        gap: 10px;
        width: 80%;
        /* align-items: center; */
        /* justify-content: center; */
    }

    input[type="text"],
    input[type="email"] {
        padding: 10px;
        font-size: 16px;
        width: 100%;
        box-sizing: border-box;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px;
        border: none;
        cursor: pointer;
        border-radius: 4px;
        font-size: 16px;
    }

    textarea {
        padding: 0;
        width: 99%;
        height: auto;
        margin: 0;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>