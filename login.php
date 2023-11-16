<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login Form</title> 
    <link rel="stylesheet" href="src/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  </head>
  <body>
  
    <?php
    if (isset($_SESSION['errors']) && count($_SESSION['errors']) > 0) {
        $errorMessages = json_encode($_SESSION['errors']);
        unset($_SESSION['errors']);
        ?>
        <script>
            var errors = JSON.parse('<?php echo $errorMessages; ?>');
            
            alert('Errors:\n' + errors.join('\n'));
        </script>
    <?php } ?>

    <div class="container" id="login-form">

      <div class="wrapper">
        <div class="title"><span>Login Form</span></div>
        <form method="POST" action="queries/login/handle_login.php" >
            <div class="row">
                <i class="fas fa-user"></i>
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="row">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="row button">
                <input type="submit" value="Login">
            </div>
        </form>
      </div>
    </div>

  </body>
</html>