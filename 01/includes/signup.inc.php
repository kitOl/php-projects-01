<?php

if (isset($_POST['signup-submit'])) {

  require 'dbh.inc.php';

  $username = $_POST['uid'];
  $email = $_POST['mail'];
  $password = $_POST['pwd'];
  $passwordRepeat = $_POST['pwd-repeat'];

  if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
    header("Location: ../signup.php?error=emptyinput&uid=$username&mail=$email");
    exit();
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?error=invalidmail&uid=$username");
    exit();
  } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../signup.php?error=invaliduid&mail=$email");
    exit();
  } elseif ($password !== $passwordRepeat) {
    header("Location: ../signup.php?error=passwordcheck&uid=$username&mail=$email");
    exit();
  } else {

    $sql = "SELECT uid FROM users WHERE uid = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../signup.php?error=sqlerror");
      exit();
    } else {
      mysqli_stmt_bind_param($stmt, 's', $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);

      $result = mysqli_stmt_num_rows($stmt);

      if ($result > 0) {
        header("Location: ../signup.php?error=usertaken&mail=$email");
        exit();
      } else {

        $sql = "INSERT INTO users (uid, email, pwd) VALUES (?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../signup.php?error=sqlerror");
          exit();
        } else {

          $hashPwd = password_hash($password, PASSWORD_DEFAULT);

          mysqli_stmt_bind_param($stmt, 'sss', $username, $email, $hashPwd);
          mysqli_stmt_execute($stmt);

          header("Location: ../signup.php?signup=success");
          exit();
        }
      }
    }
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);
} else {
  header("Location: ../signup.php");
  exit();
}
