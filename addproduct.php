<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the input values
    $pname = $_POST["pname"];
    $price = $_POST["price"];

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
    $stmt = $conn->prepare("INSERT INTO `product` (pname, price) VALUES (?, ?)");
    $stmt->bind_param("ss", $pname, $price);

    if ($stmt->execute()) {
        // Acknowledge receipt to the user
        $output = "<div class='container'>";
        $output .= "<h2>Thank you, !</h2>";
        $output .= "<p>Your information has been received:</p>";
        $output .= "<p><strong>Product Name:</strong> $pname</p>";
        $output .= "<p><strong>Product Price:</strong> $price</p>";
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

<!DOCTYPE html>
<html lang="en">

<head>
    <body>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Global Styles */
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        /* Header Styles */
        h3 {
            color: #007bff;
        }

        /* Table Styles */
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        /* Improve contrast for better readability */
        th,
        td {
            transition: background-color 0.3s ease;
        }

        th:hover,
        td:hover {
            background-color: #f2f2f2;
        }

        /* Responsive Design */
        @media only screen and (max-width: 600px) {
            th,
            td {
                padding: 8px;
            }
        }

        /* Accessibility Styles */
        /* Ensure proper contrast, focus styles, and other accessibility considerations */
        a:focus,
        input:focus,
        button:focus {
            outline: 2px solid #007bff;
            outline-offset: 2px;
        }

        /* Styles for Disabled Users */
        /* Implement styles to make the interface more accessible for disabled users */
        body.disable-scroll {
            overflow: hidden;
        }

        /* Dark Mode Styles (Example, if applicable) */
        body.dark-mode {
            background-color: #333;
            color: #fff;
        }
    </style>
</head>
    </body>

</html>