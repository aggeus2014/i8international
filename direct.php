<?php



	include('connect.php');




	if(isset($_GET['user'])){


		$ref = $db->query("SELECT * FROM Referrals WHERE mainSponsor = '".$_GET['user']."' and type='direct'");


			echo "<table>";
			while($r = $ref->fetch_array()){


				echo "<tr>";
				echo "<td>".$r[0]."<td/>";
				echo "<td>".$r[1]."<td/>";
				echo "<td>".$r[3]."<td/>";
				echo "<td>".$r[4]."<td/>";
				echo "<td>".$r[5]."<td/>";
				echo "<td>".$r[6]."<td/>";
				echo "<td>".$r[7]."<td/>";
				echo "</tr>";

			}
	}

	else{

			$users = $db->query("SELECT * FROM Users WHERE status = 'active'");

			while($u = $users->fetch_array()){

				echo "<a href='direct.php?user=".$u[0]."'>".$u[0]."</a><br/>";

			}

	}









?>