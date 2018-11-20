
<?php $prof = current($profile); ?>
<?php 

    
    echo "<span class='text-secondary lead ml-md-3 font-weight-bold'>Profile Detail | </span>".pflink($prof->id);
    $pftab = $this->session->pftab ?? "details-tab";
    // pf($pftab);

?>
<hr>
<div class="m-mx-3">
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link <?=$pftab === "details-tab" ? 'active' : null ?>" id="details-tab" data-toggle="tab" href="#details" role="tab" aria-controls="details" aria-selected="false">PATIENT INFO</a>
  </li>
  <li class="nav-item ">
    <a class="nav-link <?=$pftab === "home-tab" ? 'active' : null ?>" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">DIAGNOSIS</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?=$pftab === "presc-tab" ? 'active' : null ?>" id="presc-tab" data-toggle="tab" href="#presc" role="tab" aria-controls="presc" aria-selected="false">PRESCRIPTION</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?=$pftab === "misc-tab" ? 'active' : null ?>" id="misc-tab" data-toggle="tab" href="#misc" role="tab" aria-controls="contact" aria-selected="false">MISC</a>
  </li>

</ul>



<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade <?=$pftab === "details-tab" ? 'show active' : null ?>" id="details" role="tabpanel" aria-labelledby="details-tab">
  <?=$this->load->view('editprofile')?>
  </div>
  
  <div class="tab-pane fade <?=$pftab === "home-tab" ? 'show active' : null ?>" id="home" role="tabpanel" aria-labelledby="home-tab">
    <?=$this->load->view('diagnosis')?>
  </div>


  <div class="tab-pane fade <?=$pftab === "presc-tab" ? 'show active' : null ?>" id="presc" role="tabpanel" aria-labelledby="presc-tab">
    <?=$this->load->view('prescription')?>
  </div>

  <div class="tab-pane fade <?=$pftab === "misc-tab" ? 'show active' : null ?>" id="misc" role="tabpanel" aria-labelledby="misc-tab">
    <div class="p-md-5">
      <p><a href="<?=base_url('patient/svc/refraction')?>" class="btn btn-primary btn-sm m-2">REFRACTION</a></p>
      <p><a href="<?=base_url('patient/svc/lab')?>" class="btn btn-primary btn-sm m-2">LAB & SURGERY</a></p>
      <p><a href="<?=base_url('patient/svc/paed')?>" class="btn btn-primary btn-sm m-2">PAEDIATRIAC</a></p>
      <p><a href="<?=base_url('patient/svc/bills')?>" class="btn btn-primary btn-sm m-2">BILLING</a></p>
    </div>
  </div>


</div>
</div>



<script>
  $(".nav-tabs .nav-link").click(function(){
    $.post("<?=base_url('patient/setpf_tab/')?>" + this.id )
  })
</script>



<style>
  .tab-pane {
    background:#fff !important;
    height: -webkit-fill-available;
  }
  .nav-tabs .nav-link:hover {
    color:red !important ;
  }
</style>  