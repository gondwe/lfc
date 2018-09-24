<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LFC: Auth</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" ></link>
    <link rel="stylesheet" href="css/font-awesome.min.css" >
</head>
<body>

<?php

// $branches = getlist("select id, names from branches");
$branches = [];

require("config.php");
am_i_logged_in();
if(isset($_POST["p"])){
    $u = clean($_POST["u"]);
    $p = clean($_POST["p"]);
    login($u,$p);
}
?>

<div class="container" style="margin-top:10%">
    <h4 class="text-center text-info ">
    <span class="text-center h1">
    <i class="text-info fa fa-user-md"></i> 
    </span>
    Lighthouse HMIS
    </h4>
	<div class="row justify-content-center">
		<div class="col-12 col-md-8 col-lg-5 pb-5">


                    <!--Form with header-->

                    <form action="" method="post">
                        <div class="panel border-none rounded-30">
                            <div class="card-header p-0">
                                <!-- <div class="bg-info text-white text-center py-2"> -->
                                    <!-- <h3> Sign In</h3> -->
                                    <p class="m-0 text-danger"><?=$err==""?null:$err?></p>
                                <!-- </div> -->
                            </div>
                            <div class="card-body p-3">

                                <!--Body-->
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                        </div>
                                        <input required type="text" class="form-control" id="uname" name="u" placeholder="Username" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-lock text-info"></i></div>
                                        </div>
                                        <input required type="password" class="form-control" id="password" name="p" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-stethoscope text-primary"></i></div>
                                        </div>
                                        <select  class="form-control" name="branch" id="">
                                            <option value="<?=null?>">SELECT BRANCH</option>
                                        <?php foreach($branches as $bid=>$bname): ?>
                                            <option value="<?=$bid?>"><?=$bname?></option>
                                        <?php endforeach ?>
                                        </select>
                                        <!-- <input required type="password" class="form-control" id="password" name="p" placeholder="Password" required> -->
                                    </div>
                                </div>

                               
                                <div class="text-center">
                                    <button type="submit"  class="col-lg-4 col-md-6 col-sm-8 col-xs-12  pull-right btn btn-success btn-block btn-rounded">Login  <i class='fa fa-sign-in'></i></button>
                                    <a  href='<?=site_url("/forgot.php")?>' class=" m-2 pull-left  text-info">Forgot Password ? </i></a>
                                </div>
                                </div>
                            </div>

                        </div>
                    </form>
                    <!--Form with header-->


                </div>
	</div>
</div >
<div class='fixed-bottom m-3'>
    <!-- <img alt="Lighthouse HMIS"  class="pull-left mb-3 ml-3" style="height:40px" src='<?=image(getlist("select * from settings")->logo, "settings")?>' > -->
    <small style='color:#bbb; bottom:30px' class="pull-left mr-3 pt-3" >All Rights Reserved &copy 2018</small>
    <small style='color:#bbb; bottom:30px' class="pull-right mr-3 pt-3" > Lighthouse For Christ Eye Center</small>
    </body>
</div>
</html>