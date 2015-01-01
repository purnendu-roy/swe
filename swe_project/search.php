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
		$in=$_GET['s'];
		$show=mysql_query("select * from item where item_name='$in'",$con);
echo "<html>";
echo "<body>";
echo "<table bgcolor='#999966' bordercolor='white' border='3' width='1000' cellspacing='2' cellpadding='5'>
			<tr>
					<th>Seller_id</th>
					<th>Item_name</th>
					<th>Item_id</th>
					<th>Item_des</th>
					<th>Item_price</th>
					<th>time</th>
					<th>Category</th>
			</tr>";

	while($row=mysql_fetch_array($show))
	{
		echo "<tr>";
		echo "<td>" . $row['seller_id'] . "</td>";
		echo "<td>" . $row['item_name'] . "</td>";
		echo "<td>" . $row['item_id'] . "</td>";
		echo "<td>" . $row['item_des'] . "</td>";
		echo "<td>" . $row['price'] . "</td>";
		echo "<td>" . $row['time'] . "</td>";
		echo "<td>" . $row['category'] . "</td>";
		echo "</tr>";
	}
echo "</table>";
echo "</body>";
echo "</html>";
mysql_close($con);
?>
<form action="buyer.php" method="post">
<input type="submit" value="back" >
</form>
</body>
	
</html>