<?php
include("db.php");

$sql = "SELECT Name, m_image FROM movie_details ORDER BY RAND() LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $movie = $result->fetch_assoc();
    echo json_encode($movie);
} else {
    echo json_encode(["error" => "No movies found!"]);
}

$conn->close();
?>
