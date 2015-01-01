	<html>
	<head>
	<title>home</title>
	<link rel="stylesheet" href="style/style.css" type="text/css" />
	</head>
	<body>
	<center>welcome
<?php
		include("db.php");
		
		session_start();	
		echo $_SESSION['name'];
	//	$sid=$_SESSION['SID'];
		$a=$_SESSION['user_id'];
		
		$show=mysql_query("select * from item where seller_id='$a'",$con);
		//$stat=mysql_query("select * from bid where buyer_id='$a'",$con);
		
echo "<html>";
echo "<body>";
//echo $a;
echo "<table bgcolor='#999966' bordercolor='white' border='3' width='1000' cellspacing='2' cellpadding='5'>
			<tr>
					<th>Seller_id</th>
					<th>Item_name</th>
					<th>Item_id</th>
					<th>Item_des</th>
					<th>item_price</th>
					<th>time</th>
					<th>Category</th>
			</tr>";

	while($row=mysql_fetch_array($show))
	{
	    $ro=$row['item_name'];
		$p=mysql_query("select bid_price from bid where item_name='$ro'");
		$r=mysql_fetch_array($p);
		echo "<tr>";
		echo "<td>" . $row['seller_id'] . "</td>";
		echo "<td>" . $row['item_name'] . "</td>";
		echo "<td>" . $row['item_id'] . "</td>";
		echo "<td>" . $row['item_des'] . "</td>";
		echo "<td>" . $r['bid_price'] . "</td>";
		echo "<td>" . $row['time'] . "</td>";
		echo "<td>" . $row['category'] . "</td>";
		echo "</tr>";
	}
echo "</table>";
echo "</body>";
echo "</html>";
mysql_close($con);
?>
<form action="seller.php" method="post">
<input type="submit" value="back" >
</form>
</body>
	
</html>