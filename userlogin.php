<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connect to the database 
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'usersreg';
    $port = 3306;
    
    $conn = new mysqli($host, $username, $password, $database, $port);
    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $username = $_POST['user'];
    $password = $_POST['pass'];

    // Prepare and execute SQL query with parameterized query
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a matching user is found
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify password using password_verify() function
        if (password_verify($password, $user['password'])) {
            // Authentication successful
            session_start();
            $_SESSION['user'] = $username; // Set session variable
            header("Location: recipes.php"); // Redirect to recipes page
            exit();
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Invalid username or password.";
    }

    // Close the database connection
    $conn->close();
}
?>
