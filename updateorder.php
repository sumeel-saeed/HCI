<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UA92 DONNER KING</title>
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
        $ordername = $_POST["ordername"];
        $orderprice = $_POST["orderprice"];
        
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
        $stmt = $conn->prepare("INSERT INTO `order` (ordername, orderprice) VALUES (?, ?)");
        $stmt->bind_param("ss", $ordername, $orderprice);

        if ($stmt->execute()) {
            // Acknowledge receipt to the user
            $output = "<div class='container'>";
            $output .= "<h2>Thank you!</h2>";
            $output .= "<p>Your information has been updated:</p>";
            $output .= "<p><strong>Order Name :</strong> $ordername</p>";
            $output .= "<p><strong>Order Price:</strong> $orderprice</p>";
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