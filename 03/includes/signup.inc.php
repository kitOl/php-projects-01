<?php

if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $username = $_POST['uid'];
  $pwd = $_POST['pwd'];
  $pwdRepeat = $_POST['pwdrepeat'];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  if (emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat)) {
    header("Location: ../signup.php?error=emptyinput");
    exit();
  }

  if (invalidUid($username)) {
    header("Location: ../signup.php?error=invaliduid");
    exit();
  }

  if (invalidEmail($email)) {
    header("Location: ../signup.php?error=invalidemail");
    exit();
  }

  if (pwdNotMatch($pwd, $pwdRepeat)) {
    header("Location: ../signup.php?error=pwdsnotmatch");
    exit();
  }

  if (uidExists($conn, $username, $email)) {
    header("Location: ../signup.php?error=usernametaken");
    exit();
  }

  createUser($conn, $name, $email, $username, $Pwd);
} else {
  header("Location: ../signup.php");
  exit();
}
