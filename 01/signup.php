<?php
require 'header.php';
?>

<main>
  <div class="wrapper-main">
    <section class="section-default">
      <h1>Signup</h1>

      <?php
      if (isset($_GET['error'])) {
        if ($_GET['error'] == 'emptyinput') {
          echo '<p class="signuperror">Fill in all fields!</p>';
        } elseif ($_GET['error'] == 'invalidmail') {
          echo '<p class="signuperror">Invalid e-mail!</p>';
        } elseif ($_GET['error'] == 'invaliduid') {
          echo '<p class="signuperror">Invalid username!</p>';
        } elseif ($_GET['error'] == 'passwordcheck') {
          echo '<p class="signuperror">Your passwords do not match!</p>';
        } elseif ($_GET['error'] == 'usertaken') {
          echo '<p class="signuperror">Username is already taken!</p>';
        }
      } else if (isset($_GET['signup']) && $_GET['signup'] == 'success') {
        echo '<p class="signupsuccess">Signup successful!</p>';
      }

      ?>

      <form class="form-signup" action="includes/signup.inc.php" method="post">
        <input type="text" name="uid" placeholder="Username" value="<?= $_GET['uid'] ?? '' ?>">
        <input type="text" name="mail" placeholder="E-mail" value="<?= $_GET['mail'] ?? '' ?>">
        <input type="password" name="pwd" placeholder="Password">
        <input type="password" name="pwd-repeat" placeholder="Repeat password">
        <br>
        <button type="submit" name="signup-submit">Signup</button>
      </form>
    </section>
  </div>
</main>

<?php
require 'footer.php';
?>