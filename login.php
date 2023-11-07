<?php
// Initialize variables to store user input
$signupUsername = $signupPassword = $loginUsername = $loginPassword = "";
$showLoginForm = false; // Variable to control when to show the login form

// Check if the form has been submitted for signing up
if (isset($_POST["signup"])) {
    $signupUsername = $_POST["signupUsername"];
    $signupPassword = $_POST["signupPassword"];
    
    // Append the new user data to a file
    $userData = "$signupUsername:$signupPassword\n";
    file_put_contents("data.txt", $userData, FILE_APPEND);
    
    // Display the login form after signing up
    $showLoginForm = true;
}

// Check if the form has been submitted for logging in
if (isset($_POST["login"])) {
    $loginUsername = $_POST["loginUsername"];
    $loginPassword = $_POST["loginPassword"];
    
    // Read user data from the file
    $fileData = file_get_contents("data.txt");
    
    // Split the file data into an array of lines
    $lines = explode("\n", $fileData);
    
    // Loop through the lines to check for a match
    foreach ($lines as $line) {
        list($storedUsername, $storedPassword) = explode(":", $line);
        if ($loginUsername === $storedUsername && $loginPassword === $storedPassword) {
            $loggedIn = true;
            break; // Exit the loop if a match is found
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
        <style>
        p {
            width: 100%;
            text-align: center;
            background-color: greenyellow;
        }
    </style>
    <title>Simple Login System</title>
</head>
<body>
    <?php if ($loggedIn) : ?>
        <p>You are logged in!</p>
    <?php elseif ($showLoginForm) : ?>
        <h2>Login</h2>
        <form method="post">
            <input type="hidden" name="login" value="1">
            <label for="loginUsername">Username:</label>
            <input type="text" id="loginUsername" name="loginUsername" value="<?php echo $loginUsername; ?>"><br>

            <label for="loginPassword">Password:</label>
            <input type="password" id="loginPassword" name="loginPassword"><br>

            <input type="submit" value="Login">
        </form>
    <?php else : ?>
        <h2>Sign Up</h2>
        <form method="post">
            <input type="hidden" name="signup" value="1">
            <label for="signupUsername">Username:</label>
            <input type="text" id="signupUsername" name="signupUsername" value="<?php echo $signupUsername; ?>"><br>

            <label for "signupPassword">Password:</label>
            <input type="password" id="signupPassword" name="signupPassword"><br>

            <input type="submit" value="Sign Up">
        </form>
    <?php endif; ?>
</body>
</html>
