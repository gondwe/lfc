<?php

// pf($recent);
echo titles("Checked Out", null, 1);
?>
<hr>

<ul class="inline-list">
    <?php foreach($recent as $k=>$data): ?>
    <li class="inline-list-item bg-light">
        <span class="col-md-2 text-primary"><?=pflink($data->id) ?></span>
        <span class="col-md-2"><?=$data->ptype?></span>
        <span class=" pull-right alert-primary badge-pill">Call : <?=$data->tel1?></span>
    </li>
    <?php endforeach; ?>

  
</ul>



<style>
    .inline-list-item {
        list-style:none;
        width:100%;
        border-bottom:1px solid #ddd;
        padding:10px 0px 5px 10px;
        margin-bottom:2px

    }
</style>