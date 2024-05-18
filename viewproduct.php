<html>
<body>
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

th, td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: left;
}

th {
    background-color: #7DBBFF;
    color: #fff;
}

/* Improve contrast for better readability */
th, td {
    transition: background-color 0.3s ease;
}

th:hover, td:hover {
    background-color: #f2f2f2;
}

/* Responsive Design */
@media only screen and (max-width: 600px) {
    th, td {
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
<?php
 
$link = mysqli_connect("localhost", "root", "", "loginsystem");
// Check connection
if ($link === false) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<h2>See All Products</h2>
<table>
    <tr>
        <th width="150px">pid<br><hr></th>
        <th width="250px">pname<br><hr></th>
        <th width="150px">price<br><hr></th>
    </tr>
    <?php
    $sql = mysqli_query($link,"SELECT pid, pname, price FROM product");
    while ($row = $sql->fetch_assoc()) 
    {
        echo "<tr>
        <th>{$row['pid']}</th>
        <th>{$row['pname']}</th>
        <th>{$row['price']}</th>
        </tr>";
    }
    ?>
</table>
</body>
</html>