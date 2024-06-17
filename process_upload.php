<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'usersreg';
$port = 3306;

$conn = new mysqli($host, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$recipeTitle = $_POST['recipe-title'];
$servings = intval($_POST['num-servings']);
$ingredients = $_POST['recipe-ingredients'];
$directions = $_POST['recipe-directions'];
$email = $_POST['email'];

$uploadDirectory = 'C:/xampp/htdocs/projo/uploads/';  // Absolute path to the uploads directory
$targetFile = $uploadDirectory . basename($_FILES['recipe-image']['name']);

if (move_uploaded_file($_FILES['recipe-image']['tmp_name'], $targetFile)) {
    $sql = "INSERT INTO recipes (recipe_title, servings, ingredients, directions, photo, submitted_by, email) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisssss", $recipeTitle, $servings, $ingredients, $directions, $targetFile, $recipeTitle, $email);

    if ($stmt->execute()) {
        // Recipe submitted successfully
    header("Location: celebration.html"); // Redirect to the celebration page
    exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "Error uploading the file.";
}

$conn->close();
?>