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

    <div class="container container-md"> <div class="row"><div class="col-md-12">
                  <ul class="nav nav-tabs"> <a href="/admin/tickets" class="details_backButton btn btn-link"><span>‹</span> Back</a><li class="pull-right custom-search">
         <form class="form-inline" action="<?=site_url("admin/orders")?>" method="get" target="_blank">
            <div class="input-group">
               <input type="text" name="search" class="form-control" value="<?=$search_word?>" placeholder="Your order number">
               <span class="input-group-btn search-select-wrap">
                  <select class="form-control search-select" name="search_type">
                     <option value="order_id" <?php if( $search_where == "order_id" ): echo 'selected'; endif; ?> >ID</option>
                  </select>
                  <button type="submit" class="btn btn-default"><span class="fa fa-search" aria-hidden="true"></span></button>
               </span>
            </div>
         </form>
      </li></ul> 
                <?php if( $success ): ?>
          <div class="alert alert-success "><?php echo $successText; ?></div>
        <?php endif; ?>
           <?php if( $error ): ?>
          <div class="alert alert-danger "><?php echo $errorText; ?></div>
          
        <?php endif; ?>   </div> </div>
   <div class="row">
       <div class="col-md-12">
        <div class="ticket-header__title border-radius-top">
        <div class="row">
            <div class="col-md-12">
                <div class="ticket-header-title">
                  <?php echo $ticketMessage[0]["subject"]; echo ' <span class="service-block__provider-value">';
               if($ticketMessage[0]["support_new"] == 2){
                                           echo'  <i class="fa fa-eye-slash"></i> Not Seen Yet';
                                           }elseif ($ticketMessage[0]["support_new"] == 1){
                                           echo'  <i class="fa fa-eye"></i> seen';
                                           } ?></span>
               <?php if( $ticketMessage[0]["canmessage"] == 1 ): ?>
               <span class="badge"><i class="fa fa-lock"></i> Support request locked, User can't reply.</span>
               <?php endif; ?>
                    <div class="ticket-header-id">ID: <?=$ticketMessage[0]["ticket_id"]?></div>
                </div>
            </div>
        </div>
    </div>

            <div class="row">
               <div class="col-md-12">
                   
                  <div class="ticket-header__textarea">
                     <div class="row">
                        <div class="col-md-12">
                              <form action="<?php echo site_url("admin/tickets/read/".$ticketMessage[0]["ticket_id"]) ?>" method="post">
                              <div class="col-md-12">
                                 <div class="ticket-message-submit">
                                    <textarea name="message" id="" cols="30" rows="5" class="form-control ticket-edit__textarea"></textarea>
                                 </div>
                              </div>
                           <input name="username" value="<?=$user["username"]?>" hidden>
                                 <div class="col-sm-6">
                                                    <button class="btn btn-primary" type="submit">
                                                    Submit answer                            </button>
                                                                            <div class="btn-group">
                                                                              <?php  if( $ticketMessage[0]["status"] != "closed" ): ?>
                                <a href="<?php echo site_url("admin/tickets/close/".$ticketMessage[0]["ticket_id"]) ?>" class="btn btn-default" data-toggle="modal">
                                Close Request                                </a>
                                    <?php endif; ?>
                                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                                  <?php if( $ticketMessage[0]["canmessage"] == 2 ): ?>
                                    <li> <a href="<?php echo site_url("admin/tickets/lock/".$ticketMessage[0]["ticket_id"]) ?>"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Lock ticket">Lock And Close Request</a>
                                 </li>  <?php else: ?>
                                     <li><a href="<?php echo site_url("admin/tickets/unlock/".$ticketMessage[0]["ticket_id"]) ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Unlock support ticket">Unlock Claim</a>
                                </li>   <?php endif; ?>
                                                                            </ul>
                                                            </div>
                                            </div>
                                </form>                                    <div class="col-sm-6 ticket-header__unread">
                        <a href="<?php echo site_url("admin/tickets/unread/".$ticketMessage[0]["ticket_id"]) ?>"
                           class="btn btn-link ticket-btn__unread">
                           Mark as Unread                        </a>
                    </div>
                            </div></div>
                           
                            </div></div></div>
                                <div class="row">
            <div class="col-md-12">
                          <div class="ticket-body">
                           <div class="ticket-message__container">
                              <?php foreach($ticketMessage as $message): if( $message["support"] == 2 ): ?>
                              <div class="ticket-message__block ticket-message__support">
                                 <div class="ticket-message">
                                    <div class="ticket-message__title">
                                       <div class="row">
                                          <div class="col-sm-6">
                                             <strong><?=$message["support_team"]?></strong>
                                          </div>
                                          <div class="col-sm-6">
                                             <div class="ticket-message__title-date">
                                          <?=$message["time"]?>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="ticket-message__text"><?=$message["message"]?></div>
                                 </div>                                          

<a data-toggle="modal" data-target="#modalDiv" data-action="edit_ticket" data-id="<?=$message['id']?>">Edit</a> • <a href="#"data-toggle="modal" data-target="#confirmChange" data-href="/admin/tickets/delete/<?=$message['id']?>/<?=$message['ticket_id']?>">delete</a>

                              </div>
                              <?php else: ?>
                                           <div class="ticket-message__block ticket-message__client">
                                 <div class="ticket-message">
                                    <div class="ticket-message__title">
                                       <div class="row">
                                          <div class="col-sm-6">
                                             <strong><?=$message["username"]?></strong>
                                          </div>
                                          <div class="col-sm-6">
                                             <div class="ticket-message__title-date">
                                                <?=$message["time"]?>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="ticket-message__text"><?=str_replace("</script>","</ script >",str_replace("<script>","< script >",$message["message"]))?></div>
                                 </div>
                              </div>
                              <?php endif; endforeach; ?>
                           </div>
                        
                        </div>
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
       <h4>Do you approve the transaction??</h4>
       <div align="center">
         <a class="btn btn-primary" href="" id="confirmYes">Yes</a>
         <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
       </div>
     </div>
   </div>
 </div>
</div>

<?php include 'footer.php'; ?>
