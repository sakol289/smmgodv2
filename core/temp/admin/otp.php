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
  .table-responsive {
    border: 0;
  }
  .table thead {
    display: none;
  }
  .table tbody tr {
    display: block;
    margin-bottom: 1rem;
    border: 1px solid #eee;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.03);
    padding: 10px;
  }
  .table td {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 8px 10px;
    border: none;
    border-bottom: 1px solid #f1f1f1;
    font-size: 15px;
    word-break: break-all;
  }
  .table td:last-child {
    border-bottom: none;
  }
  .table td:before {
    content: attr(data-label);
    font-weight: bold;
    color: #555;
    flex: 1;
    min-width: 120px;
    margin-right: 10px;
  }
}
</style>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$settings["site_name"]?></title>
    <link href="/css/admin/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8dc6670d84.js" crossorigin="anonymous"></script>
    
          </head>
  <body>
    
                  <div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
						<br><br>
						<div class="alert alert-info alert-dismissable">
								<p>Your account is protected with two-factor authentication.</p>
								<p>We've sent you an email. Please check your inbox/spam folder and enter the code below.</p>
								<hr>
								<p>If you do not receive email within 60 seconds, you may try to login again.</p>
							</div>
							
								
							
						  <?php if( $success ): ?>
          <div class="alert alert-success "><?php echo $successText; ?></div>
        <?php endif; ?>
           <?php if( $error ): ?>
          <div class="alert alert-danger "><?php echo $errorText; ?></div>
        <?php endif; ?>
							
										
												<div class="login-panel panel panel-default">
						
						<div class="panel-heading">
							<h3 class="panel-title">2FA Verification</h3>
						</div>
						<div class="panel-body">
						
          <form id="yw0" action="" method="post">
								<fieldset>
								
									<div class="form-group">
										<div class="form-group field-signupform-email required">
											<label>OTP code</label>
    <div class="input-group">
        <input class="form-control" name="otp" id="otp" type="otp" maxlength="300" />
        <span class="input-group-btn">
            <button id="sendOTPBtn" class="btn btn-primary" type="button">Resend OTP</button>
        </span>
    </div>
</div>

 
            <button type="submit" name="login" class="btn btn-default">Login</button>
           </form>      </div>
    </div>
    
<!--Glycon-->    </div>
<script src='https://www.google.com/recaptcha/api.js?hl=en'></script>

      </body>
      <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- SweetAlert2 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
   
 
 
<script>
 

$(document).ready(function() {
    $("#sendOTPBtn").click(function() {
 
       

        $.ajax({
            type: "POST",
            url: "<?php echo site_url()?>otp/send",
             success: function(response) {
                var data = JSON.parse(response);
                if (data.status === 'success') {
                    // Show success message using SweetAlert2
                    Swal.fire({
                        icon: 'success',
                        title: 'OTP Resent!',
                        text: 'Check your email for the OTP code.',
                    });
                } else {
                    // Show error message using SweetAlert2
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to Resend OTP. Please try again later.',
                    });
                }
            },
            error: function(xhr, status, error) {
                // Show error message using SweetAlert2
                Swal.fire({
                    icon: 'success',
                        title: 'OTP Resent!',
                        text: 'Check your email for the OTP code.',
                    });
            }
        });
    });
});

 

</script>
 </body>
</html>



