<?php
$data = json_decode(file_get_contents('php://input'), true);
$name = $data['name'];
$email = $data['email'];
$phone = $data['phone'];
$feedback = $data['feedback'];

include 'connect.php';
$cnn = connectToServer();

$sql = "INSERT INTO feedbacks (name, email, phone, feedback)
            VALUES ('$name','$email','$phone','$feedback')";

header('Content-Type: application/json; charset=utf-8');

if ($cnn->query($sql) === TRUE) {
    $data = new stdClass();
    $data->message = 'Gửi thành công feedback';
    http_response_code(201);
    echo json_encode($data);
} else {
    $data = new stdClass();
    $data->message = 'Gửi feedback thất bại';
    http_response_code(500);
    echo json_encode($data);
}
$cnn->close();
?>