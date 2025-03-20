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
    die("Connection error: " . $conn->connect_error);
}

$old = "SELECT * FROM customer_reg WHERE email=?";
$stmt = $conn->prepare($old);
$stmt->bind_param("s", $user['email']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $password = $row['Password'];
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];

    if ($password !== $oldpass) {
        $response = "errorr";
    } else {
        $sql = "UPDATE customerreg SET Password=? WHERE email=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $newpass, $user['email']);

        if ($stmt->execute()) {
            $response = "success";
        } else {
            $response = "error";
        }
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link
        href="https://fonts.googleapis.com/css2?family=Arima:wght@100..700&family=Dancing+Script:wght@400..700&family=Roboto+Slab:wght@100..900&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">


</head>

<body>

    <!-- ...this is profile details..-->
    <h2 id="h2">Customer Password Update</h2>
    <div class="profile">
        <div class="profile-left">
            <div class="logo">
            <img src="<?php echo $row['image'] ?>" alt="image">
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
            <form action="" method="POST" id="passupdate">

                <label for="">Enter your Old Password</label>
                <input type="password" required name="oldpass">

                <label for="">Enter your New Password</label>
                <input type="password" required name="newpass" id="password">

                <label for="">Enter Confirm Password</label>
                <input type="password" required id="confirmPassword">
            
                <p id="passwordError" style="display: none; color: red;"></p>
              

                <button type="submit">Update</button>
            </form>
        </div>


    </div>
    <?php 
   include("footer.php");
   ?>

</body>

</html>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f3f3 !important;
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
        margin-left: 15%;
    }

    .details {
        display: flex;
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
        
  position: absolute;
  margin-top: -70px;
  /* margin-left: 10px; */
  background-color: black;
  width: 15%;
  padding-top: 10px;
  height: 10%;
    }

    .logo img {
        width: 36%;
        border-radius: 100%;
        /* width: 100%; */
        height: 90%;
        margin-left: 28%;
    }


    form {
        max-width: 400px;
        margin: auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    label {
        /* display: block; */
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

    button {
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }

    .error {
        color: red;
        font-size: 0.9em;
        margin-bottom: 15px;
    }

    #vender {
        text-align: center;
        padding: 10px;
    }

    #vendorForm {
        margin-top: 30px;
    }

    .ftext {
        text-align: center;
        background-color: black;
        color: white;
        padding: 10px;
        box-shadow: 0 0 0px 0px rgba(208, 141, 58, 0.57);
    }
</style>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('passupdate').addEventListener('submit', function (e) {
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('confirmPassword').value;
        var passwordError = document.getElementById('passwordError');

        if (password !== confirmPassword) {
            e.preventDefault();
            passwordError.style.display = 'block';
            passwordError.textContent = 'New Password And Confirm Password not Matched try again.';
        } else {
            passwordError.style.display = 'none';
        }
    });



    document.addEventListener("DOMContentLoaded", function () {
        let response = "<?php echo $response; ?>";

        if (response === "success") {
            Swal.fire({
                title: 'Success!',
                text: 'Password Change successfully!',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = "CustomerProfile.php";
            });
        } else if (response === "error") {
            Swal.fire({
                title: 'Error!',
                text: 'Password Change not updated. Please try again.',
                icon: 'error'
            });
        } else if (response === "errorr") { 
            Swal.fire({
                title: 'Error!',
                text: 'Old Password and Enter Password are not Match.',
                icon: 'error'
            });
        }
    });
</script>

