<?php

class ProfileInfo extends Dbh
{
  protected function getProfileInfo($userId)
  {
    $sql = "SELECT * FROM profiles WHERE users_id = ?;";
    $stmt = $this->connect()->prepare($sql);

    if (!$stmt->execute([$userId])) {
      $stmt = null;
      header("Location: ../profile.php?error=stmtfailed");
      exit();
    }

    if ($stmt->rowCount() == 0) {
      $stmt = null;
      header("Location: ../profile.php?error=profilenotfound");
      exit();
    }

    return $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  protected function setProfileInfo($profileAbout, $profileTitle, $profileText, $userId)
  {
    $sql = "INSERT INTO profiles (about, introtitle, introtext, users_id) VALUES (?, ?, ?, ?);";
    $stmt = $this->connect()->prepare($sql);

    if (!$stmt->execute([$profileAbout, $profileTitle, $profileText, $userId])) {
      $stmt = null;
      header("Location: ../profile.php?error=stmtfailed");
      exit();
    }

    $stmt = null;
  }

  protected function setNewProfileInfo($profileAbout, $profileTitle, $profileText, $userId)
  {
    $sql = "UPDATE profiles SET about = ?, introtitle = ?, introtext = ? WHERE users_id = ?;";
    $stmt = $this->connect()->prepare($sql);

    if (!$stmt->execute([$profileAbout, $profileTitle, $profileText, $userId])) {
      $stmt = null;
      header("Location: ../profile.php?error=stmtfailed");
      exit();
    }

    $stmt = null;
  }
}
