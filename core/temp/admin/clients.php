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
  }
  .nav-tabs__service {
    flex-wrap: wrap;
  }
  .nav-tabs__service li, .nav-tabs__service button, .nav-tabs__service a {
    width: 100%;
    margin-bottom: 5px;
  }
  .form-inline .form-control {
    width: 100% !important;
    margin-bottom: 5px;
  }
  .input-group-btn {
    width: 100%;
  }
  .pagination {
    flex-wrap: wrap;
  }
}
</style>

<div class="container-fluid">
            <?php if( $success ): ?>
          <div class="alert alert-success "><?php echo $successText; ?></div>
        <?php endif; ?>
           <?php if( $error ): ?>
          <div class="alert alert-danger "><?php echo $errorText; ?></div>
        <?php endif; ?>
  <ul class="nav nav-tabs nav-tabs__service d-flex flex-wrap">
   <li class="p-b"><button class="btn btn-default btn-block mb-2" type="button" data-toggle="modal" data-target="#modalDiv" data-action="new_user">Add user</button></li>
   <li class="p-b"><button class="btn btn-default btn-block mb-2 m-l" type="button" data-toggle="modal" data-target="#modalDiv" data-action="alert_user">Send notification</button></li>
     <li class="p-b"><button class="btn btn-default btn-block mb-2 m-l" type="button" data-toggle="modal" data-target="#modalDiv" data-action="all_numbers">Contact information</button></li>

   <li class="pull-right p-b w-100">
          <form class="form-inline w-100" action="" method="get" enctype="multipart/form-data">
       <div class="input-group w-100">
         <input type="text" name="search" class="form-control" value="<?=$search_word?>" placeholder="Search user...">
         <span class="input-group-btn search-select-wrap w-100 mt-2">
             <select class="form-control search-select w-100" name="search_type">
               <option value="username" <?php if( $search_where == "username" ): echo 'selected'; endif; ?> >Username</option>
               <option value="name" <?php if( $search_where == "name" ): echo 'selected'; endif; ?> >Name</option>
               <option value="email" <?php if( $search_where == "email" ): echo 'selected'; endif; ?> >Email</option>
               <option value="telephone" <?php if( $search_where == "telephone" ): echo 'selected'; endif; ?> >Phone number</option>
             </select>
             <button type="submit" class="btn btn-default w-100 mt-2"><span class="fa fa-search" aria-hidden="true"></span></button>
           </span>
       </div>
     </form>
    </li>
       <li class="pull-right p-b"><a data-toggle="modal" data-target="#modalDiv" data-action="export_user">Export</a></li>
 </ul>
    <div class="table-responsive">
    <table class="table">
      <thead>
      <tr>
        <th class="column-id">ID</th>
         <th>Username</th> 
         <th>Email</th>
    <?php if( $settings["skype_area"] == 2 ): echo " <th>Phone number</th>"; endif; ?>
        <th>Balance</th>
        <th>spent</th>
        <th>Status</th>
        <th>Date of registration</th>
        <th nowrap="">Last Login</th>
        <th>Special Price</th>
        <th>Bulk Discount</th>
        <th>Action</th>
      </tr>
      </thead>
        <tbody>

          <?php foreach($clients as $client ):  ?>
            <tr class="<?php if( $client["client_type"] == 1 ): echo "grey"; endif; ?>">
               <td data-label="ID"><?php echo $client["client_id"] ?></td>
               <td data-label="Username"><?php echo $client["username"] ?></td>
               <td data-label="Email"><?php echo $client["email"] ?></td>
        <?php if( $settings["skype_area"] == 2 ): echo "<td data-label='Phone number'>"; echo $client["telephone"]; echo "</td>"; endif; ?>
               <td data-label="Balance"><?php echo conrate($client["balance"]) ?></td>
               <td data-label="Spent"><?php echo conrate($client["spent"]) ?></td>
               <td data-label="Status"><?php if( $client["client_type"] == 2 ): echo "Activate"; else: echo "Suspend"; endif; ?></td>
               <td data-label="Date of registration"><?php echo $client["register_date"] ?></td>
               <td data-label="Last Login"><?php echo $client["login_date"] ?></td>
               
                <td data-label="Special Price"><button type="button" class="btn btn-default btn-xs <?php if( !countRow(["table"=>"clients_price","where"=>["client_id"=>$client["client_id"]] ]) ): echo "disabled"; endif; ?> " style="cursor:pointer"  data-toggle="modal" data-target="#modalDiv" data-id="<?php echo $client["client_id"] ?>" data-action="price_user">Set Discount
               
                             <?php if( countRow(["table"=>"clients_price","where"=>["client_id"=>$client["client_id"]] ]) ): ?>  <span class="badge badge-xs"><?php echo countRow(["table"=>"clients_price","where"=>["client_id"=>$client["client_id"]] ]) ?></span><?php endif; ?>
 
               
            </button></td>
               
               <td data-label="Bulk Discount">
                                                        <button type="button" class="btn btn-default btn-xs disabled " style="cursor:pointer"href="#" class="dcs-pointer" data-toggle="modal" data-target="#modalDiv" data-id="<?php echo $client["client_id"] ?>" data-action="coustm_rate">Discount (<?php echo $client ["coustm_rate"]; ?>%)</button>
                                                    </td>
               
               
               
               
               <td class="td-caret" data-label="Action">
                 <div class="dropdown pull-right">
                   <button type="button" class="btn btn-default btn-xs dropdown-toggle btn-xs-caret" data-toggle="dropdown">Options <span class="caret"></span></button>
                   <ul class="dropdown-menu">
                     <li><a style="cursor:pointer;"  data-toggle="modal" data-target="#modalDiv" data-action="edit_user" data-id="<?=$client["client_id"]?>">Edit User</a></li>
                   <?php if( $client["client_type"] == 2 ): ?>  <li><a href="<?php echo site_url("admin/clients/login/".$client["client_id"]) ?>">Open Account</a></li> <?php endif; ?>

                     <li><a style="cursor:pointer;"  data-toggle="modal" data-target="#modalDiv" data-action="pass_user" data-id="<?=$client["client_id"]?>">Change Password</a></li>
                     <li><a style="cursor:pointer;"  data-toggle="modal" data-target="#modalDiv" data-action="secret_user" data-id="<?=$client["client_id"]?>">Special Categories</a></li>
                 
                     <?php if( $client["client_type"] == 1 ): $type = "active"; else: $type = "deactive"; endif; ?>
                     <li><a href="<?php echo site_url("admin/clients/".$type."/".$client["client_id"]) ?>"><?php if( $client["client_type"] == 1 ): echo "Activate account"; else: echo "Suspend account"; endif; ?> </a></li>
                     <li><a href="<?php echo site_url("admin/clients/del_price/".$client["client_id"]) ?>">Delete Discounts</a></li>
                   </ul>
                 </div>
               </td>
             </tr>
          <?php endforeach; ?>

        </tbody>
    </table>
    </div>

    <?php if( $paginationArr["count"] > 1 ): ?>
      <nav>
        <ul class="pagination">
          <?php if( $paginationArr["current"] != 1 ): ?>
            <li class="page-item"><a class="page-link" href="<?php echo site_url("admin/clients/1".$search_link) ?>">&laquo;</a></li>
            <li class="page-item"><a class="page-link" href="<?php echo site_url("admin/clients/".$paginationArr["previous"].$search_link) ?>">&lsaquo;</a></li>
          <?php
              endif;
              for ($page=1; $page<=$pageCount; $page++):
                if( $page >= ($paginationArr['current']-9) and $page <= ($paginationArr['current']+9) ):
          ?>
            <li class="page-item <?php if( $page == $paginationArr["current"] ): echo "active"; endif; ?> ">
              <a class="page-link" href="<?php echo site_url("admin/clients/".$page.$search_link) ?>"><?php echo $page ?></a>
            </li>
          <?php endif; endfor;
                if( $paginationArr["current"] != $paginationArr["count"] ):
          ?>
            <li class="page-item"><a class="page-link" href="<?php echo site_url("admin/clients/".$paginationArr["next"].$search_link) ?>">&rsaquo;</a></li>
            <li class="page-item"><a class="page-link" href="<?php echo site_url("admin/clients/".$paginationArr["count"].$search_link) ?>">&raquo;</a></li>
          <?php endif; ?>
        </ul>
      </nav>
    <?php endif; ?>


</div>

<?php include 'footer.php'; ?>
