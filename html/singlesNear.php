<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id="filter-form">
    <form method="GET" action="" id="filterForm">
        <label for="gender">Gender:</label>
        <select name="gender" id="gender" onchange="this.form.submit()">
            <option value="">Select Gender</option>
            <option value="Male" <?php echo (isset($_GET['gender']) && $_GET['gender'] == 'Male') ? 'selected' : ''; ?>>
                Male</option>
            <option value="Female" <?php echo (isset($_GET['gender']) && $_GET['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
        </select>

        <label for="state">State:</label>
        <select name="state" id="state" onchange="this.form.submit()">
            <option value="">Select State</option>
            <option value="Uttar Pradesh" <?php echo (isset($_GET['state']) && $_GET['state'] == 'Uttar Pradesh') ? 'selected' : ''; ?>>Uttar Pradesh</option>
            <option value="Delhi" <?php echo (isset($_GET['state']) && $_GET['state'] == 'Delhi') ? 'selected' : ''; ?>>
                Delhi</option>
        </select>

        <label for="city">City:</label>
        <select name="city" id="city" onchange="this.form.submit()">
            <option value="">Select City</option>
            <option value="Noida" <?php echo (isset($_GET['city']) && $_GET['city'] == 'Noida') ? 'selected' : ''; ?>>
                Noida</option>
            <option value="Ghaziabad" <?php echo (isset($_GET['city']) && $_GET['city'] == 'Ghaziabad') ? 'selected' : ''; ?>>Ghaziabad</option>
            <option value="NCR" <?php echo (isset($_GET['city']) && $_GET['city'] == 'NCR') ? 'selected' : ''; ?>>NCR
            </option>
        </select>
    </form>
</div>

<div id="profiles">
    <?php
    include("db.php");

    $sql = "SELECT * FROM customer_reg WHERE 1";


    if (isset($_GET['gender']) && $_GET['gender'] != '') {
        $gender = $_GET['gender'];
        $sql .= " AND Gender = '$gender'";
    }

    if (isset($_GET['state']) && $_GET['state'] != '') {
        $state = $_GET['state'];
        $sql .= " AND State = '$state'";
    }

    if (isset($_GET['city']) && $_GET['city'] != '') {
        $city = $_GET['city'];
        $sql .= " AND City = '$city'";
    }

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo '<div class="card-container">';

        while ($row = $result->fetch_assoc()) {
            echo '<div class="card">';
            echo '<div class="card-image"><img src="' . $row['image'] . '" alt="Profile Image"></div>';
            echo '<h1 class="card-name">' . $row['Customer_Name'] . '</h1>';
            echo '<p class="card-gender"><strong>Gender:</strong> ' . $row['Gender'] . '</p>';
            echo '<p class="card-age"><strong>Age:</strong> ' . $row['Age'] . '</p>';
            echo '<p class="card-state"><strong>State:</strong> ' . $row['State'] . '</p>';
            echo '<p class="card-city"><strong>City:</strong> ' . $row['City'] . '</p>';
            echo '<p class="card-address"><strong>Address:</strong> ' . $row['Address'] . '</p>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo 'No records found';
    }
    ?>
</div>
<?php include("footer.php") ?>
</body>
</html>

<style>
    * {
        margin: 0;
        padding: 0;
    }

    #filterForm {
        width: 90%;
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f4f4f4;
        border-radius: 10px;
        /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */
    }

    #filterForm label {
        display: block;
        margin-bottom: 8px;
    }

    #filterForm select {
        width: 100%;
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #fff;
        margin-bottom: 15px;
    }



    #profiles {
        display: flex;
        justify-content: center;
        width: 90%;
        margin: 0 auto;
    }

    #filter-form {
        padding: 15px;
        background-color: #f4f4f4;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    #filter-form label {
        font-size: 14px;
        color: #333;
        margin-right: 10px;
        display: inline-block;
        margin-bottom: 5px;
    }

    #filter-form select {
        padding: 8px 15px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #fff;
        margin-right: 15px;
        width: 180px;
        transition: border-color 0.3s ease;
    }

    #filter-form select:hover {
        border-color: #007bff;
    }

    #filter-form button {
        padding: 10px 15px;
        font-size: 14px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    #filter-form button:hover {
        background-color: #0056b3;
    }

    #filter-form select:focus {
        border-color: #007bff;
        outline: none;
    }

    .card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .card {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 250px;
        text-align: center;
    }

    .card img {
        max-width: 100%;
        height: 250px;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .card h1 {
        font-size: 24px;
        color: #333;
        margin-bottom: 10px;
    }

    .card p {
        font-size: 18px;
        color: #555;
        margin-bottom: 5px;
    }

    .card p strong {
        font-weight: bold;
    }
</style>