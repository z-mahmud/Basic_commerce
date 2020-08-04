<!DOCTYPE html>
<html>
<head>
	<title>Sign in</title>
	<?php include 'header.php'; ?>
</head>
<!---------------------FROMS VALIIDATION----------------------------->
<?php 
	$errorN = $errorE = $errorP = $errorG = "";
	$name = $email = $password = $Gender = "";

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		//-----------name validation---------//
		if(empty($_POST["name"])){
			$errorN = "Name is required";
		}
		else $name = validate($_POST["name"]);
        //-----------email validation---------//
		if(empty($_POST["email"])){
			$errorE = "Email is required";
		}
		elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
			$errorE =  "<span style='color: red'>INVALID EMAIL</span>";
		}
		else $email = validate($_POST["email"]);
        //-----------password validation---------//
		if(empty($_POST["password"])){
			$errorP = "Password is required";
		}
		else $password = validate($_POST["password"]);
        //-----------Gender validation---------//
		if(empty($_POST["Gender"])){
			$errorG = "Gender is required";
		}
		else $Gender = validate($_POST["Gender"]);
		}

		function validate($data) {
				$data = trim($data);
				$data = stripcslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
?>


<body class="maincontent">
	<h1>Reg Page:</h1>
	<form method = "POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
		<h5 style="color: red">require *</h5>
		<table>
		<tr>
			<td>Your name</td>
			<td><input type="text" name="name" placeholder="your name" title="dj"><span style="color: red">*<?php echo $errorN;?></span></td>
		</tr>
		<tr>
			<td>E-mail</td>
			<td><input type="text" name="email" placeholder="your email"><span style="color: red">*<?php echo $errorE;?></span></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password" placeholder="password"><span style="color: red">*<?php echo $errorP ?></span></td>
		</tr>
		<tr>
			<td>Gender:</td>
			<td>
				<input type="radio" name="Gender" value="Male">Male
				<input type="radio" name="Gender" value="Female">Female
			<span style="color: red">*<?php echo $errorG;?></span></td>
		</tr>
		<tr>
			<td>Your qualification:</td>
			<td>
				<select name = "select">
					<option ></option>
					<option value="1">SSC</option>
					<option value="2">HSC</option>
					<option value="3">Graduate</option>
				</select>
			</td>
		</tr>
		
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Reg"></td>
		</tr>
		</table>
	</form>
</body>


</html>