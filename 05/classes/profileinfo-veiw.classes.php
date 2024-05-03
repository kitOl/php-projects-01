<?php

class ProfileInfoView extends ProfileInfo
{
  public function fetchAbout($userId)
  {
    $profileInfo = parent::getProfileInfo($userId);

    echo $profileInfo[0]['about'];
  }

  public function fetchTitle($userId)
  {
    $profileInfo = parent::getProfileInfo($userId);

    echo $profileInfo[0]['introtitle'];
  }

  public function fetchText($userId)
  {
    $profileInfo = parent::getProfileInfo($userId);

    echo $profileInfo[0]['introtext'];
  }
}
