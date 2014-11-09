
<?php

	include('connect.php');
	// error_reporting(0);

	


			// INSERT PAIRING BONUS				
														
								$startuser = '4';	
								$startparentId = '';

								do{										
									echo "SELECT parentId,layerPosition,userId FROM Users WHERE userId='".$startuser."'";
									$quepairing = $db->query("SELECT parentId,layerPosition,userId FROM Users WHERE userId='".$startuser."'");
									$fetchpairing = $quepairing->fetch_array();

									echo $startparentId = $fetchpairing[0];
									echo $startposition = $fetchpairing[1];
									echo $startuser = $fetchpairing[2]."<br/>";	

									// $insertpairing = $db->query("INSERT INTO `Pairing`(`pairingId`, `userId`, `sponsorId`, `position`, `dateAdded`, `status`) 
									// 							VALUES ('','".$startuser."','".$startparentId."','".$startposition."',now(),'waiting')");

									// 	$quepaircnt = $db->query("SELECT COUNT(pairId) FROM Pairs WHERE sponsorId='".$startparentId."' AND status != 'encashed'");
									// 	$fetchpaircnt = $quepairing->fetch_array();
									// 	$pcnt = $fetchpaircnt[0] + 1;

									// 	if($startposition == 'L'){


									// 			$check = $db->query("SELECT userId FROM users WHERE parentId = '".$startparentId."' AND position = 'R' ORDER BY dateAdded ASC LIMIT 1");

									// 			if($affected = $db->affected_rows != NULL){

									// 				$rpos = $check->fetch_array();
									// 				$r = $rpos[0];				


									// 				$pair = $db->query("INSERT INTO `Pairs`(`pairId`, `sponsorId`, `left`, `right`, `datePaired`, `count`, `status`, `encashedDate`)
									// 									VALUES ('','".$startparentId."','".$startuser."','".$r."',now(),'".$pcnt."','pending','')");
									// 				$refpair = $db->insert_id;
									// 				$quepointcnt = $db->query("SELECT COUNT(pointId) FROM Points WHERE sponsorId='".$startparentId."' AND status != 'encashed'");
									// 				$fetchpointcnt = $quepointcnt->fetch_array();
									// 				$pointcnt = $fetchpointcnt[0] + 1;

									// 				//INSERT 5TH PAIR
									// 				if($pcnt % 5){
									// 					$point = $db->query("INSERT INTO `Points`(`pointId`, `sponsorId`, `pairId`, `count`, `dateAdded`, `status`, `encashedDate`) 
									// 										VALUES ('','".$startparentId."','".$refpair."','".$pointcnt."',now(),'pending','')");
									// 				}	

									// 			} 

									// 	}else if($startposition == 'R'){

									// 			$check = $db->query("SELECT userId FROM users WHERE parentId = '".$startparentId."' AND position = 'L' ORDER BY dateAdded ASC LIMIT 1");

									// 			if($affected = $db->affected_rows != NULL){
									// 				$lpos = $check->fetch_array();
									// 				$l = $lpos[0];				


									// 				$pair = $db->query("INSERT INTO `Pairs`(`pairId`, `sponsorId`, `left`, `right`, `datePaired`, `count`, `status`, `encashedDate`)
									// 									VALUES ('','".$startparentId."','".$l."','".$startuser."',now(),'".$pcnt."','pending','')");
									// 				$refpair = $db->insert_id;

									// 				$quepointcnt = $db->query("SELECT COUNT(pointId) FROM Points WHERE sponsorId='".$startparentId."' AND status != 'encashed'");
									// 				$fetchpointcnt = $quepointcnt->fetch_array();
									// 				$pointcnt = $fetchpointcnt[0] + 1;

									// 				//INSERT 5TH PAIR
									// 				if($pcnt % 5){
									// 					$point = $db->query("INSERT INTO `Points`(`pointId`, `sponsorId`, `pairId`, `count`, `dateAdded`, `status`, `encashedDate`) 
									// 										VALUES ('','".$startparentId."','".$refpair."','".$pointcnt."',now(),'pending','')");
									// 				}													}	
									// 	}			

								} while($startparentId != NULL);					


			// END PAIRING BONUS
