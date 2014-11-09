<!doctype html>

<html>


	<head>
		<title>BOOTSTRAP</title>
		<link rel="stylesheet" href="css/main.css">

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">


	</head>


	<?php

		include('connect.php');

		if(isset($_POST['submit'])){

			$username = $_POST['username'];
			$password = $_POST['password'];

			$fname = $_POST['fname'];
			$mname = $_POST['mname'];
			$lname = $_POST['lname'];

			$contactnum = $_POST['contactnum'];
			$email = $_POST['email'];
			$address = $_POST['address'];
			$gender = $_POST['gender'];
			$dateofbirth = $_POST['dateofbirth'];
			$cstatus = $_POST['cstatus'];
			$sponsor = $_POST['sponsor'];
			$parent = $_POST['parent'];	
			$position = $_POST['position'];	
			


			// chi edit
				$layer = $_POST['layer'];	
				$layerposition = $_POST['layerposition'];
			// end of edit


			// INSERT TO USERS
				$insert  = $db->query("INSERT INTO `Users`(`userId`, `sponsorId`, `parentId`, `position`, `layer`, `layerPosition`, `userName`, `password`, `fName`, `mName`, `lName`, `contactNum`, `email`, `address`, `gender`, `dateOfBirth`, `cStatus`, `type`, `status`, `activationCode`, `dateAdded`, `dateActivated`) 
									  VALUES ('','".$sponsor."','".$parent."','".$position."','".$layer."','".$layerposition."','".$username."','".$password."','".$fname."','".$mname."','".$lname."','".$contactnum."','".$email."','".$address."','".$gender."','".$dateofbirth."','".$cstatus."','1','active','12346790',now(),'')");
			// END INSERT TO USERS

			// NEWLY GENERATED USER ID
			$ref = $db->insert_id;	

	
			// DIRECT REFERRALS

						// COUNT DIRECT REF COUNT
							$quedirectref = $db->query("SELECT COUNT(refId) FROM Referrals WHERE mainSponsor = '".$sponsor."'");
							$directcount = $quedirectref->fetch_array();
							$dcnt = $directcount[0] + 1;
						// END DIRECT REF COUNT


						// INSERT DIRECT REFERRALS
							$insertdirectRef = $db->query("INSERT INTO `Referrals`(`refId`, `mainSponsor`, `subSponsor`, `amount`, `count`, `status`,`type`, `referralDate`, `encashedDate`) 
													 VALUES ('','".$sponsor."','".$ref."','400','".$dcnt."','pending','direct',now(),'')");

			// END DIRECT REFERRALS	



			// INSERT INDIRECT REFERRALS	

							
							$i = 1;
							do{					

									$topin = $db->query("SELECT parentId,userId FROM Users WHERE userId = '".$parent."' AND parentId IS NOT NULL");
									$intop = $topin->fetch_array();
									$in = $intop[0];
									
									 if($in != 0){
										 $insertindirectRef = $db->query("INSERT INTO `Referrals`(`refId`, `mainSponsor`, `subSponsor`, `amount`, `count`, `status`,`type`, `referralDate`, `encashedDate`) 
										 		 						 VALUES ('',".$in.",'".$ref."','10','','pending','indirect',now(),'')");
									 }		

									 $parent = $in;
									 $i++;	
							} while($i<=20 && $in != 0);
			// END INDIRECT REFERRALS	


			if($insert){
					echo "<script>alert('hey');</script>";
			}
		

		}
	?>
	<body>	

		<div class="container">
			<div class="row">
				<div class="darkBG col-sm-12">

					<form action="index.php" method="post">
						<div class="input-group-sm">

							  <input type="text" class="form-control" name="username" placeholder="Username">
							  <input type="text" class="form-control" name="password" placeholder="Password">

							  <input type="text" class="form-control" name="fname" placeholder="First Name">
							  <input type="text" class="form-control" name="mname" placeholder="Middle Name">
							  <input type="text" class="form-control" name="lname" placeholder="Last Name">

							  <input type="text" class="form-control" name="contactnum" placeholder="Contact Number">
							  <input type="text" class="form-control" name="email" placeholder="Email">
							  <input type="text" class="form-control" name="address" placeholder="Address">
							  <input type="text" class="form-control" name="gender" placeholder="Gender">
							  <input type="text" class="form-control" name="dateofbirth" placeholder="Date of Birth">
							  <input type="text" class="form-control" name="cstatus" placeholder="Civil Status">
							  <input type="text" class="form-control" name="sponsor" placeholder="Sponsor Id">
							  <input type="text" class="form-control" name="parent" placeholder="Parent Id">
							  <input type="text" class="form-control" name="position" placeholder="Position">
							<!-- edit chi -->
							  <input type="text" class="form-control" name="layer" placeholder="level">
							  <input type="text" class="form-control" name="layerposition" placeholder="positionlevel">
							  <!-- end edit chi -->


							 <div class="btn-group">
	  							<input type="submit" class="btn btn-default" name="submit" value="Submit">
	  						</div>

						 </div>
					</form>

				</div>
			</div>
		</div>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

	</body>


</html>