<?php
$success_message = $error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "hrachovsky";
    $password = "password.00";
    $dbname = "hrachovsky";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        $error_message = "Connection failed: " . $conn->connect_error;
    } else {
        $input_username = $_POST['username'];
        $input_password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $input_email = $_POST['email'];

        if ($input_password !== $confirm_password) {
            $error_message = "Passwords do not match. Please enter the same password in both fields.";
        } else {
            $hashed_password = password_hash($input_password, PASSWORD_DEFAULT);

            $check_username_sql = "SELECT * FROM t_user WHERE meno='$input_username'";
            $result = $conn->query($check_username_sql);

            if ($result->num_rows > 0) {
                $error_message = "Username already exists. Please choose a different username.";
            } else {
                $insert_sql = "INSERT INTO t_user (meno, heslo, email) VALUES ('$input_username', '$hashed_password', '$input_email')";

                if ($conn->query($insert_sql) === TRUE) {
                    $success_message = "New record created successfully";
                } else {
                    $error_message = "Error: " . $insert_sql . "<br>" . $conn->error;
                }
            }
        }

        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register form</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <div class="messages">
            <?php
            if (!empty($success_message)) {
                echo "<p class='success-message'>$success_message</p>";
            }
            if (!empty($error_message)) {
                echo "<p class='error-message'>$error_message</p>";
            }
            ?>
        </div>
        <form action="register.php" method="post">
            <h1>Signup</h1>

            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required autofocus>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt' ></i>
            </div>
            <div class="input-box">
                    <input type="password" name="confirm_password" placeholder="Confirm password" required>
                    <i class='bx bxs-lock-alt' ></i>
            </div>
            <div class="input-box">
                <input type="email" name="email" placeholder="Email" required>
                <i class='bx bxs-envelope'></i>
            </div>
            <button type="submit" name="submit" class="btn">Signup</button>
            <div class="register-link">
                <p>Already have an account? <a href="index.php" id="Login">Login</a></p>
            </div>
        </form>
    </div>
</body>
</html>
