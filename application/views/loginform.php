<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
</head>

<body>

  <h2>Login Form</h2>
  <?php echo isset($error) ? $error : ''; ?>
  <form action="<?php echo base_url(); ?>index.php/Login/process" method="post">
    <div class="imgcontainer">
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="user"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="user" required>

      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="pass" required>

      <button type="submit">Login</button>
    </div>
  </form>
</body>

</html>