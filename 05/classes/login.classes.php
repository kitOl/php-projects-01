<?php

class Login extends Dbh
{
  protected function getUser($uid, $pwd)
  {
    $sql = "SELECT * FROM users WHERE uid = ? OR email = ?;";
    $stmt = $this->connect()->prepare($sql);

    if (!$stmt->execute([$uid, $uid])) {
      $stmt = null;
      header("Location: ../index.php?error=stmtfailed");
      exit();
    }

    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($user) == 0) {
      $stmt = null;
      header("Location: ../index.php?error=usernotfound");
      exit();
    }

    $pwdHashed = $user[0]['pwd'];

    if (!password_verify($pwd, $pwdHashed)) {
      $stmt = null;
      header("Location: ../index.php?error=wrongpassword");
      exit();
    }

    session_start();

    $_SESSION['userid'] = $user[0]['id'];
    $_SESSION['useruid'] = $user[0]['uid'];

    header("Location: ../index.php?login=success");
    exit();
  }
}
