<?php
session_start();

include("db.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['pass'];

    if(!empty($username) && !empty($password) && !is_numeric($username)){
        $query = "select * from form where username = '$username' limit 1";
        $result = mysqli_query($conn, $query);

        if($result){
            if($result && mysqli_num_rows($result) > 0){
                $user_data = mysqli_fetch_assoc($result);

                if($user_data['password'] == $password){
                    header("location: adminpage.php");
                    die;
                }
            }
        }
        echo "<script type='text/javascript'> alert('Wwrong Username or Password')</script>";
    }
    else{
        echo "<script type='text/javascript'> alert('Wrong Username or Password')</script>";

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Log in</title>
    <link rel="stylesheet" href="css/form.css">
</head>

<body>
    <div class="login">
        <h1>Login</h1>
        <form method="POST">
            <label><span class="material-symbols-outlined">person</span>Username</label>
            <input type="text" name="username" required>

            <label><span class="material-symbols-outlined">lock </span>Password</label>
            <input type="password" name="pass" required>
            <input type="submit" name="" value="Login" href="adminpage.php">
        </form>
    </div>
</body>