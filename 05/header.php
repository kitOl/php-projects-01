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
          <li><a href="profile.php"><?= $_SESSION['useruid'] ?></a></li>
          <li><a href="includes/logout.inc.php" class="header-login-a">Logout</a></li>

        <?php endif; ?>
      </ul>
    </nav>
  </header>