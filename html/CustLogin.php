<?php
include("db.php");
session_start();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userEmail = $_POST['user'];
    $userPassword = $_POST['password'];

    $query = "SELECT id,Customer_Name,Age, Gender,email,mobile,Password,Address FROM customer_reg WHERE email = ? AND Password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $userEmail, $userPassword);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $_SESSION['user'] = $row;
        header("Location: CustomerProfile.php");
        exit();
    } else {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid Login',
                        text: 'Invalid login details, please try again.',
                        confirmButtonText: 'Retry'
                    }).then(() => {
                        window.location.href = 'CustLogin.php';
                    });
                });
              </script>";
    }

    $stmt->close();
}

$conn->close();
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>
    <!-- <link rel="stylesheet" href="../css/index.css"> -->
    <link
        href="https://fonts.googleapis.com/css2?family=Arima:wght@100..700&family=Dancing+Script:wght@400..700&family=Roboto+Slab:wght@100..900&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.8/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>
<div class="navbar">
        <a href="index.php">Home</a>
        <a href="tour.php">Tour</a>
        <a href="datingAdvance.php">Dating Advice</a>
        <a href="#">Singles Near Me</a>
        <div class="dropdown">
            <a href="">Register / Login</a>
            <div class="dropdown-content">
                <div class="sub-dropdown">
                        <a href="./CustReg.php">Register</a>
                   
                </div>
                <div class="sub-dropdown">
                        <a href="./CustLogin.php">Login</a>
                    
                </div>
            </div>
        </div>
    </div>
       <?php
       include("header.php");
       ?>
        <!--..................drop down is here-->

   
    <form id="venderLogin" method="POST" action="">
        <h2>Customer Login</h2>
        <label for="user">Enter Your Email</label>
        <input type="text" name="user" id="user" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        <span id="forget"><a href="CustomerPassForget.php">ForgetPassword</a></span>


        <input type="submit" value="Login">
        <a id="venderreg" href="CustomerReg.php">Register</a>

    </form>


      <!---,.............footer is eher-->
     <?php 
     include("footer.php");
     ?>

   
</body>

</html>
<style>
    body{
        background-color: #f4f3f3 !important;
        color: black;

    }
     input[type='password']{
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
        margin: 8% auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
        text-align: center;
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
    .dropdown button {
    background-color: black;
    color: white;
    /* background-color:  pink; */
}

.dropdown button:hover {
    color: orange;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    z-index: 1;
    min-width: 200px;
}
.sub-dropdown{
    background-color: black !important;
}
.sub-dropdown:hover{
    background-color: #f1f1f1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown-content .sub-dropdown {
    position: relative;
}

.dropdown-content .sub-dropdown-content {
    display: none;
    position: absolute;
    left: -97%;
    top: 0;
    background-color: #f9f9f9;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    min-width: 200px;
}
:root{
    --aman:black;
}

.dropdown-content .sub-dropdown:hover .sub-dropdown-content {
    display: block;
    background: red !important;
    /* background: var(--aman); */
    /* background-color:var(--main-color); */
}

.sub-dropdown a {
    text-transform: none;
}
.navbar {
    /* position: absolute; */
    top: 0;
    background-color: black;
    /* width: 100%; */
    display: flex;
    /* justify-content: flex-end; */
    padding: 20px 50px;
    /* background: rgba(0, 0, 0, 0.5); */
    color: #fff;
    font-size: 18px;
    z-index: 2;
}

.navbar a {
    margin-left: 30px;
    color: #fff;
    text-decoration: none;
    transition: color 0.3s;
    font-weight: bolder;
    font-size: 22px;
}

.navbar a:hover {
    color: #ffa500;
}


</style>