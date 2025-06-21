<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="col-md-8">
            <?php if( $success ): ?>
          <div class="alert alert-success "><?php echo $successText; ?></div>
        <?php endif; ?>
           <?php if( $error ): ?>
          <div class="alert alert-danger "><?php echo $errorText; ?></div>
        <?php endif; ?>
  <div class="settings-header__table">
     <button type="button"  class="btn btn-default m-b" data-toggle="modal" data-target="#modalDiv" data-action="new_provider" >Add New Provider</button> 
     
     
      <button id="rateUpdateBtn" type="button" class="btn btn-default m-b">Sync Button</button>
     
  </div>
  
  <script>

document.write('<center id=loading><img src="/img/ajax-loader-2.gif"></center>');
window.onload=function(){
    document.getElementById("loading").style.display="none";
}

</script>







<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">

<script>
$(document).ready(function() {
    $('#rateUpdateBtn').click(function() {
         Swal.fire({
            title: 'Please Wait(About 1min)',
            text: 'Loading...',
            allowOutsideClick: false,
            showConfirmButton: false,
            onBeforeOpen: function() {
                Swal.showLoading();
            }
        });
        $.ajax({
            url: '/admin/cron-sync',
            type: 'POST',
             success: function(response) {
                if (response == 'Sync Successsfully.') {
                    Swal.fire({
                        title: 'Success',
                        text: 'Sync Successfully.',
                        icon: 'success'
                    });
                    setTimeout(function() {
location.reload();
}, 2000); // adjust the delay as needed
                } else {
                    Swal.fire({
                      title: 'Fail',
                        text: 'Fail to Sync.',
                        icon: 'error'
                    });
                }
            },
            error: function() {
                Swal.fire({
                      title: 'Fail',
                        text: 'Fail to Sync.',
                        icon: 'error'
                    });
            },
            complete: function() {
                setTimeout(function() {
                    Swal.close();
                }, 3000);
            }
        });
    });
});

 </script>


   				
<div class="providers"></div>
   