
<div class="row row-striped">
    <div class="col-md-2 col-xs-12 col-sm-6 col-lg-1">
        <h1 class="display-4"><span class="badge badge-warning"> <?=$date?></span></h1>
        <h4 class='ml-2'>OCT</h4>
        
    </div>
    <div class="col-10">
        <h3 class="text-uppercase"><strong></strong></h3>
        <button class="btn btn-secondary btn-sm">Patients <span class="badge badge-pill badge-light"><?=$patlist?></span></i></button>
        <span class="badge badge-light pull-right p-4 text-dark">
        <a 
            class="btn btn-outline-primary btn-sm"
            data-toggle="modal" 
            data-target="#exampleModal" 
            data-whatever="@mdo"
            data-doc="<?=implode(",",$drlist)?>"
            data-date="<?=$date?>"
            >ENQUEUE</a>
        <h5>
        </h5>
        <h1 id='pcount'><?=$patlist?></h1>
        <a href='<?=base_url('doctor/theatrelist/date/'.$p->id)?>' class="btn  text-success" style='color:#acd'>THEATRE LIST</a>
        </span>
        <div class='ml-2'>
        <ul class="list-inline">
            <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> Monday</li>
            <li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> 8:30 AM - 5:00 PM</li>
            <li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i> In Base</li>
        </ul>
        </div>
        <p>
            <span class="badge badge-success badge-pill"><?=count($drlist)?></span> 
            <strong class='text-secondary'> Doctors on schedule 
            </strong>
                <?php foreach($drlist as $doc): ?>
                    <span class="badge text-info bg-light badge-pill"> <?=$doc?></span>
                <?php endforeach; ?>
            <br>
        <span class="badge badge-success badge-pill"><?=count($procedures)?></span> 
        <strong class='text-secondary'>Procedures
        </strong>
            <span class="alert-light">
                <?php foreach($procedures as $proc): ?>
                <span class="btn text-dark btn-outline-secondary btn-sm"><?=$proc?></span>
                <?php endforeach; ?>
            </span>
        </p>
    </div>
</div>

<hr>