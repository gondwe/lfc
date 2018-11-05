<h5 class="m-5">Pharmacy</h5>
<?php ?>

<div class="col-md-12" style="background-color:#fff; padding:10px 10px 10px 10px;">
    <h2>Qued Patients</h2>
   <div > 
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Patient Name</th>
                <th>Doctors Name</th>
                <th>Requested Test</th>
                <th>Action</th>
            </tr>
            <tr>
                    <td>HMF898-787</td>
                <td>Tom Kamau</td>
                <td>Dr. Hassan Ali</td>
                <td>BPM Test</td>
                <td><a href="" class="btn btn-primary">Check</a></td>
            </tr>
            <tr>
                    <td>HMF898-787</td>
                <td>Tom Kamau</td>
                <td>Dr. Hassan Ali</td>
                <td>BPM Test</td>
                <td><a href="" class="btn btn-primary">Check</a></td>
            </tr>
        </table>
   </div>

   <div class="col-md-12" style="margin-top:10px;">
   <h3>Test: BMP TEST</h3>
   <hr>


<div class="col-md-12">
    <div class=row>
        <div class="col-md-3">
                <label for="test">Test</label> 
        
            <select id="test" name="test" required="required" class="custom-select">
                <option value="bmp test">BMP TEST</option>
                <option value="hrs test">HRS TEST</option>
                <option value="hiv test">HIV TEST</option>
            </select>
        </div>

        <div class="col-md-3">
                <label for="status">Status</label> 
        
            <select id="status" name="status" required="required" class="custom-select">
                <option value="positive">POSITIVE</option>
                <option value="negative">NEGATIVE</option>
            </select>
        </div>

         <div class="col-md-3">
                <label for="status">Notes</label> 
        
                <textarea id="textarea" name="textarea" cols="40" rows="5" class="form-control"></textarea>
        </div>

         <div class="col-md-1">
         <label for="status">.</label> 
                <button class="form-control btn btn-primary btn-sm"> <i class="fa fa-plus"></i></button>
        </div>


    </div>
    <button style="margin-top:10px;" class="btn btn-primary">Submit</button>
</div> 
   
        <div>
        </div>
   </div> 
</div>
