<?php
require 'header.php';
?>

<main>
  <div class="wrapper-main">
    <section class="section-default">
      <h1>Reset your password</h1>

      <?php
      if (isset($_GET['reset'])) :
        if ($_GET['reset'] == 'success') : ?>

          <p class="signupsuccess">A message with a link to update the password <br>has been sent. <br>Check your e-mail!</p>

        <?php elseif ($_GET['reset'] == 'erroremailing') :
        ?>

          <p class="signuperror">Error emailing!</p>

        <?php endif;
      else : ?>


        <p>An e-mail will be send to you with instructions <br> on how to reset your password.</p>
        <form action="includes/reset-request.inc.php" method="post">
          <input type="text" name="email" placeholder="Enter your e-mail address...">
          <button type="submit" name="reset-request-submit">Reseive new password by e-mail</button>
        </form>


      <?php endif; ?>

    </section>
  </div>
</main>

<?php
require 'footer.php';
?>