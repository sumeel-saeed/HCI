<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 18px;
        }

        /* Header Styles */
        .navbar {
            overflow: hidden;
            background-color: #007bff; /* Updated color with higher contrast */
        }

        .navbar a {
            float: left;
            font-size: 18px; /* Adjust the font size as needed */
            color: #ffffff; /* Updated color for better contrast */
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        /* Improve contrast for better readability */
        .navbar a:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }

        /* Dropdown Styles */
        .dropdown {
            float: left;
            overflow: hidden;
        }

        .dropdown .dropbtn {
            font-size: 18px; /* Adjust the font size as needed */
            border: none;
            outline: none;
            color: #ffffff; /* Updated color for better contrast */
            padding: 14px 16px;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
        }

        .dropdown:hover .dropbtn {
            background-color: #0056b3; /* Darker shade on hover */
        }

        /* Improve contrast and readability for dropdown items */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #007bff; /* Updated color for better contrast */
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            float: none;
            color: #ffffff; /* Updated color for better contrast */
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Improve contrast and readability for the main content */
        h1 {
            color: #007bff; /* Updated color for better contrast */
            padding: 20px;
            background-color: #f0f0f0; /* Background color for better contrast */
            margin: 0;
        }

        /* Responsive Design */
        @media only screen and (max-width: 600px) {
            .navbar a, .dropdown .dropbtn {
                float: none;
                display: block;
                text-align: left;
                width: 100%;
                box-sizing: border-box;
            }
        }

        /* Focus styles */
        a:focus,
        .dropbtn:focus,
        .dropdown-content a:focus {
            outline: 2px solid #007bff; /* Highlight the focused element */
            outline-offset: 4px; /* Adjust the outline offset as needed */
        }

        /* Styles for Disabled Users */
        body.disable-scroll .navbar a,
        body.disable-scroll .dropdown .dropbtn,
        body.disable-scroll .dropdown-content a,
        body.disable-scroll h1,
        body.disable-scroll th,
        body.disable-scroll td {
            background-color: #ddd; /* Background color for better contrast */
            color: #000; /* Text color for better contrast */
        }

        body.disable-scroll .navbar a:hover,
        body.disable-scroll .dropdown:hover .dropbtn,
        body.disable-scroll .dropdown-content a:hover,
        body.disable-scroll th:hover,
        body.disable-scroll td:hover {
            background-color: #bbb; /* Darker shade on hover */
        }

        /* Adjusted Focus Styles for Disabled Users */
        body.disable-scroll a:focus,
        body.disable-scroll .dropbtn:focus,
        body.disable-scroll .dropdown-content a:focus,
        body.disable-scroll th:focus,
        body.disable-scroll td:focus {
            outline: 2px solid #bbb; /* Highlight the focused element */
            outline-offset: 4px; /* Adjust the outline offset as needed */
        }

        /* Additional Styles for Improved Readability */
        body.disable-scroll h2 {
            background-color: #007bff; /* Header background color for better contrast */
            color: #fff; /* Header text color for better contrast */
            padding: 10px; /* Adjust padding as needed */
        }

        body.disable-scroll table {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff; /* Table background color for better contrast */
        }

        body.disable-scroll table th,
        body.disable-scroll table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
    </style>
</head>
<body>
    <?php
    $link = mysqli_connect("localhost", "root", "", "loginsystem");
    // Check connection
    if ($link === false) {
        die("Connection failed: " . mysqli_connect_error());
    }
    ?>

    <h2>See All Orders</h2>
    <table>
        <tr>
            <th width="150px">Order ID<br><hr></th>
            <th width="250px">Order Name<br><hr></th>
            <th width="150px">Order Price<br><hr></th>
            <th width="150px">Order Date<br><hr></th>
        </tr>
        <?php
        $sql = mysqli_query($link, "SELECT order_id, ordername, orderprice, orderdate FROM `order`");
        while ($row = $sql->fetch_assoc()) {
            echo "<tr>
                <td>{$row['order_id']}</td>
                <td>{$row['ordername']}</td>
                <td>{$row['orderprice']}</td>
                <td>{$row['orderdate']}</td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>
