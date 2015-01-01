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
	
		$show=mysql_query("select * from item",$con);
		
/*		$finl= mysql_query("select * from bid where time_remain='0:0:0'",$con);
		
		while($row=mysql_fetch_array($finl))
		{
			
		}
		mysql_query("delete from bid where time_remain='0:0:0'");
*/
		echo "<html>";
echo "<body>";
echo "<table bgcolor='#CCCC99' bordercolor='white' border='3' width='1000' cellspacing='2' cellpadding='5'>
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
<hr>
<h2> bidding table</h2>
<?php
		include("db.php");
			
		$show=mysql_query("select * from bid where time_remain!='0:0:0'",$con);
echo "<html>";
echo "<body>";
echo "<table bgcolor='#99CC66' bordercolor='white' border='3' width='1000' cellspacing='2' cellpadding='5'>
			<tr>
					<th>Seller_id</th>
					<th>buyer_id</th>
					<th>Item_name</th>
					<th>Item_id</th>
					<th>bid_price</th>
					<th>Remaining_time</th>
			</tr>";

	while($row=mysql_fetch_array($show))
	{
		echo "<tr>";
		echo "<td>" . $row['seller_id'] . "</td>";
		echo "<td>" . $row['buyer_id'] . "</td>";
		echo "<td>" . $row['item_name'] . "</td>";
		echo "<td>" . $row['item_id'] . "</td>";
		echo "<td>" . $row['bid_price'] . "</td>";
		echo "<td>" . $row['time_remain'] . "</td>";
		echo "</tr>";
	}
echo "</table>";
echo "</body>";
echo "</html>";
mysql_close($con);
?>
</center>

<div id="search">
	 <center>
	<h2>search an item</h2><br>
	<form action="search.php" method="get">
	<input type="text" name="s">
	<input type="submit" value="search" name="search" >
	</form>
	 </center>
</div>
<div id="win">
	 <center>
	<h3>bid winner</h3><br>
	<form action="winner.php" method="get">
	enter item name:<input type="text" name="win">
	<input type="submit" value="bid winner">
	</form>
	 </center>
</div>



<hr>
</hr><br><br><br><br><br><br>
<div id="over">
<center>

	<br><br><br>
<h2>bidding form</h2>
		
	
	 <form action="bid.php" method="post">
		<b>Seller_Id:</b>
		<input  type="text" class="tbx" name="s_id">
		<b>Buyer_Id:</b>
		<input type="text" class="tbx" name="b_id"><br><br>
		<b>Item_name:</b>
		<input  type="text" class="tbx" name="i_name">
		<b>Item_id:</b>
		<input  type="text" class="tbx" name="i_id"><br><br>
		<b>Expected Bidding price:</b>
		<input  type="text" class="tbx" name="price"><br>
		
		<input type="submit" value="bid" style="width: 100px; height:50px">
	  </form>
	  	 <form action="home.php" method="post">
		 <input type="submit" value="back" style="width: 100px; height:50px">
		 </center>
</div>

	</body>
	
</html>