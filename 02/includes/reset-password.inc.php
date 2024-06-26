<?php

if (isset($_POST['reset-password-submit'])) {

  $selector = $_POST['selector'];
  $validator = $_POST['validator'];
  $password = $_POST['pwd'];
  $passwordRepeat = $_POST['pwd-repeat'];

  if (empty($password) || empty($passwordRepeat)) {
    header("Location: ../create-new-password.php?newpwd=empty");
    exit();
  } else if ($password != $passwordRepeat) {
    header("Location: ../create-new-password.php?newpwd=pwdnotsame");
    exit();
  }

  $currentDate = date('U');

  require 'dbh.inc.php';

  $sql = "SELECT * FROM pwdReset WHERE selector = ? AND expires >= ?;";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "There was an error!";
    exit();
  } else {

    mysqli_stmt_bind_param($stmt, 'ss', $selector, $currentDate);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (!$row = mysqli_fetch_assoc($result)) {
      echo "You need to re-submit your reset request.";

      header("Location: ../reset-password.php?error=errorsql");
      exit();
    } else {

      $tokenBin = hex2bin($validator);
      $tokenCheck = password_verify($tokenBin, $row['token']);

      if (!$tokenCheck) {
        echo "You need to re-submit your reset request.";
        exit();
      } else {

        $tokenEmail = $row['email'];

        $sql = "SELECT * FROM users WHERE email = ?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
          echo "There was an error!";
          exit();
        } else {
          mysqli_stmt_bind_param($stmt, 's', $tokenEmail);
          mysqli_stmt_execute($stmt);

          $result = mysqli_stmt_get_result($stmt);

          if (!$row = mysqli_fetch_assoc($result)) {
            echo "There was an error!";
            exit();
          } else {

            $sql = "UPDATE users SET pwd = ? WHERE email = ?;";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo "There was an error!";
              exit();
            } else {

              $newPwdHash = password_hash($password, PASSWORD_DEFAULT);

              mysqli_stmt_bind_param($stmt, 'ss', $newPwdHash, $tokenEmail);
              mysqli_stmt_execute($stmt);

              $sql = "DELETE FROM pwdReset WHERE email = ?;";
              $stmt = mysqli_stmt_init($conn);

              if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "There was an error!";
                exit();
              } else {

                mysqli_stmt_bind_param($stmt, 's', $tokenEmail);
                mysqli_stmt_execute($stmt);

                header("Location: ../signup.php?newpwd=passwordupdated");
                exit();
              }
            }
          }
        }
      }
    }
  }
} else {
  header("Location: ../index.php");
  exit();
}
