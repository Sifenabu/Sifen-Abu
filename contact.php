<?php


// Create connection
$conn = new mysqli('localhost', 'root', 'root', 'sifu');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$message = $_POST['message'];


$stmt = $conn->prepare("INSERT INTO sifu (name,  email, contact, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $contact,$message);
if ($stmt->execute()) {
    echo "Message stored successfully.";
} else {
    echo "Error: " . $stmt->error;
}


$stmt->close();
$conn->close();
?>
