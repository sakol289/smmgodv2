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
    <div class="col-md-8 col-md-offset-2">
              <?php if( $success ): ?>
          <div class="alert alert-success "><?php echo $successText; ?></div>
        <?php endif; ?>
           <?php if( $error ): ?>
          <div class="alert alert-danger "><?php echo $errorText; ?></div>
        <?php endif; ?>
      <div class="panel panel-default">
          <div class="panel-body">
        <form method="post" action="/admin/account">

          <div class="form-group">
            <label for="charge" class="control-label">Current Password</label>
            <input type="password" class="form-control" value="" name="current_password">
          </div>

          <div class="form-group">
            <label for="charge" class="control-label">New Password</label>
            <input type="password" class="form-control" value="" name="password">
          </div>

          <div class="form-group">
            <label for="charge" class="control-label">New Password (Again)</label>
            <input type="password" class="form-control" value="" name="confirm_password">
          </div>
          <button type="submit" class="btn btn-primary">Change Password</button>
        </form>
      </div>
</div>

    </div>
  </div>
</div>
   

<?php include 'footer.php'; ?>
