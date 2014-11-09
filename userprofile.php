<?php 



ob_start();
include 'connect.php';
include 'sessions.php';

// echo $userID. '<br>'; //$_SESSION['userid'];
// echo $userName. '<br>'; //$_SESSION['userid'];
// echo $sonsorID. '<br>'; //$_SESSION['userid'];
// echo $parentID. '<br>'; //$_SESSION['userid'];
// echo $activationDate. '<br>'; //$_SESSION['userid'];
// echo $userStatus. '<br>'; //$_SESSION['userid'];
// echo $userActivationCode. '<br>'; //$_SESSION['userid'];

?>
<div>
	<a href = ''>home </a>| my account | My Business | My Earnings | My Purchase | <a href = "logout.php">logout</a>
</div>	
<hr>
Account information
<hr>
<div>
	welcome back! <?php echo $userID. '<br>'; ?>
	member since <?php echo $activationDate = date("Y-m-d",strtotime($time)). '<br>'; ?>
	profile picture embed image here!<br>
	<a href='encashment.php'>encashment</a><br>
	<a href='gcencashment.php'>gcencashment</a><br>
	
	announcments (from database)
</div>
<hr>
income information <br>
<hr>

<?php 
$q = "Select *, sum(amount) as sumA from referrals where mainSponsor = '{$userID}' AND type = 'direct'";
$res = $db->query($q);
$totalDirectRef = $res->fetch_array();
?>
direct bonus: <?php echo $totalDirect = $totalDirectRef['sumA'];?><br>

<?php 
$q = "Select *, sum(amount) as sumA from referrals where mainSponsor = '{$userID}' AND type = 'indirect'";
$res = $db->query($q);
$totalinDirectRef = $res->fetch_array();
?>
Indirect Bonus: <?php echo $totalIndirect = $totalinDirectRef['sumA'];?><br>

<?php 
$q = "Select count(sponsorId) as sumAp, status  from pairs where sponsorId = '{$userID}' AND status = 'paired'";
$res = $db->query($q);
$totalPairBonus = $res->fetch_array();
?>
Pairing Bonus: <?php echo $totalPairBonus = $totalPairBonus['sumAp'] * 250; ?>


<br>
Leadership Bonus: <?php
$LB = $totalDirect + $totalIndirect + $totalPairBonus;
$totalLb = $LB/10;
echo $totalLb;
?><br>

<?php 
$q = "Select *, sum(amount) as sumA from referrals where mainSponsor = '{$userID}' AND type = 'indirect'";
$res = $db->query($q);
$totalinDirectRef = $res->fetch_array();
?>
5th pair: <?php //echo $totalinDirectRef['sumA'];?><br>

<?php 
$q = "Select *, sum(amount) as sumA from referrals where mainSponsor = '{$userID}' AND type = 'indirect'";
$res = $db->query($q);
$totalinDirectRef = $res->fetch_array();
?>
Total Enchashment: <?php //echo $totalinDirectRef['sumA'];?><br>

<br>
<br>

Total Earnings: <?php echo $te = $totalinDirectRef['sumA'] + $totalDirectRef['sumA'] + $totalPairBonus['sumAp']; ?>
<br>
Total Available Commision: <?php echo $te / 10 ;?>

<hr>
Network Information: 
<hr>
<br>
<?php 
$q = "SELECT count(sponsorId) as cSic FROM `users` WHERE sponsorId = '{$userID}'";
$res = $db->query($q);
$totalinDwnLne = $res->fetch_array();
?>
Total Downline Count: <?php echo $totalinDwnLne['cSic'];?><br>
<br>
<br>
<?php 
$q = "SELECT count(sponsorId) as cSicR FROM `users` WHERE sponsorId = '{$userID}' AND position = 'R'";
$res = $db->query($q);
$totalinDwnLneR = $res->fetch_array();
?>
Total Right: <?php echo $totalinDwnLneR['cSicR'];?><br>

<?php 
$q = "SELECT count(sponsorId) as cSicL FROM `users` WHERE sponsorId = '{$userID}' AND position = 'L'";
$res = $db->query($q);
$totalinDwnLneL = $res->fetch_array();
?>
<br>
Total Left: <?php echo $totalinDwnLneL['cSicL'];?><br>
<br>
<br>
Available Right: 
<br>
Available Left:
<br>
<br> 