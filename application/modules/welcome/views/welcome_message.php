<h3><?=$hello?></h3>
<?php 


// $this->load->helper("fieldsets");
// $this->load->helper("tablo");

// $data = $this->db->query("select * from patient_master limit 10")->result_array();

// spill($data);

// $d = new tablo("patient_master");
// $d->sqlstring = "select * from patient_master limit 10";
// $d->hide(" dob , tel2, ");
// $d->edit(4,"Edit Patient");


// $this->load->view("changelog");
// redirect("screening/dashboard");

// pf($this->session->userdata);
?>
<p class="m-3 alert-light alert">
    Please check with admin for [ Section Assignment ]. Thank you
</p>
<hr>
Other Sections
<div class="m-3">
<a href="<?=base_url('screening/dashboard')?>" class="btn alert-primary btn-primary m-2">Patient Check-In Dashboard</a><br>
<a href="<?=base_url('doctor')?>" class="btn alert-danger btn-primary m-2">Doctors Panel</a><br>
<a href="<?=base_url('pharmacy')?>" class="btn alert-dark btn-primary m-2">Pharmacy Dashboard</a><br>
<a href="<?=base_url('systems/admin')?>" class="btn btn-primary btn-primary m-2">MORE..</a>
</div>
