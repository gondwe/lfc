
<table id="example" class='table table-compact m-md-3' width="100%"   >
    <thead style="border-bottom:1px solid #aaa; padding-bottom:5px ">
        <tr >
            <th style="border-right:1px solid #aaa; ">Sno</th>
            <th>NAMES</th>
            <th>ID NUMBER</th>
            <th>CONTACTS</th>   
            <th>ADDRESS</th>   
            <th  class='text-primary'>ACTION</th>   
        </tr>
    </thead>
    <tbody>
        <?php foreach($search as $k=>$j): ?>
        <tr>
            <td class='pl-5' style="border-right:1px solid #aaa"><?=$k+1?></td>
            <td><?=$j->patient_names?></td>
            <td><?=$j->nationalid?></td>
            <td><?=$j->tel1?></td>
            <td><?=strtoupper($j->postaladdress)?></td>
            <td style="border-left:1px solid #aaa">
            <a href="<?=base_url("patient/profile/".$j->id)?>" class="btn btn-sm btn-success"><i class="fa fa-user"></i> VIEW</a>
            </td>
            <td >
            <a href="<?=base_url("patient/addcharge/".$j->id)?>" class="btn  btn-warning btn-sm"><i class="fa fa-dollar"></i> Charge</a>
            </td>
            <td >
            <a href="<?=base_url("doctor/diary/".$j->id)?>" class="btn  btn-sm btn-info ">Book</a>
            </td>
        </tr>
        <?php endforeach; 
        if(empty($search)) echo "<tr><td colspan = '6'>No Data Found !</td></tr>";
        ?>
    </tbody>
</table>

<div class="mb-30"><br></div>
