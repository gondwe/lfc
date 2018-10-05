

<div id="basic-body">

    
    <div class="col-md-6 col-sm-10 col-lg-4 col-xs-12 pull-left">
        <div class="card-body">
          <!-- <h5 class="card-title text-primary">Bio Data</h5> -->
                    <a class='text-primary'>Age </a>: <?php echo age($prof->dob) ?><br>
                    <h5><a class='text-primary'>Reg Date : </a> <?=date_format(new DateTime($prof->date),'jS F, Y')?><br></h5>
                    <a class='text-primary'>Primary Contact </a> <?=$prof->tel1?><br>
                    <a class='text-primary'>Address :</a> <?=$prof->postaladdress?><br>
                    <a class='text-primary'>Category : </a><span class="pull text-info"><?=$prof->ptype ?? 'NA' ?></span><br>
        </div>
    </div>

    <div class="col-md-6 col-sm-10 col-lg-4 col-xs-12 pull-left">
        <div class="card-body">
        <h5 class="card-title  text-primary">Chief Complaint (Cc.)</h5>
            <h6 class=" alert alert-light">
            Knocked down in a bar brawl 
            Knocked down in a bar brawl 
            Knocked down in a bar brawl
            </h6>
        </div>
    </div>

    <div class="col-md-6 col-sm-10 col-lg-4 col-xs-12 pull-left">
        <div class="card-body">
        <h5 class="card-title text-primary inline-list">Vision at Screening</h5>
            <span class="badge badge-success p-2 inline-list-item"><h2>Lf 20</h2></span>
            <span class="badge badge-warning p-2 inline-list-item"><h2>Rf 20</h2></span>
            <!-- <h2 class=" alert alert-primary pull-right">Rf </h2> -->
        </div>
    </div>
</div>