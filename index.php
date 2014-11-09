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

			// $insert  = $db->query("INSERT INTO users(sponsorId,parentId,position,layer,layerPosition,userName,password,fName,mName,lName,contactNum,email,address,gender,dateOfBirth,cStatus,type,status,activationCode,dateAdded,dateActivated) 
				// VALUES ('$sponsor','$parent','$position','$layer','$layerposition','$username','$password','$fname','$mname','$lname','$contactnum','$email','$address','$gender','$dateofbirth','$cstatus','1','active','12346790',now(),'')");
	$insert  = $db->query("INSERT INTO `users`(`sponsorId`,`parentId`, `position`)
				VALUES (".$sponsor.",".$parent.",'".$position."') ");

				if($sponsor == 0)
				{
					$insert2= $db->query("INSERT INTO `pairing`( `sponsor`, `parentId`, `sponsorPos`, `parentPos`) 
					VALUES (".$sponsor.",0,'T','T')");
				}
				else if($sponsor == $parent)
				{
					$insert2= $db->query("INSERT INTO `pairing`( `sponsor`, `parentId`, `sponsorPos`, `parentPos`) 
					VALUES (".$sponsor.",0,'$position','$position')");					
				}
				else
				{
					do
					{
						$query = $db->query("SELECT parentId,position FROM users WHERE userId = '$parent' AND parentId != 0");
						$res = $query->fetch_array();
						$parent = $res['parentId'];
						$position2 = $res['position'];
					}
					while($sponsor != $parent);
					
					$insert2= $db->query("INSERT INTO `pairing`( `sponsor`, `parentId`, `sponsorPos`, `parentPos`) 
					VALUES (".$sponsor.",".$parent.",'".$position2."','".$position."')");
				}
				// echo "INSERT INTO `pairing`( `sponsor`, `parentId`, `sponsorPos`, `parentPos`) 
					// VALUES (".$sponsor.",".$parent.",".$parent2."','".$position."')";
					


			// $ref = $db->insert_id;

			// $quetop = $db->query("SELECT sponsorId FROM Users WHERE userId = '" . $sponsor . "'");
			// $ftop = $quetop->fetch_array();
			// $top = $ftop[0];		

			// $quedirectref = $db->query("SELECT COUNT(refId) FROM Referrals WHERE mainSponsor = '".$sponsor."' and type = 'direct'");
			// $directcount = $quedirectref->fetch_array();
			// $dcnt = $directcount[0] + 1;


			// // INSERT DIRECT REFERRALS
			// $insertdirectRef = $db->query("INSERT INTO `Referrals`(`refId`, `mainSponsor`, `subSponsor`, `amount`, `count`, `status`,`type`, `referralDate`, `encashedDate`) 
			// 						 VALUES ('','".$sponsor."','".$ref."','400','".$dcnt."','pending','direct',now(),'')");


			// INSERT INDIRECT REFERRALS
			// for($i = 1;$i <= 20 ;$i++){						

			// 			$topin = $db->query("SELECT parentId,userId FROM Users WHERE userId = '".$parent."' AND parentId IS NOT NULL");
			// 			$intop = $topin->fetch_array();
			// 			echo "parent:". $in = $intop[0];
						
			// 			 echo "user:".$intop[1]."<br/>";
 	
			// 			 if($intop2[0] != 0){

			// 				 $insertindirectRef = $db->query("INSERT INTO `Referrals`(`refId`, `mainSponsor`, `subSponsor`, `amount`, `count`, `status`,`type`, `referralDate`, `encashedDate`) 
			// 				 		 						 VALUES ('','".$intop[1]."','','10','','pending','indirect',now(),'')");

			// 			 }
						 
			// 			 $parent = $in;

			// }



			// INSERT PAIRING BONUS
			//commented by chi
			//$quepair = $db->query("SELECT COUNT(pairId) FROM Pairs WHERE sponsorId = '" . $parent . "'");
			//end of comment
			$quepair = $db->query("SELECT COUNT(pairId) FROM Pairs WHERE sponsorId = '" . $sponsor . "'");
			
			$paircount = $quepair->fetch_array();
			$pcnt = $paircount[0] + 1;

			if($position == 'L'){

				//conment by chi
				//$check = $db->query("SELECT userId FROM users WHERE parentId = '".$parent."' AND position = 'R'");				
				//end of comment
				$check = $db->query("SELECT userId FROM users WHERE sponsorId = '".$sponsor."' AND position = 'R'");


				if($affected = $db->affected_rows){
					$rpos = $check->fetch_array();
					$r = $rpos[0];				


					$pair = $db->query("INSERT INTO `Pairs`(`pairId`, `sponsorId`, `left`, `right`, `datePaired`, `count`, `status`, `encashedDate`)
										VALUES ('','".$parent."','".$ref."','".$r."',now(),'".$pcnt."','pending','')");

					$refpair = $db->insert_id;


					//INSERT 5TH PAIR
					if($pcnt % 5){

						$point = $db->query("INSERT INTO `points`(`pointId`, `sponsorId`, `pairId`, `count`, `dateAdded`, `status`, `encashedDate`) 
											VALUES ('','".$parent."','".$parent."','".$refpair."',now(),'pending','')");

					}



				}
				


			}

			else if($position == 'R'){

				$check = $db->query("SELECT * FROM Users WHERE parentId = '".$parent."' AND position = 'L'");
				if($affected = $db->affected_rows){

					$lpos = $check->fetch_array();
					$l = $lpos[0];

					$pair = $db->query("INSERT INTO `Pairs`(`pairId`, `sponsorId`, `left`, `right`, `datePaired`, `count`, `status`, `encashedDate`)
										VALUES ('','".$parent."','".$l."','".$ref."',now(),'','pending','')");

					$refpair = $db->insert_id;	

					
					// INSERT 5TH PAIR
					if($pcnt % 5){

						$point = $db->query("INSERT INTO `points`(`pointId`, `sponsorId`, `pairId`, `count`, `dateAdded`, `status`, `encashedDate`) 
											VALUES ('','".$parent."','".$parent."','".$refpair."',now(),'pending','')");

					}

					
				}

			}


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