<?php

?>

<div class="dropdown nav-item">
      <a id="dropdownBasic2" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle" aria-expanded="false">
        <i class="fa fa-bell text-light"></i>
        <span onclick="allRead()" class="notification badge badge-pill badge-warning"><?=$msgcount?></span>
      </a>

      <div class="notification-dropdown dropdown-menu dropdown-menu2 dropdown-menu-right " style="min-width: 350px;">
          <div class="" data-ps-id="">
            <?php foreach ($new as $key=>$value): $last= current($value); 
              $pending = count($value);
              $bell = $pending > 1 ? "danger" : "secondary";
            ?>
            <!-- <span> -->
            <span onclick="viewchat('<?=$key?>')" class="dropdown-item noti-container border-bottom border-bottom-blue-grey border-bottom-lighten-4">
              <i class="fa fa-bell float-left text-<?=$bell?> d-block mt-1 mr-2"></i>
                <span class="pull-right badge btn-light badge-pill text-<?=$bell?>"><?=$pending?></span>
                <span class="d-block font-weight-bold text-secondary">
                  <?=rx($ul[$last->from_])?>
                </span>
                <span class="noti-text text-truncate d-inline-block ml-4" style="max-width:250px">
                <?=$last->message?>
                </span>
              </span>


            <?php endforeach; ?>


          <?php 
              if(!empty($older)){
              foreach ($older as $key=>$value): $last= current($value); 
            ?>
            <span onclick="viewchat('<?=$key?>')" class="dropdown-item noti-container border-bottom border-bottom-blue-grey border-bottom-lighten-4">
              <i class="fa fa-bell float-left text-dim d-block mt-1 mr-2"></i>
                <span class="pull-right badge btn-light badge-pill text-dim"></span>
                <span class="d-block font-weight-bold text-grey">
                  <?=rx($ul[$last->from_])?>
                </span>
                <span class="noti-text text-dim text-truncate d-inline-block ml-4" style="max-width:250px">
                <?=$last->message?>
                </span>
              </span>
            <?php endforeach; } ?>


            <a href='<?=base_url("user/inbox")?>' class="text-danger text-center d-block">All Messages..</a>



            <!-- show the notifications just below inbox  -->
            <?php 
              if(!empty($gnotes)){
                foreach ($gnotes as $value):; 
                        ?>
                        <span onclick="viewchat('<?=$value->id?>')" class="dropdown-item noti-container border-bottom border-bottom-blue-grey border-bottom-lighten-4">
                          <i class="fa fa-bell float-left text-primary d-block mt-1 mr-2"></i>
                            <span class="d-block font-weight-bold text-secondary">
                              <?=rxx($value->to_)?>
                            </span>
                            <span class="noti-text text-truncate d-inline-block ml-4" style="max-width:250px">
                            <?=$value->message?>
                            </span>
                          </span>
                        <?php 
                  endforeach;
            ?>
            <?php if($gnotecount > 0){ ?>
            <a href='<?=base_url("user/gnotes")?>' class="text-danger text-center d-block">More Notifications.. (<?=$gnotecount?>)</a>
            <?php } } ?>

        </div>
      </div>
</div>

<style>

.dropdown-item:focus, .dropdown-item:hover { background-color: #fbecff !important; }
.text-grey { color:#7955488a; }
</style>

<script src="<?=base_url('assets/js/notifications.js')?>"></script>