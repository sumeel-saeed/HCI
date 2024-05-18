<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* Default font size */
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
            display: flex; /* Change display to flex */
            flex-direction: column; /* Stack items vertically */
        }

        .navbar a, .dropdown {
            text-align: center; /* Center align all navigation items */
        }

        .navbar a, .dropbtn {
            font-size: 18px; /* Adjust the font size as needed */
            color: #ffffff; /* Updated color for better contrast */
            padding: 14px 16px;
            text-decoration: none;
            width: 100%; /* Take full width */
            box-sizing: border-box; /* Include padding in width calculation */
        }

        /* Improve contrast for better readability */
        .navbar a:hover, .dropdown:hover .dropbtn {
            background-color: #0056b3; /* Darker shade on hover */
        }

        /* Dropdown Styles */
        .dropdown {
            position: relative;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #007bff; /* Updated color for better contrast */
            width: 100%; /* Take full width */
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
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
    </style>
</head>
<body>
    <div class="navbar">
        <a href="home.html">Home</a>

        <div class="dropdown">
            <button class="dropbtn">Admin Dashboard
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="dashboard.php">Dashboard</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn">View
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="viewproduct.php">Product</a>
                <a href="vieworder.php">Order</a>
                <a href="viewstock.php">Stock</a>
                <a href="viewreport.php">Report</a>
                <a href="multilingual.html">Change Language</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn">Add
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="addproduct.html">Product</a>
                <a href="addorder.html">Order</a>
                <a href="addstock.html">Stock</a>
                <a href="addreport.html">report</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn">Delete
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="deleteproduct.php">Product</a>
                <a href="deleteorder.php">Order</a>
                <a href="deletestock.php">Stock</a>
                <a href="deletereport.php">Report</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn">Update
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="updateproduct.html">Product Update</a>
                <a href="updateorder.html">Update Order</a>
                <a href="updatestock.html">Update Stock</a>
                <a href="updatereport.html">Update Report</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn">Employee Management
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="employeemanagement.html">Staff details</a>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn">Select language
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="multilingual.html">Change Language</a>
            </div>
        </div>

        <a href="feedback.html">Contact/Feedback</a>
    </div>

    <h1>Welcome to UA92 Donner</h1>

    <!-- JavaScript to increase text size -->
    <script>
        function increaseTextSize() {
            var elements = document.getElementsByTagName('*');
            for (var i = 0; i < elements.length; i++) {
                var fontSize = window.getComputedStyle(elements[i], null).getPropertyValue('font-size');
                var currentSize = parseFloat(fontSize);
                elements[i].style.fontSize = (currentSize * 1.2) + 'px'; // Increase by 20%
            }
        }
    </script>
    <button onclick="increaseTextSize()">Increase Text Size</button>
</body>
</html>
