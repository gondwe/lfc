<div class="p-2 pt-5">
<div class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Prescription</div>


<form action="<?=base_url('patient/saveprescription')?>" method="post" class='mt-4'>
    <table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Drug</th>
            <th>OD/OS</th>
            <th>Freq</th>
            <th>Duration</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
        <tr>
            <td>Drug</td>
            <td>
                <input type="checkbox" name="od[]" id="">OD
                <input type="checkbox" name="os[]" id="">OS
            </td>
            <td>
                <input type="text" name='freq[]' placeholder="1x3" class="form-control">
            </td>
            <td>
                <div class="input-group">
                    <input type="text" name='days[]' placeholder='5' class="form-control">
                    <div class="input-group-append">
                        <div class="input-group-text">Days</div>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</form>

</div>