<?php
include_once 'header.php';
?>

<section class="signup-form">
  <h2>Log In</h2>
  <div class="signup-form-form">

    <form action="includes/login.inc.php" method="post">
      <input type="text" name="uid" placeholder="Username/E-mail...">
      <input type="password" name="pwd" placeholder="Password...">

      <button type="submit" name="submit">Log In</button>
    </form>
  </div>

  <?php
  if (isset($_GET['error'])) :
    if ($_GET['error'] == 'emptyinput') : ?>

      <p class="error">Fill in all fields!</p>

    <?php elseif ($_GET['error'] == 'wronglogin') : ?>

      <p class="error">Incorrect login information!</p>

  <?php endif;
  endif; ?>

</section>

<?php
include_once 'footer.php';
?>