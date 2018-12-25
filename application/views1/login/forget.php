<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log In &middot; Easy School</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <meta name="description" content="<?= $this->lang->line('description'); ?>">
    <meta property="og:url" content="<?= $this->lang->line('og_url'); ?>">
    <meta property="og:type" content="<?= $this->lang->line('og_type'); ?>">
    <meta property="og:title" content="<?= $this->lang->line('og_title'); ?>">
    <meta property="og:description" content="<?= $this->lang->line('og_description'); ?>">
    
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="manifest.json">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#f7a033">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/vendor.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/elephant.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/login-2.min.css">
  </head>
  <body>
    <div class="login">
      <div class="login-body">
        <a class="login-brand" href="index-2.html">
          <img class="img-responsive" src="<?= base_url(); ?>assets/img/logo.svg" alt="Elephant">
        </a>
        <div class="login-form">
          <form data-toggle="validator">
            <div class="form-group">
              <label for="email">Email</label>
              <input id="email" class="form-control" type="email" name="email" spellcheck="false" autocomplete="off" data-msg-required="Please enter your email address." required>
              <p class="help-block">
                <small>If you've forgotten your password, we'll send you an email to reset your password.</small>
              </p>
            </div>
            <button class="btn btn-primary btn-block" type="submit">Send password reset email</button>
          </form>
        </div>
      </div>
      <div class="login-footer">
        Don't have an account? <a href="<?= base_url() ?>login/register.html">Sign Up</a>
      </div>
    </div>
    <script src="<?= base_url(); ?>assets/js/vendor.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/elephant.min.js"></script>
  </body>

</html>