<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Login OOP</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,regular,italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" />
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <header>
    <nav>
      <div>
        <h3>OLEG KITAEV</h3>
        <ul class="menu-main">
          <li><a href="index.php">Home</a></li>
          <li><a href="#">Products</a></li>
          <li><a href="#">Current Sales</a></li>
          <li><a href="#">Member+</a></li>
        </ul>
      </div>
      <ul class="menu-member">

        <?php if (!isset($_SESSION['userid'])) : ?>
          <li><a href="#">Sign Up</a></li>
          <li><a class="header-login-a" href="#">Login</a></li>

        <?php else : ?>
          <li><a href="#"><?= $_SESSION['useruid'] ?></a></li>
          <li><a href="includes/logout.inc.php" class="header-login-a">Logout</a></li>

        <?php endif; ?>
      </ul>
    </nav>
  </header>

  <section class="index-intro">
    <div class="index-intro-bg">
      <div class="wrapper">
        <div class="index-intro-c1">
          <div class="video"></div>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et temporibus doloribus quia ullam aliquam. Quo recusandae obcaecati ratione deserunt omnis. Temporibus porro nihil vitae eligendi, maxime sunt illo voluptatibus. Alias.</p>
        </div>
        <div class="index-intro-c2">
          <h2>We make <br>professional <br>gear</h2>
          <a href="#">Find our gear here</a>
        </div>
      </div>
    </div>
  </section>

  <section class="index-login">
    <div class="wrapper">
      <div class="index-login-signup">
        <h4>Sign Up</h4>
        <p>Don't have an account yet? Sign up here!</p>
        <form action="includes/signup.inc.php" method="post">
          <input type="text" name="uid" placeholder="Username">
          <input type="password" name="pwd" placeholder="Password">
          <input type="password" name="pwdrepeat" placeholder="Repeat Password">
          <input type="text" name="email" placeholder="E-mail">
          <br>
          <button type="submit" name="submit">Sing Up</button>
        </form>
      </div>
      <div class="index-login-login">
        <h4>Login</h4>
        <p>Already registered? Login here!</p>
        <form action="includes/login.inc.php" method="post">
          <input type="text" name="uid" placeholder="Username">
          <input type="password" name="pwd" placeholder="Password">
          <br>
          <button type="submit" name="submit">Login</button>
        </form>
      </div>
    </div>
  </section>

</body>

</html>