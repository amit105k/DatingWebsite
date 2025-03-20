<?php
include("db.php");

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['user_id']) && isset($data['user_email']) && isset($data['opposite_user_id']) && isset($data['movie_id']) && isset($data['opposite_email'])) {
    $userId = $data['user_id'];
    $useremail = $data['user_email'];
    $oppositeUserId = $data['opposite_user_id'];
    $opposite_email=$data['opposite_email'];
    $movieId = $data['movie_id'];
    $Status="pending";
    $sql = "INSERT INTO bookings (user_Details,user_email, movie_id, opposite,opposite_email,Status) VALUES (?, ?, ?,?,?,?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("isiiss", $userId, $useremail,$movieId,$oppositeUserId,$opposite_email,$Status);
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
