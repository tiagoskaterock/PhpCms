<?php define('TITLE', 'Contact') ?>

<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
<?php  include "includes/navigation.php"; ?>

<!-- Page Content -->
<div class="container">

  <section id="login">
    <div class="container">
      <div class="row">
        <div class="col-xs-6 col-xs-offset-3">
          <div class="form-wrap">
            <h1 class="text-center">Contact</h1>
            <form role="form" action="mail.php" method="post" id="login-form" autocomplete="off">

              <div class="form-group">
                <label for="email" class="sr-only">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" required title="email">
              </div>

              <div class="form-group">
                <label for="subject" class="sr-only">Subject</label>
                <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject of the message here" required title="subject">
              </div>

              <div class="form-group">
                <label for="message" class="sr-only">Message</label>
                <textarea type="text" name="message" id="message" class="form-control"  required title="message" placeholder="Enter your message here" style="resize: none;"></textarea>
              </div>

              <input type="submit" name="submit" id="btn-login" class="btn btn-primary btn-md btn-block" value="Submit Message">
            </form>

          </div>
        </div> <!-- /.col-xs-12 -->
      </div> <!-- /.row -->
    </div> <!-- /.container -->
  </section>

  <hr>

<?php include "includes/footer.php" ?>