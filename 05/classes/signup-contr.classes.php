<?php

class SignupContr extends Signup
{
  private $uid;
  private $pwd;
  private $pwdRepeat;
  private $email;

  public function __construct($uid, $pwd, $pwdRepeat, $email)
  {
    $this->uid = $uid;
    $this->pwd = $pwd;
    $this->pwdRepeat = $pwdRepeat;
    $this->email = $email;
  }

  public function signupUser()
  {
    if ($this->emptyInput()) {
      header("Location: ../index.php?error=emptyinput");
      exit();
    }

    if ($this->invalidUid()) {
      header("Location: ../index.php?error=username");
      exit();
    }

    if ($this->invalidEmail()) {
      header("Location: ../index.php?error=email");
      exit();
    }

    if ($this->pwdNotMatch()) {
      header("Location: ../index.php?error=passwordsdontmatch");
      exit();
    }

    if ($this->uidTakenCheck()) {
      header("Location: ../index.php?error=useroremailtaken");
      exit();
    }

    parent::setUser($this->uid, $this->pwd, $this->email);
  }

  private function emptyInput()
  {
    return empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email);
  }

  private function invalidUid()
  {
    return !preg_match("/^[a-zA-Z0-9]*$/", $this->uid);
  }

  private function invalidEmail()
  {
    return !filter_var($this->email, FILTER_VALIDATE_EMAIL);
  }

  private function pwdNotMatch()
  {
    return $this->pwd !== $this->pwdRepeat;
  }

  private function uidTakenCheck()
  {
    parent::checkUser($this->uid, $this->email);
  }

  public function fetchUserId($uid)
  {
    $userId = parent::getUserId($uid);
    return $userId[0]['id'];
  }
}
