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

<h2>Upload a chirp</h2>

<form action="link_tweet_database.php" method="post">
    <label for="chirp">Write down your chirp</label>
    <input type="text" id="chirp" name="chirp" required autofocus placeholder="chirp (max. 150 characters)">
    <input type="submit" name="submit-tweet" value="Register">
</form>

</body>
</html>