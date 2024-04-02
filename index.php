<?php
session_start();
$error_message = '';

if (isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    $servername = "localhost";
    $username = "hrachovsky";
    $password = "password.00";
    $dbname = "hrachovsky";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        $error_message = "<p class='error-message'>Connection failed: " . $conn->connect_error . "</p>";
    } else {
        $sql = "SELECT * FROM t_user WHERE meno = '" . $_POST['username'] . "'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($_POST['password'], $row["heslo"])) {
                $_SESSION['valid'] = true;
                $_SESSION['timeout'] = time();
                $_SESSION['username'] = $_POST['username'];

                header("Location: welcome.php");
                exit();
            } else {
                $error_message = "<p class='error-message'>Wrong password</p>";
            }
        } else {
            $error_message = "<p class='error-message'>User not found</p>";
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
    <title>Login form</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<div class="wrapper">
    <?php
        echo $error_message; 
    ?>
    <form action="index.php" method="post">
        <h1>Login</h1>
        <div class="input-box">
            <input type="text" name="username" placeholder="Username" required autofocus>
            <i class='bx bxs-user'></i>
        </div>
        <div class="input-box">
            <input type="password" name="password" placeholder="Password" required>
            <i class='bx bxs-lock-alt' ></i>
        </div>
        <button type="submit" name="submit" class="btn">Login</button>
        <div class="register-link">
            <p>Don't have an account? <a href="register.php" id="Register">Register</a></p>
        </div>
    </form>
</div>
</body>
</html>
