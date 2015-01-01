<html>
<head>
<title>seller post
</title>
<link rel="stylesheet" href="style/style.css" type="text/css" />
</head>
<body>
<div id="seller">
<form action="itemseller.php" method="post"><br>
		<b>Seller Id:</b>
		<input type="text"  name="uid">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		
		<b>Item name:</b>
		<input  type="text"  name="iname"><br><br>
		
		<b>Item Id:</b>
		<input type="text"  name="iid">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<b>Category:</b>
		<input  type="text"  name="icat"><br><br>
		
		<b>Minimum Price:</b>
		<input  type="text"  name="iprice">
		
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		
		<b>Time:</b>
		<input  type="text"  name="itime">	<br><br>
		
		
		<b>Item Details:</b><br>
		<textarea rows="4" cols="50" name="idetails"></textarea><br><br>

		
	
		
		<b>Current Time :</b>
		<?php echo date('H:i:s', strtotime("+5 hours + 30 minutes")).'<br>'; ?> <br>
		
		<input class="bn" type="submit" value="post" style="width: 100px; height:50px">
	</form>
	
	<form action="home.php" method="post">
		<input class="bn" type="submit" value="back" style="width: 100px; height:50px">
	</form>
	
	<div id="status"><center><br><h3>check status of previous item<h3><br>
	<form action="status.php" method="post">
		<input class="bn" type="submit" value="check status" name= "check" style="width: 100px; height:50px">
	</form></center>
	</div>
	
		

</div><br>
		

</body>
</html>