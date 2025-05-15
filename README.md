# User Authentication System

A simple user authentication system built with PHP and MySQL that includes:

- User Registration (Sign Up)
- User Login (Sign In)
- Password hashing for security
- Session management
- Basic form validation
- Redirects users after successful registration and login

## Features

- Register new users with unique usernames
- Secure password storage using PHP's `password_hash()`
- Login authentication with password verification
- Displays success/error messages on the form
- Simple and responsive UI with HTML, CSS, and FontAwesome icons

## Technologies Used

- PHP (server-side scripting)
- MySQL (database)
- HTML/CSS (frontend)
- FontAwesome (icons)

## Setup Instructions

1. Clone or download this repository to your local machine.

2. Create Database and Table

   Refer to the `sql.txt` file for the SQL commands to create the database and users table.

2. Configure Database Connection

   Update the `db.php` file with your MySQL credentials:

   ```php
   <?php
   $servername = "localhost";
   $username = "your_mysql_username";
   $password = "your_mysql_password";
   $dbname = "user_auth";

   $conn = new mysqli($servername, $username, $password, $dbname);

   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   ?>

   Place Project Files

3. Place all project files (including index.php, signup.php, login.php, db.php, dashboard.php, style.css, script.js) into your web server directory (e.g., htdocs for XAMPP).

4. Run the Application
     Open your browser and go to
     http://localhost/your_project_folder/index.php
