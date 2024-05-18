<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the input values
    $email = $_POST["email"];
    $password = $_POST["password"];
 
    // Database connection details
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "loginsystem";
 
    // Create a connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
 
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
 
    // Prepare and execute the SQL query to retrieve user data based on the provided email
    $stmt = $conn->prepare("SELECT id, username, email, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
 
    // Check if a user with the provided email exists
    if ($stmt->num_rows > 0) {
        // Bind the result variables
        $stmt->bind_result($userId, $username, $email, $storedPassword);
 
        // Fetch the result
        $stmt->fetch();
 
        // Verify the entered password with the stored password from the database
        if ($password === $storedPassword) {
            echo "Login successful! Welcome, $username!";
            // You can redirect the user to a dashboard or another page here
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "No user found with the provided email.";
    }
 
    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Login</title>
</head>
<body>
<style>
    {    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}
 {
    text-align: center;
    color: #333;
}

form {
    max-width: 400px;
    margin: 20px;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 8px;
    color: #555;
}

input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

a {
    color: #0066cc;
}

/* Responsive Styles */
@media screen and (max-width: 600px) {
    form {
        max-width: 100%;
    }
}

/* Accessibility Styles */
input:focus,
button:focus {
    outline: 2px solid #4caf50;
    outline-offset: 2px;
}

/* Styles for Disabled Users */
body.inverted {
    filter: invert(1);
}
</style>
 
<h2>User Login</h2>
<div class='form'>
    <p class='link'>click here for admin page <a href='admin.php'>HOME PAGE</a></p>
</div>
 
<form method="post" action="login.php">
<label for="email">Email:</label>
<input type="email" name="email" id="email" required>
<br>
 
    <label for="password">Password:</label>
<input type="password" name="password" id="password" required>
<br>
 
    <button type="submit">Login</button>
</form>
 
<p>Don't have an account? <a href="registration.php">Register here</a></p>
 
</body>
</html>