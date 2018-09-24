<div class="modal-body">
    <?php
    include "../../config.php";
    $id = current($_POST);

    $d = get("select v.*, vn.names from voteheads as v
                    left join vhnames as vn on vn.id = v.votehead where v.id = '$id'");

    echo "<h4>$d->names</h4>";

    spill($d);

    
    ?>
    <form action="" method="post">

    </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
</div>