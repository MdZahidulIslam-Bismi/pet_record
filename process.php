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

// Add User
if (isset($_POST['addUser'])) {
    $userName = $_POST['userName'];

    $sql = "INSERT INTO users (name) VALUES ('$userName')";

    if ($conn->query($sql) === TRUE) {
        echo "User added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Add Pet
if (isset($_POST['addPet'])) {
    $petName = $_POST['petName'];
    $userId = $_POST['userId'];

    $sql = "INSERT INTO pets (name, user_id) VALUES ('$petName', $userId)";

    if ($conn->query($sql) === TRUE) {
        echo "Pet added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Assign Pet to User
if (isset($_POST['assignPet'])) {
    $petId = $_POST['petId'];
    $userIdAssign = $_POST['userIdAssign'];

    $sql = "UPDATE pets SET user_id = $userIdAssign WHERE id = $petId";

    if ($conn->query($sql) === TRUE) {
        echo "Pet assigned to user successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
