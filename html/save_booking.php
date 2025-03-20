<?php
include("db.php");

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['user_id']) && isset($data['user_email']) && isset($data['opposite_user_id']) && isset($data['movie_id'])) {
    $userId = $data['user_id'];
    $useremail = $data['user_email'];
    $oppositeUserId = $data['opposite_user_id'];
    $movieId = $data['movie_id'];
    $Status="pending";
    $sql = "INSERT INTO bookings (user_Details,user_email, movie_id, opposite,Status) VALUES (?, ?, ?,?,?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("isiis", $userId, $useremail,$movieId,$oppositeUserId,$Status);
        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
        $stmt->close();
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false]);
}

$conn->close();
?>
