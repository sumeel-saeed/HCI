<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the input values
    $username = $_POST["username"];
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
 
    // Prepare and execute the SQL query to insert user data
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, create_datetime) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("sss", $username, $email, $password);
 
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
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
<title>User Registration</title>
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


 
<h2>User Registration</h2>
 
<form method="post" action="registration.php">
<label for="username">Username:</label>
<input type="text" name="username" id="username" required>
<br>
 
    <label for="email">Email:</label>
<input type="email" name="email" id="email" required>
<br>
 
    <label for="password">Password:</label>
<input type="password" name="password" id="password" required>
<br>
 
    <button type="submit">Register</button>
</form>
 
<p>Already have an account? <a href="login.php">Login here</a></p>
 
</body>
</html>