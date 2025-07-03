<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$settings["site_name"]?></title>
    <link href="/css/admin/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/8dc6670d84.js" crossorigin="anonymous"></script>
    <style>
      body {
        background: linear-gradient(135deg, #e0e7ff 0%, #f8fafc 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .login-card {
        box-shadow: 0 4px 24px rgba(0,0,0,0.08), 0 1.5px 4px rgba(0,0,0,0.08);
        border-radius: 16px;
        padding: 40px 32px 32px 32px;
        background: #fff;
        max-width: 400px;
        width: 100%;
        margin: 40px auto;
      }
      .login-card .logo {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 24px;
      }
      .login-card .logo i {
        font-size: 48px;
        color: #6366f1;
        margin-bottom: 8px;
      }
      .login-card .logo span {
        font-size: 1.5em;
        font-weight: bold;
        color: #22223b;
      }
      .login-card .form-group label {
        font-weight: 500;
      }
      .login-card .btn-primary {
        background: #6366f1;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        transition: background 0.2s;
      }
      .login-card .btn-primary:hover {
        background: #4f46e5;
      }
      .g-recaptcha {
        margin-bottom: 16px;
      }
      @media (max-width: 767px) {
        .login-card {
          padding: 20px 8px 16px 8px;
          max-width: 98vw;
        }
        .login-card .logo span {
          font-size: 1.1em;
        }
      }
    </style>
  </head>
  <body>
    <div class="login-card">
      <div class="logo">
        <i class="fa fa-user-circle"></i>
        <span><?=$settings["site_name"]?></span>
      </div>
      <?php if( $success ): ?>
        <div class="alert alert-success "><?php echo $successText; ?></div>
      <?php endif; ?>
      <?php if( $error ): ?>
        <div class="alert alert-danger "><?php echo $errorText; ?></div>
      <?php endif; ?>
      <form id="yw0" action="" method="post">
        <div class="form-group">
          <label for="AdminUsers_login">Username</label>
          <input class="form-control" name="username" id="AdminUsers_login" type="text" maxlength="300" autocomplete="username" required />
        </div>
        <div class="form-group">
          <label for="AdminUsers_passwd">Password</label>
          <input class="form-control" name="password" id="AdminUsers_passwd" type="password" maxlength="300" autocomplete="current-password" required />
        </div>
        <?php if(  $_SESSION["recaptcha"]  ): ?>
          <div class="form-group">
            <div class="g-recaptcha" data-sitekey="<?php echo $settings["recaptcha_key"] ?>"></div>
          </div>
        <?php endif; ?>
        <input type="hidden" name="remember" value="1">
        <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
      </form>
    </div>
    <script src="https://www.google.com/recaptcha/api.js?hl=en"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </body>
</html>



