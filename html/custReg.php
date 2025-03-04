<?php
include("db.php");

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customerName = $_POST['customerName'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $Age = $_POST['Age'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO customer_reg (Customer_Name, Gender,Age, email, mobile, Password, Address) VALUES (?, ?, ?, ?, ?, ?,?)");
    $stmt->bind_param("sssssss", $customerName, $gender, $Age, $email, $mobile, $password, $address);


    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Kindely Login']);
    } else if ($stmt->errno == 1062) {
        echo json_encode(['success' => false, 'message' => 'Email has been already present With us']);

    } else {
        echo json_encode(['success' => false, 'message' => $stmt->error]);
    }

    $stmt->close();
    $conn->close();
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="../css/header.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<style>
    body {
        /* font-family: Arial, sans-serif; */
        /* margin: 20px; */
        background-color: #f4f4f4;

    }

    form {
        max-width: 400px;
        margin: auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f4f3f3 !important;
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

    #venderreg {
        width: 95%;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        display: inline-block;
        text-align: center;
        margin-top: 10px;
        text-decoration: none;
    }

    #venderreg:hover {
        background-color: #45a049;
    }

    .dropdown {
        position: relative;
        display: inline-block;
        text-transform: lowercase;
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

    .sub-dropdown {
        background-color: black !important;
    }

    .sub-dropdown:hover {
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

    :root {
        --aman: black;
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
</head>


<body>


    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="tour.php">Tour</a>
        <a href="datingAdvance.php">Dating Advice</a>
        <a href="#">Singles Near Me</a>
        <div class="dropdown">
            <a href="">REGISTER / LOGIN</a>
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

    <!--..................drop down is here-->



    <form id="vendorForm" method="POST" action="">
        <h2 id="vender">Customer Registration</h2>

        <label for="customerName">Customer Name</label>
        <input type="text" id="customerName" name="customerName" required>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="" selected>Select</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br><br>

        <label for="email">Age</label>
        <input type="text" id="contactNo" name="Age" required minlength="1" maxlength="2"
            oninput="this.value = this.value.replace(/[^0-9]/g, '');" title="Please enter a valid Mobile Number">


        <label for="email">Email ID</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <label for="confirmPassword">Confirm Password</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required>

        <label for="contactNo">Contact No</label>
        <input type="text" id="contactNo" name="mobile" required minlength="10" maxlength="10"
            oninput="this.value = this.value.replace(/[^0-9]/g, '');" title="Please enter a valid Mobile Number">

        <label for="address">Address</label>
        <input type="text" id="address" name="address" required>

        <div id="passwordError" style="color: red; display: none;">Passwords do not match.</div>

        <button type="submit" id="butt">Register</button>
        <a id="venderreg" href="CustLogin.php">Login</a>
    </form>
    <script>
        document.getElementById('vendorForm').addEventListener('submit', function (event) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            const passwordError = document.getElementById('passwordError');

            if (password !== confirmPassword) {
                event.preventDefault();
                passwordError.style.display = 'block';
            } else {
                passwordError.style.display = 'none';
            }
        });

        document.getElementById("vendorForm").addEventListener("submit", function (e) {
            e.preventDefault();

            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            if (password !== confirmPassword) {
                return;
            }

            const formData = new FormData(this);

            fetch('', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Registration Success',
                            text: data.message,
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "CustLogin.php";
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Kindly Login',
                            text: data.message,
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "CustLogin.php";
                            }
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'There was an error while submitting the form.',
                        confirmButtonText: 'OK'
                    });
                });
        });

    </script>

</body>

</html>