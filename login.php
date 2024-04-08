<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOGIN</title>
  <link rel="stylesheet" href="css/style.css" class="css">
</head>
<body>
  <form action="loginAction.php" method="POST">
    <h2>Login</h2>
    <?php if(isset($_POST['error'])) { ?>
      <p class="error"><?php echo $_POST['error']; ?></p>
    <?php } ?>
    <label>Username</label>
    <input type="text" name="uName" placeholder="Username">
    <label>Password</label>
    <input type="password" name="password" placeholder="Password">

    <button type="submit">Login</button>
    
  </form>
</body>
</html>