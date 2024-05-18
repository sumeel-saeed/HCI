<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
            text-align: center;
            color: #333;
        }

        h2 {
            margin-top: 50px;
            font-size: 28px;
        }

        p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        strong {
            color: #4caf50;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the input values
    $FirstName = $_POST["FirstName"];
    $LastName = $_POST["LastName"];
    $Address = $_POST["Address"];
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];
    $StaffRole = $_POST["StaffRole"];

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

    // Function to hash the password
    function hashPassword($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    // Hash the password
    $hashedPassword = hashPassword($Password);

    // Prepare and execute the SQL query to insert user data
    $stmt = $conn->prepare("INSERT INTO employeemanagement (FirstName, LastName, Address, Email, Password, StaffRole) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $FirstName, $LastName, $Address, $Email, $hashedPassword, $StaffRole);

    if ($stmt->execute()) {
        // Acknowledge receipt to the user
        $output = "<div class='container'>";
        $output .= "<h2>Thank you, $FirstName $LastName!</h2>";
        $output .= "<p>Your information has been received:</p>";
        $output .= "<p><strong>First Name:</strong> $FirstName</p>";
        $output .= "<p><strong>Last Name:</strong> $LastName</p>";
        $output .= "<p><strong>Address:</strong> $Address</p>";
        $output .= "<p><strong>Email:</strong> $Email</p>";
        $output .= "<p><strong>Password:</strong> $Password</p>";
        $output .= "<p><strong>Staff Role:</strong> $StaffRole</p>";
        $output .= "</div>";

        echo $output;
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If the form is not submitted through POST, redirect to the form
    header("Location: index.html");
    exit();
}
?>


</body>

</html>
