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
/* Modern Admin Panel Styles - Enhanced UI */
:root {
  --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
  --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
  --warning-gradient: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
  --danger-gradient: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
  --dark-gradient: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
  --glass-bg: rgba(255, 255, 255, 0.1);
  --glass-border: rgba(255, 255, 255, 0.2);
  --shadow-light: 0 4px 20px rgba(0,0,0,0.1);
  --shadow-medium: 0 8px 32px rgba(0,0,0,0.15);
  --shadow-heavy: 0 16px 64px rgba(0,0,0,0.2);
  --border-radius: 16px;
  --border-radius-small: 8px;
  --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Enhanced Navbar */
.navbar-modern {
  background: var(--primary-gradient);
  border: none;
  box-shadow: var(--shadow-medium);
  transition: var(--transition);
  margin-bottom: 80px;
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  border-bottom: 1px solid var(--glass-border);
}

.navbar-modern .navbar-brand {
  color: #fff !important;
  font-weight: 800;
  font-size: 26px;
  padding: 18px 25px;
  text-shadow: 0 2px 4px rgba(0,0,0,0.3);
  position: relative;
  overflow: hidden;
}

.navbar-modern .navbar-brand::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
  transition: var(--transition);
}

.navbar-modern .navbar-brand:hover::before {
  left: 100%;
}

.navbar-modern .navbar-brand i {
  margin-right: 12px;
  font-size: 28px;
  animation: rotate 3s linear infinite;
}

@keyframes rotate {
  from { transform: rotate(0deg); }
  to { transform: rotate(360deg); }
}

/* Enhanced Navigation Items */
.navbar-modern .navbar-nav > li > a {
  color: rgba(255,255,255,0.95) !important;
  font-weight: 600;
  padding: 22px 18px;
  transition: var(--transition);
  border-radius: var(--border-radius-small);
  margin: 6px 4px;
  position: relative;
  overflow: hidden;
  backdrop-filter: blur(5px);
  -webkit-backdrop-filter: blur(5px);
}

.navbar-modern .navbar-nav > li > a::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: var(--glass-bg);
  transform: scaleX(0);
  transform-origin: right;
  transition: transform 0.3s ease;
}

.navbar-modern .navbar-nav > li > a:hover::before,
.navbar-modern .navbar-nav > li > a:focus::before {
  transform: scaleX(1);
  transform-origin: left;
}

.navbar-modern .navbar-nav > li > a:hover,
.navbar-modern .navbar-nav > li > a:focus {
  color: #fff !important;
  transform: translateY(-3px);
  box-shadow: var(--shadow-light);
  text-shadow: 0 2px 4px rgba(0,0,0,0.3);
}

.navbar-modern .navbar-nav > li.active > a {
  background: var(--glass-bg);
  color: #fff !important;
  box-shadow: var(--shadow-light);
  border: 1px solid var(--glass-border);
  transform: translateY(-2px);
}

.navbar-modern .navbar-nav > li.active > a::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  width: 30px;
  height: 3px;
  background: #fff;
  border-radius: 2px;
  box-shadow: 0 0 10px rgba(255,255,255,0.5);
}

/* Enhanced Dropdown Menus */
.navbar-modern .dropdown-menu {
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(20px);
  -webkit-backdrop-filter: blur(20px);
  border: 1px solid var(--glass-border);
  border-radius: var(--border-radius);
  box-shadow: var(--shadow-heavy);
  padding: 12px 0;
  margin-top: 8px;
  min-width: 220px;
  animation: slideDown 0.3s ease;
}

@keyframes slideDown {
  from {
    opacity: 0;
    transform: translateY(-10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.navbar-modern .dropdown-menu > li > a {
  color: #333;
  padding: 14px 24px;
  transition: var(--transition);
  border-radius: var(--border-radius-small);
  margin: 3px 12px;
  font-weight: 500;
  position: relative;
  overflow: hidden;
}

.navbar-modern .dropdown-menu > li > a::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: var(--primary-gradient);
  transition: var(--transition);
  z-index: -1;
}

.navbar-modern .dropdown-menu > li > a:hover::before {
  left: 0;
}

.navbar-modern .dropdown-menu > li > a:hover {
  color: #fff;
  transform: translateX(8px);
  box-shadow: var(--shadow-light);
}

/* Enhanced Badges */
.badge-modern {
  background: var(--danger-gradient);
  border-radius: 20px;
  padding: 6px 10px;
  font-size: 11px;
  font-weight: 700;
  animation: pulse 2s infinite;
  box-shadow: 0 4px 15px rgba(255,107,107,0.4);
  text-shadow: 0 1px 2px rgba(0,0,0,0.3);
  position: relative;
  overflow: hidden;
}

.badge-modern::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
  animation: shimmer 2s infinite;
}

@keyframes shimmer {
  0% { left: -100%; }
  100% { left: 100%; }
}

@keyframes pulse {
  0% { transform: scale(1); }
  50% { transform: scale(1.15); }
  100% { transform: scale(1); }
}

/* Enhanced Toggle Button */
.navbar-toggle-modern {
  border: none;
  background: var(--glass-bg);
  border-radius: var(--border-radius-small);
  padding: 12px;
  margin: 12px 0;
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  border: 1px solid var(--glass-border);
  transition: var(--transition);
}

.navbar-toggle-modern:hover {
  background: rgba(255,255,255,0.2);
  transform: scale(1.05);
}

.navbar-toggle-modern .icon-bar {
  background: #fff;
  height: 3px;
  border-radius: 2px;
  transition: var(--transition);
  box-shadow: 0 1px 3px rgba(0,0,0,0.3);
}

/* Enhanced User Menu */
.user-menu-modern {
  background: var(--glass-bg);
  border-radius: 30px;
  padding: 10px 18px;
  color: #fff;
  border: 2px solid var(--glass-border);
  transition: var(--transition);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  font-weight: 600;
  text-shadow: 0 1px 2px rgba(0,0,0,0.3);
}

.user-menu-modern:hover {
  background: rgba(255,255,255,0.25);
  border-color: rgba(255,255,255,0.5);
  transform: translateY(-3px);
  color: #fff;
  text-decoration: none;
  box-shadow: var(--shadow-light);
}

/* Enhanced Currency Menu */
.currency-menu-modern {
  background: var(--glass-bg);
  border-radius: 25px;
  padding: 10px 18px;
  color: #fff;
  border: 2px solid var(--glass-border);
  transition: var(--transition);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  font-weight: 600;
  text-shadow: 0 1px 2px rgba(0,0,0,0.3);
}

.currency-menu-modern:hover {
  background: rgba(255,255,255,0.25);
  border-color: rgba(255,255,255,0.5);
  color: #fff;
  text-decoration: none;
  transform: translateY(-2px);
  box-shadow: var(--shadow-light);
}

/* Enhanced Tickmark */
.tickmark-modern {
  display: inline-block;
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background: var(--success-gradient);
  margin-left: 10px;
  animation: glow 2s ease-in-out infinite alternate;
  box-shadow: 0 0 10px rgba(0,184,148,0.5);
}

@keyframes glow {
  from { 
    box-shadow: 0 0 5px #00b894, 0 0 10px #00b894, 0 0 15px #00b894;
    transform: scale(1);
  }
  to { 
    box-shadow: 0 0 10px #00b894, 0 0 20px #00b894, 0 0 30px #00b894;
    transform: scale(1.2);
  }
}

/* Enhanced Theme Toggle */
.theme-toggle-btn {
  background: var(--glass-bg);
  border-radius: 30px;
  padding: 10px 18px;
  color: #fff;
  border: 2px solid var(--glass-border);
  transition: var(--transition);
  text-decoration: none;
  display: inline-block;
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  font-weight: 600;
  text-shadow: 0 1px 2px rgba(0,0,0,0.3);
}

.theme-toggle-btn:hover {
  background: rgba(255,255,255,0.25);
  border-color: rgba(255,255,255,0.5);
  transform: translateY(-3px) rotate(5deg);
  color: #fff;
  text-decoration: none;
  box-shadow: var(--shadow-light);
}

.theme-toggle-btn:focus {
  color: #fff;
  text-decoration: none;
}

/* Dark Mode Enhancements */
.dark-mode .navbar-modern {
  background: var(--dark-gradient);
}

.dark-mode .navbar-modern .dropdown-menu {
  background: rgba(44, 62, 80, 0.95);
  border: 1px solid rgba(52, 73, 94, 0.5);
}

.dark-mode .navbar-modern .dropdown-menu > li > a {
  color: #ecf0f1;
}

.dark-mode .navbar-modern .dropdown-menu > li > a:hover {
  background: var(--primary-gradient);
  color: #fff;
}

/* Enhanced Responsive Design */
@media (max-width: 768px) {
  .navbar-modern .navbar-nav > li > a {
    padding: 16px 12px;
    margin: 3px 0;
    border-radius: var(--border-radius-small);
  }
  
  .navbar-modern .dropdown-menu {
    border-radius: var(--border-radius-small);
    margin-top: 0;
    box-shadow: var(--shadow-medium);
  }
  
  .user-menu-modern,
  .currency-menu-modern {
    margin: 8px 0;
    text-align: center;
    border-radius: 20px;
  }
  
  .navbar-modern {
    margin-bottom: 70px;
  }
  
  .navbar-modern .navbar-brand {
    font-size: 22px;
    padding: 15px 20px;
  }
}

/* Enhanced Notification Styles */
.notification-badge {
  position: relative;
  display: inline-block;
}

.notification-badge .badge-modern {
  position: absolute;
  top: -10px;
  right: -10px;
  min-width: 20px;
  height: 20px;
  line-height: 20px;
  text-align: center;
  font-size: 10px;
}

/* Enhanced Loading Animation */
.loading-spinner {
  display: inline-block;
  width: 18px;
  height: 18px;
  border: 2px solid rgba(255,255,255,0.3);
  border-radius: 50%;
  border-top-color: #fff;
  animation: spin 1s ease-in-out infinite;
  box-shadow: 0 0 10px rgba(255,255,255,0.3);
}

@keyframes spin {
  to { transform: rotate(360deg); }
}

/* Enhanced Content Spacing */
body {
  padding-top: 25px;
  background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
  min-height: 100vh;
}

.dark-mode body {
  background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
}

.container, .container-fluid {
  margin-top: 25px;
}

/* Enhanced Icon Styles */
.navbar-modern .fa,
.navbar-modern .fas {
  margin-right: 10px;
  font-size: 16px;
  transition: var(--transition);
}

.navbar-modern .navbar-nav > li > a:hover .fa,
.navbar-modern .navbar-nav > li > a:hover .fas {
  transform: scale(1.2) rotate(5deg);
}

/* Enhanced Dropdown Arrow Animation */
.navbar-modern .dropdown-toggle .caret {
  transition: var(--transition);
  margin-left: 5px;
}

.navbar-modern .dropdown.open .dropdown-toggle .caret {
  transform: rotate(180deg);
}

/* Enhanced Alert Styles */
.alert {
  border-radius: var(--border-radius-small);
  border: none;
  box-shadow: var(--shadow-light);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
}

.alert-danger {
  background: linear-gradient(135deg, rgba(220, 53, 69, 0.9) 0%, rgba(255, 107, 107, 0.9) 100%);
  color: #fff;
  border: 1px solid rgba(220, 53, 69, 0.3);
}

/* Enhanced Scrollbar */
::-webkit-scrollbar {
  width: 8px;
}

::-webkit-scrollbar-track {
  background: rgba(255,255,255,0.1);
  border-radius: 4px;
}

::-webkit-scrollbar-thumb {
  background: var(--primary-gradient);
  border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
  background: var(--secondary-gradient);
}

/* Enhanced Focus States */
.navbar-modern .navbar-nav > li > a:focus,
.navbar-modern .dropdown-menu > li > a:focus {
  outline: 2px solid rgba(255,255,255,0.5);
  outline-offset: 2px;
}

/* Enhanced Hover Effects */
.navbar-modern .navbar-nav > li:hover > a {
  transform: translateY(-3px);
  box-shadow: var(--shadow-light);
}

/* Enhanced Dropdown Max Height */
.dropdown-max-height {
  max-height: 400px;
  overflow-y: auto;
  scrollbar-width: thin;
  scrollbar-color: rgba(255,255,255,0.3) transparent;
}

/* Enhanced Glass Morphism Effects */
.glass-effect {
  background: var(--glass-bg);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  border: 1px solid var(--glass-border);
  border-radius: var(--border-radius-small);
}

/* Enhanced Text Shadows */
.navbar-modern .navbar-nav > li > a {
  text-shadow: 0 1px 2px rgba(0,0,0,0.2);
}

/* Enhanced Box Shadows */
.navbar-modern .dropdown-menu {
  box-shadow: 0 20px 60px rgba(0,0,0,0.15), 0 8px 32px rgba(0,0,0,0.1);
}

/* Enhanced Transitions */
.navbar-modern * {
  transition: var(--transition);
}

/* Enhanced Active States */
.navbar-modern .navbar-nav > li.active > a {
  position: relative;
}

.navbar-modern .navbar-nav > li.active > a::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
  animation: shimmer 2s infinite;
}

/* Enhanced Mobile Menu */
@media (max-width: 768px) {
  .navbar-modern .navbar-collapse {
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border-radius: var(--border-radius-small);
    margin-top: 10px;
    padding: 10px;
    border: 1px solid var(--glass-border);
  }
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