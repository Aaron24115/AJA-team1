<?php
session_start();
require_once "conn.php";

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the new username from the form
    $new_username = $_POST["new_username"];

    // Validate the new username
    if (empty($new_username)) {
        $error = "Please enter a new username";
    } else {
        // Update the user's username in the database
        $update_username = $conn->prepare("UPDATE account SET username = :username WHERE id = :user_id");
        $update_username->bindParam(":username", $new_username);
        $update_username->bindParam(":user_id", $_SESSION["user_id"]);
        $update_username->execute();

        // Update the session variable with the new username
        $_SESSION["username"] = $new_username;

        // Redirect to the homepage with a success message
        header("Location: index.php?message=Username%20updated%20successfully");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chirpify - Settings</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<div class="Twitter-nav">
    <a href="index.php"><img src="images/Twitter-logo.png" height="40" width="56"/></a>
    <ul>
        <li><a href="tweets.php">Chirps</a></li>
        <li><a href="settings.php">Settings</a></li>
        <?php if (!isset($_SESSION["username"])) { ?>
            <li><a href="registration_form.php">Register on Chirpify</a></li>
        <?php } ?>
    </ul>
</div>

<h1>Settings</h1>

<?php if (isset($error)) { ?>
    <div class="error"><?php echo $error; ?></div>
<?php } ?>

<form method="post">
    <label for="new_username">New username:</label>
    <input type="text" name="new_username" id="new_username" value="<?php echo $_SESSION["username"]; ?>">
    <button type="submit">Update</button>
</form>

</body>
</html>