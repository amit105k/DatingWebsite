<?php
include("db.php");
session_start();
if (!isset($_SESSION['user'])) {
    echo "<script>Swal.fire('Not Logged In', 'Please login to continue!', 'warning');</script>";
}
$loggedInUser = ($_SESSION['user']);
$data = ($_SESSION['user']);

$query = "SELECT * FROM customer_reg WHERE email=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $data['email']);
$stmt->execute();
$resultt = $stmt->get_result();
$amit = $resultt->fetch_assoc();


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

$oppositeProfile = getRandomProfile($amit['Gender'], $conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
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
        .center-section {
            text-align: center;
            
        }

        img {
            width: 200px;
            height: 200px;
            margin-top: 20px;
        }
        #confirm_book{
            background-color: red;
            padding: 10px;
            align-items: center;
        }
    </style>
<body>
    <div class="left-section">
        <img src="<?php echo htmlspecialchars($amit['image']); ?>" id="profileImage" alt="Profile Image" style="height: 200px; width: 200px;">
        <p>Name: <?php echo htmlspecialchars($amit['Customer_Name']); ?></p>
        <p>Age: <?php echo $amit['Age'] ?? '-'; ?></p>
        <p>Gender: <?php echo $amit['Gender'] ?? '-'; ?></p>
        <p>this is from amit</p>
    </div>

<div class="right-section">
    <?php if ($oppositeProfile): ?>
        <img src="<?php echo htmlspecialchars($oppositeProfile['image']); ?>" id="profileImage" alt="Profile Image" style="height: 200px; width: 200px;">
        <p>Name: <?php echo htmlspecialchars($oppositeProfile['Customer_Name']); ?></p>
        <p>Age: <?php echo $oppositeProfile['Age'] ?? '-'; ?></p>
        <p>Gender: <?php echo $oppositeProfile['Gender'] ?? '-'; ?></p>
        <form method="post">
            <button type="submit" name="showAnother">Another</button>
        </form>
    <?php else: ?>
        <p>No profiles found.</p>
    <?php endif; ?>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['showAnother'])) {
    $oppositeProfile = getRandomProfile($amit['Gender'], $conn);
}
?>
</body>
</html>





