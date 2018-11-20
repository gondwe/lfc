<a href="" class="btn btn-primary btn-sm pull-right">CLEAR NOTIFICATIONS</a>
<?php 

echo topic("recent notifications");

?>


<link rel="stylesheet" href="<?=base_url('assets/css/jquery-ui.css')?>">
<link rel="stylesheet" href="<?=base_url('assets/css/dataTables.jqueryui.min.css')?>">
<div class="ml-md-4">

    <?php foreach($notes as $n): ?>
        <div class="bg-beige mb-1 lead rowd">
            
            <span><?=rxx($n->to_, 2)?></span>
            <span><?=$n->message?></span>
            <span class='float-right'><?=datef($n->date)?></span>
        </div>
    <?php endforeach; ?>

<?php

// pf($notes);


?>

<style>
    .bg-beige:hover {
        background:darkmagenta;
    }
    .bg-beige  > span {
        padding-left:2px;
    }
    .bg-beige  {
        background:#8bc34a;
        border-bottom:1px solid #dcdcdc;
        color:white;
        padding:3px;
        /* margin-bottom:3px; */
    }
    table {
        width:100%;
    }
</style>


<script>

	$(document).ready(function() {
		$("#example").DataTable({
			pageLength:25
		});
	} );

</script>