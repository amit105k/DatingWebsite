<?php
include("db.php");

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customerName = $_POST['customerName'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO customer_reg (Customer_Name, Gender, email, mobile, Password, Address) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $customerName, $gender, $email, $mobile, $password, $address);

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
    <title>Document</title>
    <link rel="stylesheet" href="../css/header.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Arima:wght@100..700&family=Dancing+Script:wght@400..700&family=Roboto+Slab:wght@100..900&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Movie Dating</title>
        <link rel="stylesheet" href="styles.css">
        <style>
            /* Basic styles for the modal */
        </style>
    </head>

    <body>

        <header class="header" id="scroller">
            <div class="logo">🎬 <a href="index.php">MovieDating</a></div>
            <a href="CustReg.php" class="wp-block-button button is-style-premium" id="startFreeBtn">
                <span class="wp-block-button__link">Start free today</span>
            </a>
        </header>

        <!-- Modal 
        <div id="signupModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeModal">X</span>
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

                    <label for="email">Email ID</label>
                    <input type="email" id="email" name="email" required>

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>

                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" required>

                    <label for="contactNo">Contact No</label>
                    <input type="text" id="contactNo" name="mobile" required minlength="10" maxlength="10"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                        title="Please enter a valid Mobile Number">

                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" required>

                    <div id="passwordError" style="color: red; display: none;">Passwords do not match.</div>

                    <button type="submit" id="butt">Register</button>
                    <a id="venderreg" href="CustomeLogin.php">Login</a>
                </form>
            </div>
        </div>-->

        <script>
            const modal = document.getElementById("signupModal");
            const btn = document.getElementById("startFreeBtn");
            const close = document.getElementById("closeModal");

            btn.onclick = () => modal.style.display = "block";
            close.onclick = () => modal.style.display = "none";
            window.onclick = (event) => {
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            }
        </script>



        <script>
            let header = document.getElementById('scroller');
            let prevScrollPos = window.pageYOffset;

            header.style.top = "-91px";

            window.onscroll = function () {
                let currentScrollPos = window.pageYOffset;

                if (prevScrollPos < currentScrollPos) {
                    header.style.top = "0";
                    header.style.position = "fixed";
                }
                else {
                    header.style.top = "-91px";
                }

                prevScrollPos = currentScrollPos;
            };


        </script>
        <!-- <script>
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
                                    window.location.href = "http://localhost/amitclub/html/CustomeLogin.php";
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
                                    window.location.href = "http://localhost/amitclub/html/CustomeLogin.php";
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

        </script> -->

    </body>

    </html>