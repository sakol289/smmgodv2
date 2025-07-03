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
      
      <div class="col-lg-12">
          <ul class="nav nav-tabs p-b">
     <li class=""><a href="/admin/logs">System Logs</a></li>
     <li class="active"><a href="/admin/provider_logs">Provider Logs</a></li>        
          <li><a href="/admin/guard_logs">Protection Logs <?php if(countRow(['table'=>'guard_log'])): ?>
<span class='badge' style='background-color: #6d47bb'><?=countRow(['table'=>'guard_log']);?></span>
<?php endif; ?></a></li>        

    
   </ul>
         <div class="panel panel-default">
            <div class="panel-body">   
              <h4>Provider Logs</h4>
               <div class="table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                          <th class="checkAll-th">
                             <div class="checkAll-holder">
                                <input type="checkbox" id="checkAll">
                                <input type="hidden" id="checkAllText" value="order">
                             </div>
                             <div class="action-block">
                                <ul class="action-list" style="margin:5px 0 0 0!important">
                                   <li><span class="countOrders"></span> log selected</li>
                                   <li>
                                      <div class="dropdown">
                                         <button type="button" class="btn btn-default btn-xs dropdown-toggle btn-xs-caret" data-toggle="dropdown"> batch operations <span class="caret"></span></button>
                                         <ul class="dropdown-menu">
                                            <li>
                                              <a class="bulkorder" data-type="delete">delete</a>
                                            </li>
                                         </ul>
                                      </div>
                                   </li>
                                </ul>
                             </div>
                          </th>
                           <th>Event</th>
                           <th>Date</th>
                           <th>Detail</th>
                           <th></th>
                        </tr>
                     </thead>
                     <form id="changebulkForm" action="<?php echo site_url("admin/provider_logs/multi-action") ?>" method="post">
                       <tbody>
                         <?php if( !$logs ): ?>
                           <tr>
                             <td colspan="4"><center>No logs found</center></td>
                           </tr>
                         <?php endif; ?>
                         <?php foreach($logs as $log): $extra = json_decode($log["servicealert_extra"],true); ?>
                          <tr>
                             <td><input type="checkbox" class="selectOrder" name="log[<?php echo $log["id"] ?>]" value="1" style="border:1px solid #fff"></td>
                             <td><?php echo $log["serviceapi_alert"] ?></td>
                             <td><?php echo date("H:i:s d.m.Y",strtotime($log["servicealert_date"]) ) ?></td>
                             <td><?php echo "old value: ".$extra["old"]." / Current value:".$extra["new"] ?></td>
                             <td> <a href="<?php echo site_url("admin/provider_logs/delete/".$log["id"]) ?>" style="font-size:12px">delete</a> </td>
                          </tr>
                        <?php endforeach; ?>
                       </tbody>
                       <input type="hidden" name="bulkStatus" id="bulkStatus" value="0">
                     </form>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
<div class="modal modal-center fade" id="confirmChange" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
   <div class="modal-dialog modal-dialog-center" role="document">
      <div class="modal-content">
         <div class="modal-body text-center">
            <h4>Are you sure you want to perform the operation??</h4>
            <div align="center">
               <a class="btn btn-primary" href="" id="confirmYes">Yes</a>
               <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
         </div>
      </div>
   </div>
</div>

<?php include 'footer.php'; ?>
