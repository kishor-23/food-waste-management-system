<?php
$servername = "localhost";  // Change this if your MySQL server is hosted elsewhere
$username = "root";         // Change this to your MySQL username
$password = "";             // Change this to your MySQL password
$dbname = "mydatabase";     // Change this to your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to create table Users
$sql = "CREATE TABLE Users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// SQL to create table Orders
$sql = "CREATE TABLE Orders (
    order_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED NOT NULL,
    product_name VARCHAR(50) NOT NULL,
    quantity INT(6) NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(id)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Orders created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close connection
$conn->close();
?>
