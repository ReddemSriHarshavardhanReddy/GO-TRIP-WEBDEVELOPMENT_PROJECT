<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database_name";

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Perform basic input validation (you should improve this)
        if (empty($username) || empty($email) || empty($password)) {
            echo "All fields are required.";
        } else {
            // You should hash the password for security
            // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert user data into the database
            $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

            if ($conn->query($sql) === TRUE) {
                echo "Registration successful!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    $conn->close();
    ?>

    <h2>User Registration</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username"><br><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email"><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password"><br><br>
        
        <input type="submit" value="Register">
    </form>
</body>
</html>
