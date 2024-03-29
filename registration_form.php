<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register on Chirpify</title>
    <link rel="stylesheet" href="main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@500&display=swap" rel="stylesheet">

</head>

<div class="Twitter-nav">
                <a href="index.php"><img src=images/Twitter-logo.png height="40" width="56"/></a>
    <ul>
        <li><a href="tweets.php">chirps</a></li>
        <li><a href="registration_form.php">Register on Chirpify</a></li>
    </ul>
</div>

<body>

<h1>Register</h1>

<form action="registration.php" method="post">
    <label for="email">Email</label>
    <input type="text" id="email" name="email" required autofocus placeholder="email">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" required placeholder="e.g. John Doe">
    <label for="password">Password</label>
    <input type="password" id="password" required name="password" placeholder="password">
    <input type="submit" value="Register">
</form>
</body>
</html>