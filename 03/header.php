<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Login</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,regular,italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" />
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <nav>
    <div class="wrapper">
      <a class="nav-logo" href="index.php">LOGO</a>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="discover.php">About us</a></li>
        <li><a href="blog.php">Find Blogs</a></li>

        <?php if (isset($_SESSION['userid'])) : ?>

          <li><a href="profile.php">Profile page</a></li>
          <li><a href="includes/logout.inc.php">Log out</a></li>

        <?php else : ?>

          <li><a href="signup.php">Sign up</a></li>
          <li><a href="login.php">Log in</a></li>

        <?php endif; ?>

      </ul>
    </div>
  </nav>

  <div class="wrapper">