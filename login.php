<?php 
include 'connect.php';
include 'sessions.php';



echo $uname = $_POST['username'];
echo $upass = $_POST['password'];
echo '<hr>';

if(isset($_POST['submit'])){
	$q = "SELECT * FROM users WHERE userName = '{$uname}' AND password = '{$upass}' LIMIT 1";
	$search = $db->query($q);
	if($search->num_rows == 1){
		$founduser = $search->fetch_array();
				
				$_SESSION['userid'] = $founduser['userId'];
				$_SESSION['username'] = $founduser['userName'];
				$_SESSION['sponsorid'] = $founduser['sponsorId'];
				$_SESSION['parentid'] = $founduser['parentId'];
				$_SESSION['dateactivated'] = $founduser['dateActivated'];
				$_SESSION['status'] = $founduser['status'];
				$_SESSION['activationCode'] = $founduser['activationCode'];	
				header('Location: userprofile.php');	
	}else{
		echo 'no user';
	}	
}


?>
<div>
<form action='' name='login' method='POST'>
	<input type='text' name='username' value=''>
	<input type='text' name='password' value=''>
	<input type='submit' name='submit' value='login'>
</form>

</div>