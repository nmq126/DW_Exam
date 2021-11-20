<?php
include 'connect.php';
$cnn = connectToServer();
$cnn->query("DROP TABLE IF EXISTS feedbacks");

$sql ="CREATE TABLE feedbacks (
    `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `feedback` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` boolean DEFAULT false
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

if ($cnn->query($sql) === TRUE) {
    $data = new stdClass();
    $data->message = 'Action success';
    http_response_code(201);
    echo '<div>Tạo bảng thành công</div>';

}else {
    $data = new stdClass();
    $data->message = 'Action failed';
    http_response_code(500);
    echo '<div>Tạo bảng thất bại</div>';
}
$cnn->close();
?>