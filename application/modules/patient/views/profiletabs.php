

<div id="basic-body">

    
    <div class="col-md-6 col-sm-10 col-lg-4 col-xs-12 pull-left">
        <div class="card-body">
          <h5 class="card-title text-primary">Bio Data</h5>
            <h6 class="alert alert-info">
                <p>
                    <strong>Age </strong> <?php echo age($prof->dob) ?><br>
                    <strong>Reg Date : </strong> <?=date_format(new DateTime($prof->date),'jS F, Y')?><br>
                    <strong>Primary Contact </strong> <?=$prof->tel1?><br>
                    <strong>Address :</strong> <?=$prof->postaladdress?><br>
                    <!-- <strong>Residence :</strong> Mshomoroni, Msa<br><br> -->
                    <strong>Category : </strong><span class="pull text-info"><?=$prof->category ?? 'NA' ?></span><br>
                </p>
            </h6>
        </div>
    </div>

    <div class="col-md-6 col-sm-10 col-lg-4 col-xs-12 pull-left">
        <div class="card-body">
        <h5 class="card-title  text-primary">Chief Complaint (Cc.)</h5>
            <h6 class="cc alert alert-danger">
            Knocked down in a bar brawl 
            Knocked down in a bar brawl 
            Knocked down in a bar brawl
            </h6>
        </div>
    </div>
</div>