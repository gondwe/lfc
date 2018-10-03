<table id="example" class='table table-striped'   >
    <thead>
        <tr>
            <th>Sno</th>
            <th>Names</th>
            <th>ID Number</th>
            <th>Contacts</th>   
            <th>Address</th>   
            <th ></th>   
        </tr>
    </thead>
    <tbody>
        <?php foreach($search as $k=>$j): ?>
        <tr>
            <td><?=$k+1?></td>
            <td><?=$j->patient_names?></td>
            <td><?=$j->nationalid?></td>
            <td><?=$j->tel1?></td>
            <td><?=$j->postaladdress?></td>
            <td><a href="<?=base_url("patient/profile/".$j->id)?>" class="btn btn-sm btn-success"><i class="fa fa-user"></i> Profile</a>
            <a href="<?=base_url("doctor/diary/".$j->id)?>" class="badge  badge-info">Book</a>
            <a href="<?=base_url("doctor/diary/".$j->id)?>" class="badge  badge-warning"><i class="fa fa-dollar"></i> Charge</a></td>
        </tr>
        <?php endforeach; 
        if(empty($search)) echo "<tr><td colspan = '6'>No Data Found !</td></tr>";
        ?>
    </tbody>
</table>

<div class="mb-30"><br></div>
