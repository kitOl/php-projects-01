<?php
require 'header.php';
?>

<main>
  <div class="wrapper-main">
    <section class="section-default">
      <h1>Create new your password</h1>
      <?php
      if (isset($_GET['selector'])) $selector = $_GET['selector'];
      if (isset($_GET['validator'])) $validator = $_GET['validator'];

      if (empty($selector) || empty($validator)) {
        echo "Could not validate your request!";
      } else {
        if (ctype_xdigit($selector) && ctype_xdigit($validator)) {
      ?>

          <form action="includes/reset-password.inc.php" method="post">
            <input type="hidden" name="selector" value="<?= $selector ?? '' ?>">
            <input type="hidden" name="validator" value="<?= $validator ?? '' ?>">
            <input type="password" name="pwd" placeholder="Enter a new password...">
            <input type="password" name="pwd-repeat" placeholder="Repeat new password...">

            <br>
            <button type="submit" name="reset-password-submit">Reset password</button>
          </form>

      <?php
        }
      }
      ?>
    </section>
  </div>
</main>

<?php
require 'footer.php';
?>