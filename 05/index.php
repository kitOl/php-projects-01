<?php
include_once 'header.php';
?>

<section class="index-intro">
  <div class="index-intro-bg">
    <div class="wrapper">
      <div class="index-intro-c1">
        <div class="video"></div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et temporibus doloribus quia ullam aliquam. Quo recusandae obcaecati ratione deserunt omnis. Temporibus porro nihil vitae eligendi, maxime sunt illo voluptatibus. Alias.</p>
      </div>
      <div class="index-intro-c2">
        <h2>We make <br>professional <br>gear</h2>
        <a href="#">Find our gear here</a>
      </div>
    </div>
  </div>
</section>

<section class="index-login">
  <div class="wrapper">
    <div class="index-login-signup">
      <h4>Sign Up</h4>
      <p>Don't have an account yet? Sign up here!</p>
      <form action="includes/signup.inc.php" method="post">
        <input type="text" name="uid" placeholder="Username">
        <input type="password" name="pwd" placeholder="Password">
        <input type="password" name="pwdrepeat" placeholder="Repeat Password">
        <input type="text" name="email" placeholder="E-mail">
        <br>
        <button type="submit" name="submit">Sing Up</button>
      </form>
    </div>
    <div class="index-login-login">
      <h4>Login</h4>
      <p>Already registered? Login here!</p>
      <form action="includes/login.inc.php" method="post">
        <input type="text" name="uid" placeholder="Username">
        <input type="password" name="pwd" placeholder="Password">
        <br>
        <button type="submit" name="submit">Login</button>
      </form>
    </div>
  </div>
</section>

</body>

</html>