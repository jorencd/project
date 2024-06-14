<?php
    session_start();

    include("db.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $username = $_POST['username'];
        $email = $_POST['mail'];
        $password = $_POST['pass'];

        if(!empty($email) && !empty($password) && !is_numeric($email)){
            $query = "insert into form (username, email, password) values ('$username', '$email', '$password')";

            mysqli_query($con, $query);

            echo "<script type='text/javascript'> alert('Successfully Registered')</script>";
        }
        else{
            echo "<script type='text/javascript'> alert('Please ENTER a VALID information')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Sign up</title>
    <link rel="stylesheet" href="css/form.css">
</head>

<body>
    <div class="signup">
        <h1>Sign Up</h1>
        <form method="POST">
            <label><span class="material-symbols-outlined">person</span>Username</label>
            <input type="text" name="username" required>

            <label><span class="material-symbols-outlined">mail</span> Email</label>
            <input type="email" name="mail" required>

            <label><span class="material-symbols-outlined">lock </span>Password</label>
            <input type="password" name="pass" required>
            <input type="submit" name="" value="Sign Up">
        </form>
        <p>Already have an account? <a href="login.php">Login</a> </p>
    </div>
</body>

</html>