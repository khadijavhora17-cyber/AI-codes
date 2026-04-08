<?php

$conn = new mysqli("localhost","root","","student_db");

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

// Get data from form
$enrollment = $_POST['enrollment'];
$fullname = $_POST['full_name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$gender = $_POST['gender'];
$branch = $_POST['branch'];
$semester = $_POST['semester'];
$dob = $_POST['dob'];

// Prepare SQL statement
$stmt = $conn->prepare("INSERT INTO students (enrollment, full_name, email, mobile, gender, branch, semester, dob) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("ssssssis", $enrollment, $fullname, $email, $mobile, $gender, $branch, $semester, $dob);

// Execute query
if($stmt->execute()){
    header("Location: index.html");
    exit();
}else{
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>