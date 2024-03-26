<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "hrachovsky3a2";
    $password = "Nepoviem.00";
    $dbname = "hrachovsky3a2";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("<p class='error-message'>Connection failed: " . $conn->connect_error . "</p>");
    }

    $input_username = $_POST['username'];
    $input_password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $input_email = $_POST['email'];

    if ($input_password !== $confirm_password) {
        echo "<p class='error-message'>Passwords do not match. Please enter the same password in both fields.</p>";
        exit; 
    }

    $hashed_password = password_hash($input_password, PASSWORD_DEFAULT);

    $check_username_sql = "SELECT * FROM t_user WHERE username='$input_username'";
    $result = $conn->query($check_username_sql);

    if ($result->num_rows > 0) {
        echo "<p class='error-message'>Username already exists. Please choose a different username.</p>";
    } else {
        $insert_sql = "INSERT INTO t_user (username, password, email) VALUES ('$input_username', '$hashed_password', '$input_email')";

        if ($conn->query($insert_sql) === TRUE) {
            echo "<p>New record created successfully</p>";
        } else {
            echo "<p class='error-message'>Error: " . $insert_sql . "<br>" . $conn->error . "</p>";
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Register form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="zaklad">
        <form action="register.php" method="post">
            <h1>Registrácia</h1>
            <input type="text" name="username" placeholder="username" required autofocus><br>
            <input type="password" name="password" placeholder="password" required><br>
            <input type="password" name="confirm_password" placeholder="confirm password" required><br>
            <input type="email" name="email" placeholder="email" required><br>
            <button type="submit" name="submit">Registrovať sa</button>
            <a href="index.php" id="Register">Prihlásiť sa</a>
        </form>
    </div>
</body>
</html>
