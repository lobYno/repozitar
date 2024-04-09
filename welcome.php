<?php
session_start();

// Check if user is logged in, if not redirect to login page
if(!isset($_SESSION['valid']) || $_SESSION['valid'] !== true) {
    header("Location: index.php");
    exit();
}

$servername = "localhost";
$username = "hrachovsky";
$password = "password.00";
$dbname = "hrachovsky";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM t_football";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="welcome.css">
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
        <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Age</th>
                    <th>Position</th>
                    <th>Team</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['meno']."</td>";
                        echo "<td>".$row['vek']."</td>";
                        echo "<td>".$row['pozicia']."</td>";
                        echo "<td>".$row['tim']."</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="logout-link">
            <p><a href="logout.php">Logout</a></p>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
