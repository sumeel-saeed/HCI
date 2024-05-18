<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UA92 DONNER KING FEEDBACK</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
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
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $feedback = $_POST["message"];

        // You can perform additional actions here, such as saving to a database.

        // Acknowledge receipt to the user
        echo "<h2>Thank you, $name!</h2>";
        echo "<p>Your feedback has been received:<br>";
        echo "<strong>Email:</strong> $email<br>";
        echo "<strong>Feedback:</strong> $feedback</p><br>";
    } else {
        // If the form is not submitted through POST, redirect to the form
        header("Location: index.html");
        exit();
    }
    ?>
</body>
</html>
