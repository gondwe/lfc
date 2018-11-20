

<?php 

echo topic("refraction");


?>

<div class="card border-top-0 p-3 p-md-5 rounded" >
<?=pflink($this->session->activepatient);?>
<table class="table w-100">
<thead>
    <tr class='text-center'>
        <th></th>
        <th>Sphere</th>
        <th>Cylinder</th>
        <th>Axis</th>
        <th>VA</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td>OD</td>
        <td class='mx-md-1 py-0'><input type="text" name="names" class="rounded m-1 form-control"></td>
        <td class='mx-md-1 py-0'><input type="text" name="names" class="rounded m-1 form-control"></td>
        <td class='mx-md-1 py-0'><input type="text" name="names" class="rounded m-1 form-control"></td>
        <td class='mx-md-1 py-0'><input type="text" name="names" class="rounded m-1 form-control"></td>
    </tr>
   
    <tr>
        <td>OS</td>
        <td class='mx-md-1 py-0'><input type="text" name="names" class="rounded m-1 form-control"></td>
        <td class='mx-md-1 py-0'><input type="text" name="names" class="rounded m-1 form-control"></td>
        <td class='mx-md-1 py-0'><input type="text" name="names" class="rounded m-1 form-control"></td>
        <td class='mx-md-1 py-0'><input type="text" name="names" class="rounded m-1 form-control"></td>
    </tr>
   
    <tr>
        <td>ADD</td>
        <td colspan=3 class='mx-md-1 py-0'><input type="text" name="names" class="rounded m-1 form-control"></td>
        <td class='mx-md-1 py-0'><input type="text" name="names" class="rounded m-1 form-control"></td>
    </tr>
   
    <tr>
        <td>NOTES</td>
        <td colspan=4 class='mx-md-1 ml-1 py-1'><textarea name="" class="form-control rounded" cols="30" rows="5"></textarea></td>
    </tr>
    <tr>
        <td></td>
        <td colspan=4 class='mx-md-1 py-0'><button type="submit" class="btn btn-primary pull-right m-3" >SAVE DETAILS</button></td>
    </tr>
   
</tbody>
</table>
<!-- <label for="notes">NOTES</label> -->



</div>
