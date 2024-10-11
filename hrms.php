<?php
$servername = "localhost";
$username = "root"; // Change if you use a different username
$password = "your_password"; // Replace with your secure password
$dbname = "hrms_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO employees (name, position) VALUES ('John Doe', 'Developer')";
$conn->query($sql);

$result = $conn->query("SELECT * FROM employees");
while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Position: " . $row["position"]. "<br>";
}

$conn->close();
?>
