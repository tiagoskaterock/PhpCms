<?php

if (isset($_POST['email'])) {
  $email = $_POST['email'];
  $to = 'site@email.com';
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  echo "<pre>";
  print_r($_POST);
  echo "</pre>";

}

?>

<h2 style="text-align: center;">Please configure your email credentials to send emails. You can use PHP Mailer, for example to do that. =)
</h2>