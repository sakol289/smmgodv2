<?php include 'header.php'; ?>
<style>
@media (max-width: 767px) {
  .container-fluid, .container {
    padding: 8px !important;
  }
  .form-group, .form-control, .btn {
    width: 100% !important;
    margin-bottom: 10px;
  }
  .row, .col-sm-6, .col-md-6, .col-xs-12 {
    width: 100% !important;
    margin: 0 !important;
    padding: 0 !important;
  }
}
</style>


<div class="container">
  <div class="row">
    <?php if( ( route(2) == "language" && !route(3) ) || ( route(2) != "themes" ) && route(2) != "language"  ):  ?>
          <div class="col-md-2 col-md-offset-1">
            <ul class="nav nav-pills nav-stacked p-b">
              <?php foreach($menuList as $menuName => $menuLink ): ?>
                <li class="settings_menus <?php if( $route["2"] == $menuLink ): echo "active"; endif; ?>"><a href="<?=site_url("admin/appearance/".$menuLink)?>"><?=$menuName?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
    <?php  endif;
          if( $access ):
            include admin_view('appearance/'.route(2));
          else:
            include admin_view('appearance/access');
          endif;
    ?>


  </div>
</div>


<?php include 'footer.php'; ?>
