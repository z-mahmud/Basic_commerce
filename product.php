<!DOCTYPE html>
<html>
<head>
	<title>Product Reg</title>
	<?php include 'header.php'; ?>
</head>
<body class="maincontent">

<?php 
	$errorPN = $errorV = $errorA = $errorD = $errorI = "";
	$PRname = $PRvalue = $PRamount = $PRselect = $PRcomment = "";

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		//-----------name validation---------//
		if(empty($_POST["PRname"])){
			$errorPN = "Name is required";
		}
		else $PRname = validate($_POST["PRname"]);
        //-----------Value validation---------//
		if(empty($_POST["PRvalue"])){
			$errorV = "Value is required";
		}
		elseif (!filter_var($_POST["PRvalue"], FILTER_VALIDATE_INT)) {
			$errorV =  "<span style='color: red'>Value must be INTEGER NUMBER only</span>";
		}
		else $PRvalue = validate($_POST["PRvalue"]);
        //-----------Amount validation---------//
		if(empty($_POST["PRamount"])){
			$errorA = "Amount is required";
		}
		else $PRamount = validate($_POST["PRamount"]);
        //-----------Delivery validation---------//
		if(empty($_POST["PRselect"])){
			$errorD = "Delivery method is required";
		}
		else $PRselect = validate($_POST["PRselect"]);
		
		if (isset($_FILES['image'])) {
			$filename = $_FILES['image']['name'];
			$filetemp = $_FILES['image']['temp_name'];
			move_uploaded_file($filetemp, "images/".$filename);
		}
		else $errorI = "image is required";
		}

		function validate($data) {
				$data = trim($data);
				$data = stripcslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
?>

<form method = "POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" enctype="multipart/form-data">

	<h5 style="color: red">require *</h5>
	<table>
	<tr>
		<td>Product name</td>
		<td>
			<input type="text" name="PRname" placeholder="your name" title="dj"><span style="color: red">*<?php echo $errorPN;?></span>
		</td>
	</tr>
	<tr>
		<td>Value (per unit)</td>
		<td>
			<input type="text" name="PRvalue" placeholder="your email"><span style="color: red">*<?php echo $errorV;?></span>
		</td>
	</tr>
	<tr>
		<td>Product Discription</td>
		<td>
			<TEXTAREA name="PRcomment" row="5" cols="60" placeholder="Discription"></TEXTAREA>
		</td>
	</tr>
	<tr>
		<td>Amount:</td>
		<td>
			<input type="radio" name="PRamount" value="1">One
			<input type="radio" name="PRamount" value="Many">Many
		<span style="color: red">*<?php echo $errorA;?></span></td>
	</tr>
	<tr>
		<td>Delevry method:</td>
		<td>
			<select name = "PRselect">
				<option ></option>
				<option value="1">Home delevary</option>
				<option value="2">Office delevery</option>
			</select>
			<span style="color: red">*<?php echo $errorD;?></span>
		</td>
	</tr>

	<tr>
		<td>Upload Image</td>
		<td>
			<input type="file" name="image">
			<span style="color: red">*<?php echo $errorI;?></span>
		</td>
	</tr>
		
	<tr>
		<td></td>
		<td><input type="submit" name="submit" value="Post"></td>
	</tr>
	</table>
</form>

</body>
</html>