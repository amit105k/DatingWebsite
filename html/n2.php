<div id="profiles">
    <?php
    include("db.php");
    $sql = "SELECT * FROM customer_reg";
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


<style>
#profiles {
    display: flex;
    justify-content: center;
    width: 90%;
    margin: 0 auto;
}

.card-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

.card {
    width: 20%;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    padding: 10px;
    background-color: #f9f9f9;
    overflow: hidden;
    text-align:inherit;
}

.card-image img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    border-radius: 4px;
}

.card-name {
    font-size: 1.2em;
    margin-top: 10px;
    margin-bottom: 10px;
    font-weight: bold;
    color: #333;
}

.card p {
    margin: 5px 0;
    font-size: 1.1em;
    color: #555;
}

.card-gender,
.card-age,
.card-state,
.card-city,
.card-address {
    color: #666;
}

</style>