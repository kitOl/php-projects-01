<?php

if (isset($_POST['login-submit'])) {

  require 'dbh.inc.php';

  $mailuid = $_POST['mailuid'];
  $password = $_POST['pwd'];

  if (empty($mailuid) || empty($password)) {
    header("Location: ../index.php?error=emptyinput");
    exit();
  } else {
    $sql = "SELECT * FROM users WHERE uid = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../index.php?error=sqlerror");
      exit();
    } else {

      mysqli_stmt_bind_param($stmt, 'ss', $mailuid, $mailuid);
      mysqli_stmt_execute($stmt);

      $result = mysqli_stmt_get_result($stmt);

      if ($row = mysqli_fetch_assoc($result)) {

        $pwdCheck = password_verify($password, $row['pwd']);

        if (!$pwdCheck) {
          header("Location: ../index.php?error=wrongpwd");
          exit();
        } else {

          session_start();
          $_SESSION['userId'] = $row['id'];
          $_SESSION['userUid'] = $row['uid'];

          header("Location: ../index.php?login=success");
          exit();
        }
      } else {
        header("Location: ../index.php?error=nouser");
        exit();
      }
    }
  }
} else {
  header("Location: ../index.php");
  exit();
}
