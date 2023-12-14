<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Shop</title>
</head>
<body>



<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pet_shop";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Display Users and Pets Table
$sql = "SELECT users.id as userId, users.name as userName, pets.id as petId, pets.name as petName 
        FROM users
        LEFT JOIN pets ON users.id = pets.user_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>User ID</th><th>User Name</th><th>Pet ID</th><th>Pet Name</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["userId"] . "</td>";
        echo "<td>" . $row["userName"] . "</td>";
        echo "<td>" . $row["petId"] . "</td>";
        echo "<td>" . $row["petName"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
    <h2>Add User</h2>
    <form action="process.php" method="post">
        <label for="userName">User Name:</label>
        <input type="text" name="userName" required>
        <input type="submit" name="addUser" value="Add User">
    </form>

    <h2>Add Pet</h2>
    <form action="process.php" method="post">
        <label for="petName">Pet Name:</label>
        <input type="text" name="petName" required>
        
        <label for="userId">User ID:</label>
        <input type="text" name="userId" required>
        
        <input type="submit" name="addPet" value="Add Pet">
    </form>

    <h2>Assign Pet to User</h2>
    <form action="process.php" method="post">
        <label for="petId">Pet ID:</label>
        <input type="text" name="petId" required>
        
        <label for="userIdAssign">User ID:</label>
        <input type="text" name="userIdAssign" required>
        
        <input type="submit" name="assignPet" value="Assign Pet to User">
    </form>

    <h2>User and Pets Table</h2>
   

</body>
</html>
