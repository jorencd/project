<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Signin</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/LoginPage.css" rel="stylesheet">
</head>

<body class="text-center" style="background-image: url(css/pictures/loginBG.png); background-repeat: no-repeat; background-size:cover; background-color: rgba(208, 231, 249, 0.8); backdrop-filter: blur(15px);">
  <main class="form-signin">
    <form id="signInForm" action="register.php" method="post" style="background-color: rgba(208, 231, 249, 0.4); backdrop-filter: blur(15px);">
      <img class="mb-4" src="css/pictures/A - Copy.png" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
      <div class="form-floating">
        <input type="email" class="form-control" id="signInEmail" name="email" placeholder="name@example.com" required>
        <label for="signInEmail">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="signInPassword" name="password" placeholder="Password" required>
        <label for="signInPassword">Password</label>
      </div>
      <div class="checkbox mb-3">
        <label><input type="checkbox" name="remember_me" value="remember-me"> Remember me</label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit" name="signIn">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2023-2024</p>
      <p>Don't have an account? <a href="#" onclick="toggleForms()">Sign up</a></p>
    </form>

    <form id="signUpForm" action="register.php" method="post" style="display:none; background-color: rgba(208, 231, 249, 0.4); backdrop-filter: blur(15px);">
      <img class="mb-4" src="css/pictures/A - Copy.png" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
      <div class="form-floating">
        <input style="margin-bottom: 10px;" type="text" class="form-control" id="signUpFirstName" name="first_name" placeholder="First Name" required>
        <label for="signUpFirstName">First Name</label>
      </div>
      <div class="form-floating">
        <input style="margin-bottom: 10px;" type="text" class="form-control" id="signUpLastName" name="last_name" placeholder="Last Name" required>
        <label for="signUpLastName">Last Name</label>
      </div>
      <div class="form-floating">
        <input type="email" class="form-control" id="signUpEmail" name="email" placeholder="name@example.com" required>
        <label for="signUpEmail">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="signUpPassword" name="password" placeholder="Password" required>
        <label for="signUpPassword">Password</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="signUpConfirmPassword" name="confirm_password" placeholder="Confirm Password" required>
        <label for="signUpConfirmPassword">Confirm Password</label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit" name="signUp">Sign up</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2023-2024</p>
      <p>Already have an account? <a href="#" onclick="toggleForms()">Sign in</a></p>
    </form>
  </main>
  <script src="js/LoginPage.js"></script>
</body>

</html>