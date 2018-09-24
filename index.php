
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=90%">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>LFC MIS</title>
	
	
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<link rel="stylesheet" href="css/font-awesome.min.css" >
	<link rel="stylesheet" href="./css/jquery-ui.css">
	<link rel="stylesheet" href="./css/dataTables.jqueryui.min.css">
	<script src="js/jquery-3.3.1.min.js"></script>
	
	<link rel="stylesheet" href="css/custom.css" >
</head>

<body>
	
	<?php
    
    require("config.php");
    include("pages/nav.php");
    
    
	?>

<div id="play" class='col-sm-12 ml-10' style="padding-top:20px">
	<!-- Main Content -->
	<div style="margin:10%" class="content-align-center text-center">
			<div class="page-wrapper pa-0 ma-0 error-bg-img">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle auth-form-wrap">
							<div class="auth-form  ml-auto mr-auto no-float">
								<div class="row">
									<div class="col-sm-12 col-xs-12">
										<div class="mb-30">
											<p class=" text-center mb-10">LOADING...</p>
										</div>	
									</div>	
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->	
				</div>
            </div>
			
        </div>
		<!-- /Main Content -->
	</div>
	
	<?php require("pages/foot.php"); ?>
	<script src='./js/popper.min.js'></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="./js/jquery.dataTables.min.js"></script>
	<!-- <script src="./js/dataTables.jqueryui.min.js"></script> -->
	<script src="js/custom.js"></script>
	
</body>
	</html>