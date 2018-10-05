<table id="example" class='table table-striped'   >
    <thead >
        <tr>
            <th style="border-right:1px solid #ddd; ">Sno</th>
            <th>Names</th>
            <th>ID Number</th>
            <th>Contacts</th>   
            <th>Address</th>   
            <th style="border-left:1px solid #ddd" class='text-primary'>ACTION</th>   
        </tr>
    </thead>
    <tbody>
        <?php foreach($search as $k=>$j): ?>
        <tr>
            <td style="border-right:1px solid #ddd"><?=$k+1?></td>
            <td><?=$j->patient_names?></td>
            <td><?=$j->nationalid?></td>
            <td><?=$j->tel1?></td>
            <td><?=$j->postaladdress?></td>
            <td style="border-left:1px solid #ddd">
            <a href="<?=base_url("patient/profile/".$j->id)?>" class="btn btn-sm btn-success"><i class="fa fa-user"></i> PROFILE</a>
            <a href="<?=base_url("patient/addcharge/".$j->id)?>" class="btn  btn-warning btn-sm"><i class="fa fa-dollar"></i> Charge</a>
            <a href="<?=base_url("doctor/diary/".$j->id)?>" class="btn  btn-sm btn-info ">Book</a>
            </td>
        </tr>
        <?php endforeach; 
        if(empty($search)) echo "<tr><td colspan = '6'>No Data Found !</td></tr>";
        ?>
    </tbody>
</table>

<div class="mb-30"><br></div>
