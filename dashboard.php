<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        h2 {
            margin-top: 30px;
        }

        form {
            margin-bottom: 20px;
        }

        form label {
            display: block;
            margin-bottom: 5px;
        }

        form input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #ddd;
        }

        .disabled {
            opacity: 0.5;
            pointer-events: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>

        <!-- Add Order Form -->
        <h2>Add Order</h2>
        <form method="POST">
            <label for="ordername">Order Name:</label>
            <input type="text" id="ordername" name="ordername" required>
            <label for="orderprice">Order Price:</label>
            <input type="text" id="orderprice" name="orderprice" required>
            <button type="submit" name="add_order">Add Order</button>
        </form>

        <!-- Display Report table -->
        <h2>Report</h2>
        <table border="1">
            <tr>
                <th>Report ID</th>
                <th>Product Name</th>
                <th>Total Sale</th>
                <th>Reorder</th>
            </tr>
            <?php
            // Connect to MySQL database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "loginsystem"; 
            $conn = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch report data
            $report_sql = "SELECT * FROM `report`";
            $report_result = $conn->query($report_sql);

            if ($report_result->num_rows > 0) {
                while ($row = $report_result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["report_id"] . "</td>";
                    echo "<td>" . $row["reportname"] . "</td>";
                    echo "<td>" . $row["totalsale"] . "</td>";
                    echo "<td>" . $row["reorder"] . "</td>";
                    echo "<td><a href='viewreport.php'>View</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No reports found</td></tr>";
            }

            // Close MySQL connection
            $conn->close();
            ?>
        </table>

        <!-- Display order table -->
        <h2>Orders</h2>
        <table border="1">
            <tr>
                <th>Order ID</th>
                <th>Order Name</th>
                <th>Order Price</th>
            </tr>
            <?php
            // Connect to MySQL database
            $conn = new mysqli($servername, $username, $password, $database);

            // Fetch order data
            $order_sql = "SELECT * FROM `order`";
            $order_result = $conn->query($order_sql);

            if ($order_result->num_rows > 0) {
                while ($row = $order_result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["order_id"] . "</td>";
                    echo "<td>" . $row["ordername"] . "</td>";
                    echo "<td>" . $row["orderprice"] . "</td>";
                    echo "<td><a href='updateorder.html'>Update</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No orders found</td></tr>";
            }

            // Close MySQL connection
            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
