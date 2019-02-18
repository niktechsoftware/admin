<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log In &middot; JMDF</title>
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
        <a class="login-brand" href="<?= base_url() ?>">
          <img class="img-responsive" src="<?= base_url(); ?>assets/img/logo.svg" alt="Elephant">
        </a>
        <div class="login-form">
          <form data-toggle="validator" method="post" action="<?= base_url() ?>index.php/login/authentication">
            <div class="form-group">
              <label for="username">Username</label>
              <input id="username" class="form-control" type="text" name="username" spellcheck="false" autocomplete="off" data-msg-required="Please enter your username." required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input id="password" class="form-control" type="password" name="password" minlength="6" data-msg-minlength="Password must be 6 characters or more." data-msg-required="Please enter your password." required>
            </div>
            <div class="form-group">
                <?php if(!$this->session->flashdata('isAuth')): ?>
                    <strong class="text-danger">Wrong userID or password.</strong>
                <?php endif; ?>
              <a href="<?= base_url() ?>login/forget.html">Forgot password?</a>
            </div>
            <button class="btn btn-primary btn-block" type="submit">Sign in</button>
          </form>
        </div>
      </div>
    </div>
    <script src="<?= base_url(); ?>assets/js/vendor.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/elephant.min.js"></script>
  </body>

</html>