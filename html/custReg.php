<?php
include("db.php");

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect POST data
    $customerName = $_POST['customerName'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $gender = $_POST['gender'];
    $Age = $_POST['Age'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $state = $_POST['state'];
    $city = $_POST['city'];

    // Check if passwords match
    if ($password !== $confirmPassword) {
        echo json_encode(['success' => false, 'message' => 'Passwords do not match.']);
        exit;
    }

    // Prepare the SQL query
    $stmt = $conn->prepare("INSERT INTO customer_reg (Customer_Name, Gender, Age, email, mobile, State, City, Password, Address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $customerName, $gender, $Age, $email, $mobile, $state, $city, $password, $address);

    // Execute the query and handle errors
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Kindly Login']);
    } else if ($stmt->errno == 1062) {
        echo json_encode(['success' => false, 'message' => 'Email has already been registered with us']);
    } else {
        echo json_encode(['success' => false, 'message' => $stmt->error]);
    }

    // Close the statement and connection
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<style>
    body {
        background-color: #f4f4f4;
    }

    form {
        max-width: 400px;
        margin: auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f4f3f3 !important;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
    }

    input,
    select {
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

</style>

<body>

    <?php include("header2.php"); ?>

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

        <label for="Age">Age</label>
        <input type="text" id="Age" name="Age" required minlength="1" maxlength="2" oninput="this.value = this.value.replace(/[^0-9]/g, '');">

        <label for="email">Email ID</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <label for="confirmPassword">Confirm Password</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required>

        <label for="contactNo">Contact No</label>
        <input type="text" id="contactNo" name="mobile" required minlength="10" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '');">

        <label for="state">State</label>
        <select name="state" id="state" required>
            <option value="Uttar Pradesh">Uttar Pradesh</option>
            <option value="Delhi">Delhi</option>
        </select>

        <label for="city">City</label>
        <select name="city" id="city" required>
            <option value="Noida">Noida</option>
            <option value="Ghaziabad">Ghaziabad</option>
            <option value="NCR">NCR</option>
        </select>

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
                            title: 'Error',
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
