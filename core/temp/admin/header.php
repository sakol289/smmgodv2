<!DOCTYPE html>
<html lang='en'>
<head>
<base href='<?=site_url()?>'>
<meta charset='utf-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<title><?=isset($titleAdmin) ? $titleAdmin : 'Admin Panel'?></title>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src='https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js'></script>
<script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
<![endif]-->  
<link href='/css/admin/custom.css' rel='stylesheet'>
<link rel='stylesheet' href='/css/admin/bootstrap.css'>
<link rel='stylesheet' href='/css/admin/style.css'>
<link rel='stylesheet' href='/css/admin/toastDemo.css'>
<link rel='stylesheet' href='/js/datepicker/css/bootstrap-datepicker3.min.css'>
<link rel='stylesheet' href='css/admin/tinytoggle.min.css' rel='stylesheet'>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css'>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
/* Modern Navbar Styles */
.navbar-modern {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  border: none;
  box-shadow: 0 4px 20px rgba(0,0,0,0.15);
  transition: all 0.3s ease;
  margin-bottom: 80px;
}

.navbar-modern .navbar-brand {
  color: #fff !important;
  font-weight: 700;
  font-size: 24px;
  padding: 15px 20px;
}

.navbar-modern .navbar-nav > li > a {
  color: rgba(255,255,255,0.9) !important;
  font-weight: 500;
  padding: 20px 15px;
  transition: all 0.3s ease;
  border-radius: 8px;
  margin: 5px 3px;
  position: relative;
}

.navbar-modern .navbar-nav > li > a:hover,
.navbar-modern .navbar-nav > li > a:focus {
  color: #fff !important;
  background: rgba(255,255,255,0.15);
  transform: translateY(-2px);
  box-shadow: 0 4px 15px rgba(0,0,0,0.2);
}

.navbar-modern .navbar-nav > li.active > a {
  background: rgba(255,255,255,0.25);
  color: #fff !important;
  box-shadow: 0 4px 15px rgba(0,0,0,0.3);
}

.navbar-modern .dropdown-menu {
  background: #fff;
  border: none;
  border-radius: 12px;
  box-shadow: 0 10px 40px rgba(0,0,0,0.15);
  padding: 10px 0;
  margin-top: 5px;
  min-width: 200px;
}

.navbar-modern .dropdown-menu > li > a {
  color: #333;
  padding: 12px 20px;
  transition: all 0.3s ease;
  border-radius: 8px;
  margin: 2px 10px;
  font-weight: 500;
}

.navbar-modern .dropdown-menu > li > a:hover {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: #fff;
  transform: translateX(5px);
}

.badge-modern {
  background: linear-gradient(45deg, #ff6b6b, #ee5a24);
  border-radius: 20px;
  padding: 4px 8px;
  font-size: 11px;
  font-weight: 600;
  animation: pulse 2s infinite;
  box-shadow: 0 2px 8px rgba(255,107,107,0.3);
}

@keyframes pulse {
  0% { transform: scale(1); }
  50% { transform: scale(1.1); }
  100% { transform: scale(1); }
}

.navbar-toggle-modern {
  border: none;
  background: rgba(255,255,255,0.1);
  border-radius: 8px;
  padding: 10px;
  margin: 10px 0;
}

.navbar-toggle-modern .icon-bar {
  background: #fff;
  height: 3px;
  border-radius: 2px;
  transition: all 0.3s ease;
}

.user-menu-modern {
  background: rgba(255,255,255,0.1);
  border-radius: 25px;
  padding: 8px 15px;
  color: #fff;
  border: 2px solid rgba(255,255,255,0.2);
  transition: all 0.3s ease;
}

.user-menu-modern:hover {
  background: rgba(255,255,255,0.2);
  border-color: rgba(255,255,255,0.4);
  transform: translateY(-2px);
  color: #fff;
  text-decoration: none;
}

.currency-menu-modern {
  background: rgba(255,255,255,0.1);
  border-radius: 20px;
  padding: 8px 15px;
  color: #fff;
  border: 2px solid rgba(255,255,255,0.2);
  transition: all 0.3s ease;
}

.currency-menu-modern:hover {
  background: rgba(255,255,255,0.2);
  border-color: rgba(255,255,255,0.4);
  color: #fff;
  text-decoration: none;
}

.tickmark-modern {
  display: inline-block;
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: linear-gradient(45deg, #00b894, #00cec9);
  margin-left: 8px;
  animation: glow 2s ease-in-out infinite alternate;
}

@keyframes glow {
  from { box-shadow: 0 0 5px #00b894; }
  to { box-shadow: 0 0 20px #00b894, 0 0 30px #00cec9; }
}

/* Dark mode styles */
.dark-mode .navbar-modern {
  background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
}

.dark-mode .navbar-modern .dropdown-menu {
  background: #2c3e50;
  border: 1px solid #34495e;
}

.dark-mode .navbar-modern .dropdown-menu > li > a {
  color: #ecf0f1;
}

.dark-mode .navbar-modern .dropdown-menu > li > a:hover {
  background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
}

/* Responsive */
@media (max-width: 768px) {
  .navbar-modern .navbar-nav > li > a {
    padding: 15px 10px;
    margin: 2px 0;
  }
  
  .navbar-modern .dropdown-menu {
    border-radius: 8px;
    margin-top: 0;
  }
  
  .user-menu-modern,
  .currency-menu-modern {
    margin: 5px 0;
    text-align: center;
  }
  
  .navbar-modern {
    margin-bottom: 60px;
  }
}

/* Notification styles */
.notification-badge {
  position: relative;
  display: inline-block;
}

.notification-badge .badge-modern {
  position: absolute;
  top: -8px;
  right: -8px;
  min-width: 18px;
  height: 18px;
  line-height: 18px;
  text-align: center;
}

/* Smooth transitions */
.navbar-modern * {
  transition: all 0.3s ease;
}

/* Hover effects */
.navbar-modern .navbar-nav > li:hover > a {
  transform: translateY(-2px);
  box-shadow: 0 4px 15px rgba(0,0,0,0.2);
}

/* Loading animation */
.loading-spinner {
  display: inline-block;
  width: 16px;
  height: 16px;
  border: 2px solid rgba(255,255,255,0.3);
  border-radius: 50%;
  border-top-color: #fff;
  animation: spin 1s ease-in-out infinite;
}

@keyframes spin {
  to { transform: rotate(360deg); }
}

/* Theme toggle button styles */
.theme-toggle-btn {
  background: rgba(255,255,255,0.1);
  border-radius: 25px;
  padding: 8px 15px;
  color: #fff;
  border: 2px solid rgba(255,255,255,0.2);
  transition: all 0.3s ease;
  text-decoration: none;
  display: inline-block;
}

.theme-toggle-btn:hover {
  background: rgba(255,255,255,0.2);
  border-color: rgba(255,255,255,0.4);
  transform: translateY(-2px);
  color: #fff;
  text-decoration: none;
}

.theme-toggle-btn:focus {
  color: #fff;
  text-decoration: none;
}

/* Content spacing */
body {
  padding-top: 20px;
}

.container, .container-fluid {
  margin-top: 20px;
}

/* Icon styles */
.navbar-modern .fa,
.navbar-modern .fas {
  margin-right: 8px;
  font-size: 14px;
}

/* Dropdown arrow animation */
.navbar-modern .dropdown-toggle .caret {
  transition: transform 0.3s ease;
}

.navbar-modern .dropdown.open .dropdown-toggle .caret {
  transform: rotate(180deg);
}
</style>

</head>
<body class='<?php if($user['admin_theme'] == 2){ echo 'dark-mode'; } ?>'>
<nav class='navbar navbar-fixed-top navbar-modern'>
<div class='container-fluid'>
<div class='navbar-header'>
<button type='button' class='navbar-toggle navbar-toggle-modern collapsed' data-toggle='collapse' data-target='#bs-navbar-collapse'>
<span class='sr-only'>Toggle navigation</span>
<span class='icon-bar'></span>
<span class='icon-bar'></span>
<span class='icon-bar'></span>
</button>
<a class='navbar-brand' href='<?=site_url('admin/dashboard')?>'>
  <i class="fas fa-cogs"></i> Admin Panel
</a>
</div>
<div class='collapse navbar-collapse' data-nav='navbar-priority' id='bs-navbar-collapse'>
<ul id='navResponsive' class='nav navbar-nav navbar-left-block'>
<?php if( $user['access']['admin_access']  && $_SESSION['neira_adminlogin']  ): ?>
  <li class='<?php if( route(1) == 'dashboard' ): echo 'active'; endif; ?>'>
    <a href='<?php echo site_url('admin/dashboard') ?>'>
      <i class="fas fa-tachometer-alt"></i> Dashboard
    </a>
  </li>
  
<?php if( $user['access']['users'] ): ?>
<li class='<?php if( route(1) == 'clients' ): echo 'active'; endif; ?>'>
  <a href='<?php echo site_url('admin/clients') ?>'>
    <i class="fas fa-users"></i> Users
  </a>
</li>
<?php endif; ?>  
<?php if( $user['access']['orders'] ): ?>    
<li class='<?php if( route(1) == 'orders' ): echo 'active'; endif; ?>'>
  <a href='<?php echo site_url('admin/orders') ?>'>
    <i class="fas fa-shopping-cart"></i> Orders
  </a>
</li>
<?php endif; ?>
<?php if( $user['access']['subscriptions'] ): 

$a1 = countRow(['table'=>'services','where'=>['service_package'=>11]]);
$a2 = countRow(['table'=>'services','where'=>['service_package'=>12]]);
$a3 = countRow(['table'=>'services','where'=>['service_package'=>13]]);
$a4 = countRow(['table'=>'services','where'=>['service_package'=>14]]);
$a5 = countRow(['table'=>'services','where'=>['service_package'=>15]]);?>  

<?php if($a1>0 || $a2>0 || $a3>0 || $a4>0 || $a5>0):	?>
<li class='<?php if( route(1) == 'subscriptions' ): echo 'active'; endif; ?>'>
  <a href='<?php echo site_url('admin/subscriptions') ?>'>
    <i class="fas fa-sync-alt"></i> Subscriptions
  </a>
</li>
<?php endif; endif; ?>
<?php if( $user['access']['dripfeed'] ): ?>  
<?php if(countRow(['table'=>'services','where'=>['service_dripfeed'=>2]])>0):	?>
<li class='<?php if( route(1) == 'dripfeeds' ): echo 'active'; endif; ?>'>
  <a href='<?php echo site_url('admin/dripfeeds') ?>'>
    <i class="fas fa-clock"></i> Drip-feed
  </a>
</li>
<?php endif; endif; ?>

<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-tasks"></i> Tasks 
    <span class='badge-modern'><?=countRow(['table'=>'tasks','where'=>['task_status'=>'pending']]);?></span>
  </a>
  <ul class="dropdown-menu dropdown-max-height">
    <li class='<?php if( route(1) == 'refill_status' ): echo 'active'; endif; ?>'>
      <a href='<?php echo site_url('admin/refill') ?>'>
        <i class="fas fa-redo"></i> Refill 
        <span class='badge-modern'>
          <?=countRow(['table'=>'refill_status','where'=>['refill_status'=>'pending']]);?>
        </span>
      </a>
    </li>
    <li>
      <a href="<?php echo site_url('admin/tasks') ?>">
        <i class="fas fa-times-circle"></i> Cancel
        <span class='badge-modern'>
          <?=countRow(['table'=>'tasks','where'=>['task_status'=>'pending']]);?>
        </span>
      </a>
    </li>
  </ul>
</li>

<?php if( $user['access']['services'] ): ?>    
<li class='<?php if( route(1) == 'services' ): echo 'active'; endif; ?>'>
  <a href='<?php echo site_url('admin/services') ?>'>
    <i class="fas fa-cogs"></i> Services
  </a>
</li>
<?php endif; ?>  
<?php if( $user['access']['payments'] ): ?>
<li class='<?php if( route(1) == 'payments' ): echo 'active'; endif; ?>'>
  <a href='<?php echo site_url('admin/payments') ?>'>
    <i class="fas fa-credit-card"></i> Payments 
    <?php if(countRow(['table'=>'payments','where'=>['payment_method'=>7,'payment_status'=>1]])): ?>
      <span class='badge-modern'><?=countRow(['table'=>'payments','where'=>['payment_method'=>7,'payment_status'=>1]]);?></span> 
    <?php endif; ?>
  </a>
</li>
<?php endif; ?>     
<?php if( $user['access']['tickets'] ): ?>       
<li class='<?php if( route(1) == 'tickets' ): echo 'active'; endif; ?>'>
  <a href='<?php echo site_url('admin/tickets') ?>'>
    <i class="fas fa-headset"></i> Support 
    <?php if( countRow(['table'=>'tickets','where'=>['client_new'=>2]]) ): ?> 
      <span class='badge-modern'><?=countRow(['table'=>'tickets','where'=>['client_new'=>2]]);?></span>
    <?php endif; ?> 
  </a>
</li>
<?php endif; ?>

<?php if( $settings['panel_selling'] == 2 || countRow(['table'=>'child_panels','where'=>['panel_status'=>'active']])): ?>
<li class='<?php if( route(1) == 'child-panels' ): echo 'active'; endif; ?>'>
  <a href='<?php echo site_url('admin/child-panels') ?>'>
    <i class="fas fa-sitemap"></i> Child Panels 
    <?php if( countRow(['table'=>'child_panels','where'=>['panel_status'=>'pending']]) ): ?> 
      <span class='badge-modern'><?=countRow(['table'=>'child_panels','where'=>['panel_status'=>'pending']]);?></span>
    <?php endif; ?> 
  </a>
</li> 
<?php endif; ?>

<li class='<?php if( route(1) == 'appearance' ): echo 'active'; endif; ?>'>
  <a href='<?php echo site_url('admin/appearance') ?>'>
    <i class="fas fa-palette"></i> Appearance
  </a>
</li>

<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-plus-circle"></i> Additionals <span class="caret"></span>
  </a>
  <ul class="dropdown-menu dropdown-max-height">
    <li class="<?php if (route(1) == "broadcasts") : echo 'active'; endif; ?>">
      <a class="ajax-link" href="<?php echo site_url("admin/broadcasts") ?>">
        <i class="fas fa-bullhorn"></i> Broadcasts
      </a>
    </li>
    <li class="<?php if (route(1) == "update-prices") : echo 'active'; endif; ?>">
      <a class="ajax-link" href="<?php echo site_url("admin/update-prices") ?>">
        <i class="fas fa-dollar-sign"></i> Update Prices
      </a>
    </li>
    <li class="<?php if (route(1) == "kuponlar") : echo 'active'; endif; ?>">
      <a class="ajax-link" href="<?php echo site_url("admin/kuponlar") ?>">
        <i class="fas fa-ticket-alt"></i> Coupon Code
      </a>
    </li>
    
    <?php if( $user['access']['reports'] ): ?>
    <li class='<?php if( route(1) == 'reports' ): echo 'active'; endif; ?>'>
      <a href='<?php echo site_url('admin/reports') ?>'>
        <i class="fas fa-chart-bar"></i> Reports
      </a>
    </li> 
    <?php endif; ?>
    
    <?php if( $user['access']['logs'] ): ?>
    <li class='<?php if( route(1) == 'logs' || route(1) == 'provider_logs' || route(1) == 'guard_logs' ): echo 'active'; endif; ?>'>
      <a href='<?php echo site_url('admin/logs') ?>'>
        <i class="fas fa-file-alt"></i> Logs 
        <?php if(countRow(['table'=>'guard_log'])): ?>
          <span class='badge-modern'><?=countRow(['table'=>'guard_log']);?></span>
        <?php endif; ?>
      </a>
    </li> 
    <?php endif; ?>
  </ul>
</li>

<li class='<?php if( route(1) == 'settings' ): echo 'active'; endif; ?>'>
  <a href='<?php echo site_url('admin/settings') ?>'>
    <i class="fas fa-cog"></i> Settings
  </a>
</li>

<?php endif; ?>
</ul>  

<ul id='w4' class='nav navbar-nav navbar-right'>
<?php if( $user['admin_access']  && $_SESSION['neira_adminlogin']  ): ?>
  <li class="dropdown">
    <a href="#" class="currency-menu-modern dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-money-bill-wave"></i> <?php echo $currency['name'] ?> <span class="caret"></span>
    </a>
    <ul class="dropdown-menu dropdown-max-height">
      <li>
        <?php foreach ($currencies as $curr) {
          $isSelected = ($curr['id'] == $_GET['curid']);
        ?>
        <a href="/cur?cur=<?php echo $curr['id']?>" >
          <i class="fas fa-coins"></i> <?php echo $curr['name']?>
          <?php if ($isSelected): ?>
            <span class="tickmark-modern"></span>
          <?php endif; ?>
        </a>
        <?php } ?>
      </li>
    </ul>
  </li>
            
  <li class="dropdown">
    <a href="#" class="user-menu-modern dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
      <i class="fa fa-user"></i> <span class="caret"></span>
    </a>
    <ul class="dropdown-menu dropdown-max-height">
      <li class='<?php if( route(1) == 'account' ): echo 'active'; endif; ?>'>
        <a href='<?php echo site_url('admin/account') ?>'>
          <i class="fas fa-user-cog"></i> Admin Account
        </a>
      </li>
      <li>
        <a href='<?php echo site_url('logout') ?>'>
          <i class="fas fa-sign-out-alt"></i> Log Out
        </a>
      </li>
    </ul>
  </li>

  <li>
    <?php 
    $e = route(1);
    if( $user['admin_theme'] == 2 ):
      echo "<a href='/admin?theme=1&refer=".$e."' class='theme-toggle-btn'><i class='fa fa-sun'></i></a>";
    else:
      echo "<a href='/admin?theme=2&refer=".$e."' class='theme-toggle-btn'><i class='fa fa-moon'></i></a>";
    endif;
    ?>
  </li>
<?php endif; ?>
</ul>
</div>
</div>
</nav>

<?php if($updateDetails['current'] != $updateDetails['last']): ?>
<script>alert('A new update is available! You need to update from the S icon on the admin panel menu.')</script>
<div class="col-md-12">
    <div class="alert alert-danger">
      <i class="fas fa-exclamation-triangle"></i> A new update is available! You need to update from the S icon on the admin panel menu
    </div>
</div>
<?php endif; ?>  