<?php
include_once 'header.php';
?>

<section class="signup-form">
  <h2>Sign Up</h2>
  <div class="signup-form-form">

    <form action="includes/signup.inc.php" method="post">
      <input type="text" name="name" placeholder="Full name...">
      <input type="text" name="email" placeholder="Email...">
      <input type="text" name="uid" placeholder="Username...">
      <input type="password" name="pwd" placeholder="Password...">
      <input type="password" name="pwdrepeat" placeholder="Repeat password...">

      <button type="submit" name="submit">Sing up</button>
    </form>
  </div>

  <?php
  if (isset($_GET['error'])) :
    if ($_GET['error'] == 'emptyinput') : ?>

      <p class="error">Fill in all fields!</p>

    <?php elseif ($_GET['error'] == 'invaliduid') : ?>

      <p class="error">Choose a proper username!</p>

    <?php elseif ($_GET['error'] == 'invalidemail') : ?>

      <p class="error">Choose a proper email!</p>

    <?php elseif ($_GET['error'] == 'pwdsnotmatch') : ?>

      <p class="error">Passwords doesn't match!</p>

    <?php elseif ($_GET['error'] == 'stmtfailed') : ?>

      <p class="error">Something went wrong, try again!</p>

    <?php elseif ($_GET['error'] == 'usernametaken') : ?>

      <p class="error">Username already taken!</p>

    <?php elseif ($_GET['error'] == 'none') : ?>

      <p class="success">You have signed up!</p>

  <?php endif;
  endif; ?>

</section>

<?php
include_once 'footer.php';
?>