<?php

include('connect.php');
$sponsor = 1;

	$quepair = $db->query("SELECT COUNT(pairId) FROM Pairs WHERE sponsorId = '" . $sponsor . "'");
			
			$paircount = $quepair->fetch_array();
			echo 'pair count: '.$pcnt = $paircount[0].'<br>';



	$check = $db->query("SELECT userId FROM users WHERE sponsorId = '".$sponsor."' AND position = 'R'");				

				if($affected = $db->affected_rows){
					$rpos = $check->fetch_array();
					$r = $rpos[0];	
					echo 'if left, pair to: '.$r.'<br>';
					}
	
	$fifththPair = $db->query( "SELECT count(sponsorId) from pairs where sponsorId = '{$sponsor}'" );

			$fifththPair1 = $fifththPair->fetch_array();
			echo '5th level : '.$fifththPair = $fifththPair1[0].'<br>';

?>