<?php
session_start();

// Determine which form to show (login or signup)
$showLogin = false;
if (isset($_SESSION['success']) || isset($_SESSION['error'])) {
    // After signup success, show login form by default
    if (isset($_SESSION['success'])) {
        $showLogin = true;
    }
    // If error happens, show login form only if error relates to login
    // You can extend this logic if needed
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Login / Sign Up</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="container">
        <?php
        if (isset($_SESSION['error'])) {
            echo "<p style='color:red;'>" . htmlspecialchars($_SESSION['error']) . "</p>";
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
            echo "<p style='color:green;'>" . htmlspecialchars($_SESSION['success']) . "</p>";
            unset($_SESSION['success']);
        }
        ?>

        <!-- Signup Form -->
        <form action="signup.php" method="POST" class="form signup" style="display: <?= $showLogin ? 'none' : 'block' ?>;">
            <h2  style="text-align:center">Sign Up</h2><br>
            <div class="inputBox">
                <input type="text" name="username" required />
                <i class="fa-regular fa-user"></i>
                <span>username</span>
            </div><br>
            <div class="inputBox">
                <input type="email" name="email" required />
                <i class="fa-regular fa-envelope"></i>
                <span>email address</span>
            </div><br>
            <div class="inputBox">
                <input type="password" name="password" required />
                <i class="fa-solid fa-lock"></i>
                <span>create password</span>
            </div><br>
            <div class="inputBox">
                <input type="password" name="confirm_password" required />
                <i class="fa-solid fa-lock"></i>
                <span>confirm password</span>
            </div><br>
            <div class="inputBox">
                <input type="submit" value="Create Account" />
            </div><br>
            <p  style="text-align:center">Already a member? <a href="#" class="toggle-login">Log in</a></p>
        </form><br>

        <!-- Login Form -->
        <form action="login.php" method="POST" class="form signin" style="display: <?= $showLogin ? 'block' : 'none' ?>;">
            <h2 style="text-align:center">Sign In</h2><br>
            <div class="inputBox">
                <input type="text" name="username" required />
                <i class="fa-regular fa-user"></i>
                <span>username</span>
            </div><br>
            <div class="inputBox">
                <input type="password" name="password" required />
                <i class="fa-solid fa-lock"></i>
                <span>password</span>
            </div><br>
            <div class="inputBox">
                <input type="submit" value="Login" />
            </div><br>
            <p  style="text-align:center">Not Registered? <a href="#" class="toggle-signup">Create an account</a></p>
        </form>
    </div>

    <script>
      // Toggle between forms on link click
      document.querySelectorAll('.toggle-login').forEach(el => {
        el.addEventListener('click', e => {
          e.preventDefault();
          document.querySelector('.signup').style.display = 'none';
          document.querySelector('.signin').style.display = 'block';
        });
      });

      document.querySelectorAll('.toggle-signup').forEach(el => {
        el.addEventListener('click', e => {
          e.preventDefault();
          document.querySelector('.signin').style.display = 'none';
          document.querySelector('.signup').style.display = 'block';
        });
      });
    </script>
</body>
</html>
