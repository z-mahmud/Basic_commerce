<!DOCTYPE html>
<html>

<?php include 'header.php'; ?>

<head><title>Home</title></head>

<body class="maincontent">
	<?php
		if(!isset($_COOKIE['visit'])){
			setcookie("visit", "1", time()+8600, "/") or die("can not set cookie");
			echo "welcome";
		}
		else echo "welcome back !"
		
	?>
	<hr/>
	<p>HOME</p>
	<hr/>
	<?php
		if(isset( $_POST['submit'])) {
		echo $_POST['name'];
		echo"<br>";
		echo $_POST['email'];
		echo"<br>";
		echo $_POST['select'];
		}
	?>
	<hr/>
</body>
</body>
</body>

<?php include 'footer.php'; ?>

</html>
