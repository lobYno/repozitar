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

$sort_by = "id";
$order = "ASC";

if(isset($_GET['sort_by'])) {
    $sort_by = $_GET['sort_by'];
    $order = $_GET['order'];
}

$sql = "SELECT t_football.id, t_football.meno, t_football.vek, t_football.tim, t_categories.name AS category_name
        FROM t_football
        LEFT JOIN t_categories ON t_football.pozicia = t_categories.id
        ORDER BY $sort_by $order";
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

        <form class="sorting-form" method="GET" action="">
            <div>
                <label for="sort_by">Sort By:</label>
                <select name="sort_by" id="sort_by">
                    <option value="id">ID</option>
                    <option value="meno">Name</option>
                    <option value="vek">Age</option>
                    <option value="tim">Team</option>
                    <option value="category_name">Category</option>
                </select>
            </div>
            <div>
                <label for="order">Order:</label>
                <select name="order" id="order">
                    <option value="ASC">Ascending</option>
                    <option value="DESC">Descending</option>
                </select>
            </div>
            <button type="submit">Sort</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Team</th>
                    <th>Category</th>
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
                        echo "<td>".$row['tim']."</td>";
                        echo "<td>".$row['category_name']."</td>";
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
