<?php

	include('connect.php');
	error_reporting(0);




				

				$user = '5';	

				$queindirectref = $db->query("SELECT SUM(amount) FROM Referrals WHERE mainSponsor = '".$user."'  and type = 'indirect'");
				$indirectcount = $queindirectref->fetch_array();
				echo "you have ".$indirectcount[0]."petot</br>";



				$topin2 = $db->query("SELECT parentId,userId FROM Users WHERE userId = '".$user."' AND parentId IS NOT NULL");
				$intop2 = $topin2->fetch_array();
				echo "user:". $parent = $intop2[0]."</br>";

				for($i = 1;$i <= 20 ;$i++){						

						$topin = $db->query("SELECT parentId,userId FROM Users WHERE userId = '".$parent."' AND parentId IS NOT NULL");
						$intop = $topin->fetch_array();
						echo "cnt: ".$i." parent: ". $in = $intop[0];
						
						 echo "user: ".$intop[1]."<br/>";

						 if($in != 0){

						 	// $che = $i*10;
		 					// echo "you have".$che."petot</br>";


							 $insertindirectRef = $db->query("INSERT INTO `Referrals`(`refId`, `mainSponsor`, `subSponsor`, `amount`, `count`, `status`,`type`, `referralDate`, `encashedDate`) 
							 		 						 VALUES ('',".$in.",'','10','','pending','indirect',now(),'')");
						 }
						 
						 $parent = $in;

					}
