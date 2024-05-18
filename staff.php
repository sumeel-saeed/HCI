<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $staff_id = $_POST["staff_id"];
    $FirstName = $_POST["FirstName"];
    $LastName = $_POST["LastName"];
    $Address = $_POST["Address"];
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];
    $StaffRole = $_POST["StaffRole"];

    // You can perform additional actions here, such as saving to a database.

    // Acknowledge receipt to the user
    echo "<h2>Thank you, $FirstName $LastName!</h2>";
    echo "<p>Your information has been received:<br>";
    echo "<strong>Staff ID:</strong> $staff_id<br>";
    echo "<strong>First Name:</strong> $FirstName<br>";
    echo "<strong>Last Name:</strong> $LastName<br>";
    echo "<strong>Address:</strong> $Address<br>";
    echo "<strong>Email:</strong> $Email<br>";
    echo "<strong>Password:</strong> $Password<br>";
    echo "<strong>Staff Role:</strong> $StaffRole</p><br>";
} else {
    // If the form is not submitted through POST, redirect to the form
    header("Location: employeemanagement.html");
    exit();
}
?>
<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the input values
    $staff_id = $_POST["staff_id"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $staffrole = $_POST["staffrole"];
 
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
    $stmt = $conn->prepare("INSERT INTO employeemanagement (staff_id, FirstName, LastName, Address, Email, Password, StaffRole) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $staff_id, $firstname, $lastname, $address, $email, $password, $staffrole);
 
    if ($stmt->execute()) {
        echo "Information added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
 
    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>