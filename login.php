<?php
    
if (!session_id()) {
    session_start();
}

require 'sanitize.php';
// Save any value in $_GET['url'] that was passed into this in a session
// variable we will call targetURL
$url = sanitizeString(INPUT_GET, 'url');

if (isset($url)) {
    // persist the passed-in url that was set in authenticate.php
    $_SESSION['targetURL'] = $url;
} else {
    // nothing was passed via $_GET['url'] or value was sanitized away
    $_SESSION['targetURL'] = 'index.php';
}


// If the login form has been submitted, try to authenticate
// the user based on our DB users table
//
$clickIt = sanitizeString(INPUT_POST, 'clickIt');

if (isset($clickIt)) {
    
    // process the form data
    //
    // acquire the username and password from the form
    $email = trim(sanitizeString(INPUT_POST, 'email'));
    $pWord = trim(sanitizeString(INPUT_POST, 'password'));
    
    //echo "<h2>\$uName = $uName *** \$pWord = $pWord</h2>";
    
    if ($email == "" || $pWord == "") {
        echo "<h3 style=\"color:red\">Please enter both a username and password</h3>\n";
    } else {  // we have a username and password to check
        
        require 'dbConnect.php';
        require 'callQuery.php';
        
        $query = "SELECT password FROM users
                  WHERE email = '$email'";

        $errorMsg = 'Error fetching user account info';

        $password = callQuery($pdo, $query, $errorMsg)->fetchColumn();

        //echo "<h1>\$passWord = $passWord</h1>";

        // Check if we have a password match.  To do this
        // we must decrypt the password string from the DB
        // users table.
        if (password_verify($pWord, $password)) {

            // Authenticate the user since we have a match
            // by setting the Session 'authenticated' variable
            // to true.
            $_SESSION['authenticated'] = true;
            header("Location: $_SESSION[targetURL]");


        } else {  // passwords do NOT match
            echo "<h3 style=\"color: red\">Invalid credentials</h3>\n";
        }
        
    }
    
} else {  // login form not submitted
    
    $logOut = sanitizeString(INPUT_GET, 'logOut');
    
    // check if user wishes to log out
    if (isset($logOut) && $logOut == 1) {
        // log the user out by de-authenticating them
        unset($_SESSION['authenticated']);
    }
    
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ResumesRUs Login Page</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <h2 id="myh2">Please login to make your resume!</h2>
        
        <form action="" method="post">
            <label for="userName">Username:</label>
            <input type="text" placeholder="Email" name="email" id="email">
            <br><br>
            
            <label for="password">Password:</label>
            <input type="password" placeholder="Password" name="password" id="password">
            <br><br>
            
            <input type="submit" name="clickIt" value="Log In">
            <a href="signup.php"><input type="button" name="signUp" value="Sign Up"></a>
        </form>
    </body>
</html>