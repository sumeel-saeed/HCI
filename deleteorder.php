<!DOCTYPE html>
<html>

<body>
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
        }

        h3 {
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

    <form method="post" action="deleteorder.php">
        <label for="ordername">Order Name:</label>
        <input type="text" name="ordername">

        <label for="orderprice">Order Price:</label>
        <input type="text" name="orderprice">

        <input type="submit" name="submit" value="delete">
        <br>
    </form>

    <?php
    $link = mysqli_connect("localhost", "root", "", "loginsystem");

    // Check connection
    if ($link === false) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST['submit'])) {
        $ordername = $_POST['ordername'];
        $orderprice = $_POST['orderprice'];
        
        // Use prepared statement to prevent SQL injection
        $sql = "DELETE FROM `order` WHERE ordername=? AND orderprice=?";
        
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $ordername, $orderprice);
        
        if (mysqli_stmt_execute($stmt)) {
            echo "Record has been deleted";
        } else {
            echo "Error deleting record: " . mysqli_error($link);
        }
        
        mysqli_stmt_close($stmt);
        $link->close();
    }
    ?>
</body>

</html>
