<?php
include_once 'header.php';

include 'classes/dbh.classes.php';
include 'classes/profileinfo.classes.php';
include 'classes/profileinfo-contr.classes.php';
include 'classes/profileinfo-veiw.classes.php';

$profileInfo = new ProfileInfoView();

?>

<section class="profile">
  <div class="profile-bg">
    <div class="wrapper">
      <div class="profile-info">
        <div class="profile-info-img">
          <p>
            <?= $_SESSION['useruid'] ?>
          </p>
          <div class="break"></div>
          <a href="profilesettings.php" class="follow-btn">PROFILE SETTINGS</a>
        </div>
        <div class="profile-info-about">
          <h3>ABOUT</h3>
          <p>
            <?php $profileInfo->fetchAbout($_SESSION['userid']); ?>
          </p>
          <h3>FOLLOWERS</h3>
          <h3>FOLLOWERS</h3>
        </div>
      </div>
      <div class="profile-content">
        <div class="profile-intro">
          <h3>
            <?php $profileInfo->fetchTitle($_SESSION['userid']); ?>
          </h3>
          <p>
            <?php $profileInfo->fetchText($_SESSION['userid']); ?>
          </p>
          <br><br>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat earum expedita animi voluptate cum inventore? Voluptas explicabo est soluta. Non natus placeat sed laboriosam debitis ratione qui temporibus dolorem asperiores.
        </div>
        <div class="profile-posts">
          <h3>POSTS</h3>
          <div class="profile-post">
            <h2>IT IS A BUSY DAY IN TOWN</h2>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi molestiae vero rem! Quas facere a fugit, corrupti deleniti illo saepe quis voluptatum vel, distinctio eligendi, rem optio eveniet rerum quae!</p>
            <p>07:46 - 03/05/2024</p>
          </div>
          <div class="profile-post">
            <h2>IT IS A BUSY DAY IN TOWN</h2>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi molestiae vero rem! Quas facere a fugit, corrupti deleniti illo saepe quis voluptatum vel, distinctio eligendi, rem optio eveniet rerum quae!</p>
            <p>07:46 - 03/05/2024</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


</body>

</html>