<a href="" class="btn btn-primary btn-sm pull-right">CLEAR NOTIFICATIONS</a>
<?php 

echo topic("recent notifications");

?>


<!-- <div class="d-block bg-beige p-1 m-1">Thins</div> -->
<!-- <div class="d-block bg-beige p-1 m-1">Thins</div> -->

<table class="table-striped example">
    <thead>
        <tr>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($notes as $n): ?>
        <tr class="bg-beige m-1">
            <td><?=rxx($n->to_)?></td>
            <td><?=$n->message?></td>
            <td class='text-right'><?=datef($n->date)?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php

// pf($notes);


?>

<style>
    .bg-beige > td {
        background:#8bc34a;
        border-bottom:1px solid #dcdcdc;
        color:white;
        padding:3px;
    }
    table {
        width:100%;
    }
</style>