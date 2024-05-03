<?php

class Login extends Dbh
{
  protected function getUser($uid, $pwd)
  {
    $sql = "SELECT pwd FROM users WHERE uid = ? OR email = ?;";
    $stmt = $this->connect()->prepare($sql);

    if (!$stmt->execute([$uid, $uid])) {
      $stmt = null;
      header("Location: ../index.php?error=stmtfailed");
      exit();
    }

    if ($stmt->rowCount() == 0) {
      $stmt = null;
      header("Location: ../index.php?error=usernotfound");
      exit();
    }

    $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!password_verify($pwd, $pwdHashed[0]['pwd'])) {
      $stmt = null;
      header("Location: ../index.php?error=wrongpassword");
      exit();
    }

    $sql = "SELECT * FROM users WHERE uid = ? OR email = ? AND pwd = ?;";
    $stmt = $this->connect()->prepare($sql);

    if (!$stmt->execute([$uid, $uid, $pwd])) {
      $stmt = null;
      header("Location: ../index.php?error=stmtfailed");
      exit();
    }

    if ($stmt->rowCount() == 0) {
      $stmt = null;
      header("Location: ../index.php?error=usernotfound");
      exit();
    }

    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

    session_start();

    $_SESSION['userid'] = $user[0]['id'];
    $_SESSION['useruid'] = $user[0]['uid'];

    header("Location: ../index.php?login=success");
    exit();
  }
}
