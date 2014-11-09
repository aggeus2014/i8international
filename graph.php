<!DOCTYPE html>
<?php 
session_start();
//USER
$_SESSION['user'] = 1;
?>
<html>
	<head><title>GRAPH</title></head>
	<style>
	.circle{
		height:100px;
		width:100px;
	}
	</style>
	<body>
		<?php
		include("connect.php");
		
		$query = $db->query("SELECT * FROM users WHERE sponsorId = $_SESSION[user]");
		while($row = $query->fetch_array())
		{
			echo "
			<script>
			var ico = document.getElementByClass('circle');
			for(var i = 0; i < ico.length; i++) {
				console.log(Array.prototype.indexOf.call(lis, lis[i]));
			};
			</script>
			";
		}
		?>
		<img src = "images/circle.jpg" class = 'circle' title = '<?php echo $_SESSION['user']; ?>' id = '<?php echo $_SESSION['user']; ?>'/>
		<br />
		<img src = "images/circle.jpg" class = 'circle' />
		<img src = "images/circle.jpg" class = 'circle' />
		<br />
		<img src = "images/circle.jpg" class = 'circle' />
		<img src = "images/circle.jpg" class = 'circle' />
		<img src = "images/circle.jpg" class = 'circle' />
		<img src = "images/circle.jpg" class = 'circle' />
		<br />
		<img src = "images/circle.jpg" class = 'circle' />
		<img src = "images/circle.jpg" class = 'circle' />
		<img src = "images/circle.jpg" class = 'circle' />
		<img src = "images/circle.jpg" class = 'circle' />
		<img src = "images/circle.jpg" class = 'circle' />
		<img src = "images/circle.jpg" class = 'circle' />
		<img src = "images/circle.jpg" class = 'circle' />
		<img src = "images/circle.jpg" class = 'circle' />
	</body>
</html>