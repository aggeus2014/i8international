<?php

	include('connect.php');
	error_reporting(0);




				

				$user = '1';	

				// $queindirectref = $db->query("SELECT SUM(amount) FROM Referrals WHERE mainSponsor = '".$user."'  and type = 'indirect'");
				// $indirectcount = $queindirectref->fetch_array();
				// echo "you have ".$indirectcount[0]."petot</br>";



				// $topin2 = $db->query("SELECT parentId,userId FROM Users WHERE userId = '".$user."' AND parentId IS NOT NULL");
				// $intop2 = $topin2->fetch_array();
				// echo "user:". $parent = $intop2[0]."</br>";

				// for($i = 1;$i <= 4 ;$i++){						
						$topin = $db->query("SELECT userId FROM Users WHERE parentId = '".$user."'");
						
						while($intop = $topin->fetch_array()){
							echo "*".$in = $intop[0];
							
							 $topin2 = $db->query("SELECT userId FROM Users WHERE parentId = '".$in."'");
								 while($intop2 = $topin2->fetch_array()){
										 echo "from".$in."-".$in2 = $intop2[0];
										 
										$topin3 = $db->query("SELECT userId FROM Users WHERE parentId = '".$in2."'");
											while($intop3 = $topin3->fetch_array()){
											 echo "from".$in2."-".$in3 = $intop3[0];
											 
											 $topin4 = $db->query("SELECT userId FROM Users WHERE parentId = '".$in3."'");
											while($intop4 = $topin4->fetch_array()){
											 echo "from".$in3."-".$in4 = $intop4[0];
											 
										 
											}	
											 
										 
											}		
										 
										 
								 }							
						}					
						
						  $user = $in;
						// }

						
						
						

					
					
