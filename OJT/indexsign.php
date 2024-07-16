<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="icon" href="Sign.ico" type="image/gif" sizes="16x16" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Samplehaha</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css?family=Inter" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href="css/loginv2.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap"
      rel="stylesheet"
    />
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>

<img class="wave" src="images/red.jpg" />

    <div class="container">
      <div class="img">
        <img src="images/PFPV2.PNG" />
      </div>

      <div class="login-content">
        <form action="signup.php" method="post">
          <img src="images/SANTAROSA.png" />
          <h2 class="title"></h2>
          <?php if (isset($_GET['error'])) { ?>
              <p class="error"><?php echo $_GET['error']; ?></p>
          <?php } ?>
          <h3>SIGN UP</h3>
          
          <div class="input-div one">
            <div class="i">
              <i class="fas fa-user"></i>
            </div>

            <div class="div">
              <h5>Username</h5>
              <input type="text" class="input" id="username" name="uname" />
            </div>
          </div>

          <div class="input-div pass">
            <div class="i">
              <i class="fas fa-lock"></i>
            </div>

            <div class="div">
              <h5>Password</h5>
              <input
                type="password"
                class="input"
                id="password"
                name="password"
              />
            </div>
          </div>

          <div class="input-div confirmpass">
            <div class="i">
              <i class="fas fa-lock"></i>
            </div>

            <div class="div">
              <h5>Confirm Password</h5>
              <input
                type="password"
                class="input"
                id="confirmpass"
                name="confirmpass"
              />
            </div>
          </div>

          <input type="submit" class="btn" value="Sign Up" />
          <a href="index.php" class="btn-nodesign">Go back</a>
        </form>
      </div>
    </div>



  <?php
  if (isset($_GET['page']) && $_GET['page'] == 'signup') { // Check if user is on signup page
  ?>
    <a href="index.php" class="btn btn-secondary" style="position: absolute; top: 10px; right: 10px;">Back to Login</a>
  <?php
  }
  ?>
   <script type="text/javascript" src="js/loginv2.js"></script>
  </body>
</html>

