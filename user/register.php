<?php
session_start();
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['signIn'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordHashed = md5($password);

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email, $passwordHashed);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];
            $_SESSION['email'] = $row['email'];
            header("Location: HomePage.php");
            exit();
        } else {
            echo "<script>alert('Not Found, Incorrect Email or Password');</script>";
        }
        $stmt->close();
    }

    if (isset($_POST['signUp'])) { 
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

        $passwordRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
    
        if ($password !== $confirmPassword) {
            echo "<script>alert('Passwords do not match!');</script>";
            exit();
        }
    
        if (!preg_match($passwordRegex, $password)) {
            echo "<script>alert('Your password must be at least 8 characters long. It should include special characters, UPPERCASE and lowercase letters. Please try another.');</script>";
            exit();
        }

        $passwordHashed = md5($password);
    
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            echo "<script>alert('Email Address Already Exist!');</script>";
        } else {
            $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $first_name, $last_name, $email, $passwordHashed);
            if ($stmt->execute()) {
                header("Location: LoginPage.php");
                exit();
            } else {
                echo "Error: " . $conn->error;
            }
        }
        $stmt->close();
    }
    
}
?>
