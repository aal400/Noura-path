<?php
session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['user'] = [
        'email' => $_POST['Email'],
        'password' => password_hash($_POST['psw'], PASSWORD_DEFAULT), // Hash the password
        'first_name' => $_POST['fname'],
        'last_name' => $_POST['lname'],
        'phone_number' => $_POST['phone_number'],
        'age' => $_POST['n'],
        'gender' => $_POST['gender'],
        'professional_level' => $_POST['Professional_level']
    ];

    header("Location: Home.html");
    exit;
}
?>
