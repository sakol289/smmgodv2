<?php include 'header.php'; ?>
<style>
@media (max-width: 767px) {
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
  .form-inline,
  .form-inline .input-group,
  .form-inline .form-control,
  .form-inline .input-group-btn,
  .form-inline .btn,
  .form-inline .search-select-wrap {
    display: block !important;
    width: 100% !important;
    min-width: 0;
    margin-bottom: 8px;
  }
  .form-inline .input-group {
    flex-direction: column;
  }
  .form-inline .input-group-btn,
  .form-inline .search-select-wrap {
    margin-top: 8px;
  }
}
</style>


<div class="container-fluid">
  <div class="row">    
   <div class=" col-md-12">
   <ul class="nav nav-tabs">
      <li class="p-b"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalDiv" data-action="yeni_kupon">Create Coupon</button></li>
     
   </ul>
   
   <table class="table report-table" style="border:1px solid #ddd">
      <thead>
         <tr>
           
           
            <th width="33%">Coupon Code</th>
            <th width="15%">Peice</th>
            <th width="33%">Amount</th>
            <th></th>
         </tr>
      </thead>
      <form id="changebulkForm" action="<?php echo site_url("admin/kuponlar/delete") ?>" method="post" onsubmit="return confirm('Do you want to delete it?');">
        <tbody>
          <?php foreach($kuponlar as $kupon ): ?>
              <tr>
                
                 <td><?php echo $kupon["kuponadi"] ?></td>
                 <td><?php echo $kupon["adet"] ?></td>
                 <td><?php echo $kupon["tutar"] ?></td>
                 <td><input type="hidden" name="kupon_id" value="<?php echo $kupon["id"] ?>"><button type="submit" class="btn btn-default btn-xs dropdown-toggle btn-xs-caret">Delete</button></td>
                 
              </tr>
            <?php endforeach; ?>
        </tbody>
        <input type="hidden" name="bulkStatus" id="bulkStatus" value="0">
      </form>
   </table>
   <hr>
   <h4>Coupons Used</h4>
 
   
   <table class="table report-table" style="border:1px solid #ddd">
      <thead>
         <tr>
           
           
            <th width="">Client name</th>
            <th width="">Client email</th>
            <th width="">Client username</th>
            <th width="15%">Coupon Code</th>
            <th width="33%">Amount</th>
            <th></th>
         </tr>
      </thead>
      <form id="changebulkForm" action="<?php echo site_url("admin/kuponlar/delete") ?>" method="post" onsubmit="return confirm('Silmek istiyor musunuz ?');">
        <tbody>
          <?php foreach($kupon_kullananlar as $kupons ): ?>
              <tr>
                
                 <td><?php echo $kupons["first_name"] .' '. $kupons["last_name"] ?></td>
                 <td><?php echo $kupons["email"]?></td>
                 <td><?php echo $kupons["username"]?></td>
                 <td><?php echo $kupons["kuponadi"] ?></td>
                 <td><?php echo $kupons["tutar"] ?></td>
            
                 
              </tr>
            <?php endforeach; ?>
        </tbody>
        <input type="hidden" name="bulkStatus" id="bulkStatus" value="0">
      </form>
   </table>
</div>
</div>
</div>

<?php include 'footer.php'; ?>