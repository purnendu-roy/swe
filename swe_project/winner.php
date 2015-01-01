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
		echo $_SESSION['name'].'<br>';
		
		echo "WINNER";
		
		$itid=$_GET['win'];
		$show=mysql_query("select * from bid where item_name='$itid' and time_remain='0:0:0' ",$con);
		//$sbc=mysql_query("select * from login where seller_id='$itid' and time_remain='0:0:0' ",$con);
echo "<html>";
echo "<body>";
echo "<table bgcolor='#99CC66' bordercolor='white' border='3' width='1000' cellspacing='2' cellpadding='5'>
			<tr>
					<th>Seller id</th>
					<th>buyer id</th>
					<th>Item name</th>
					<th>Item id</th>
					<th>selling price</th>
					
		   </tr>";

	while($row=mysql_fetch_array($show))
	{
		echo "<tr>";
		echo "<td>" . $row['seller_id'] . "</td>";
		echo "<td>" . $row['buyer_id'] . "</td>";
		echo "<td>" . $row['item_name'] . "</td>";
		echo "<td>" . $row['item_id'] . "</td>";
		echo "<td>" . $row['bid_price'] . "</td>";
		
		echo "</tr>";
	}
echo "</table>";
echo "</body>";
echo "</html>";
mysql_close($con);
?>
<form action="index.php" method="post">
<input type="submit" value="sent mail" >
</form>
</body>
	
</html>