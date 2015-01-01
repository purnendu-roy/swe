<html>
	<head>
	<title>home</title>
	</head>
	<body>
	<center>welcome
<?php
		include("db.php");
		session_start();	
		echo $_SESSION['name'];
		$show=mysql_query("select * from item",$con);
echo "<html>";
echo "<body>";
echo "<table bgcolor='#99CCFF' bordercolor='white' border='3' width='1000' cellspacing='2' cellpadding='5'>
			<tr>
					<th>Seller_id</th>
					<th>Item_name</th>
					<th>Item_id</th>
					<th>Item_des</th>
					<th>Item_price</th>
					<th>time</th>
					<th>Category</th>
					<th>Posted Time</th>
			</tr>";

	while($row=mysql_fetch_array($show))
	{
		$a=$b=$c=$x="00:00:00";
		echo "<tr>";
		echo "<td>" . $row['seller_id'] . "</td>";
		echo "<td>" . $row['item_name'] . "</td>";
		echo "<td>" . $row['item_id'] . "</td>";
		echo "<td>" . $row['item_des'] . "</td>";
		echo "<td>" . $row['price'] . "</td>";
		echo "<td>" . $row['time'] . "</td>";
		echo "<td>" . $row['category'] . "</td>";
		echo "<td>" . $row['posted_time'] . "</td>";
		echo "</tr>";
		$timeNow=date('H:i:s', strtotime("+5 hours + 30 minutes"));
		
		$t=strtotime($timeNow);
		$t1=date("H", $t);
		$t2=date("i", $t);
		$t3=date("s", $t);
		//echo '<br>'.$t1.' '.$t2.' '.$t3;
		
		$a=strtotime($row['time']);
		$a1=date("H", $a);
		$a2=date("i", $a);
		$a3=date("s", $a);
		//echo '----'.$a1.' '.$a2.' '.$a3;
		
		$b=strtotime($row['posted_time']);
		$b1=date("H", $b);
		$b2=date("i", $b);
		$b3=date("s", $b);
		//echo '----'.$b1.' '.$b2.' '.$b3;
		
		
			// Total time calculation.
		
		$s3=$a3+$b3;
			
			if($s3>59)
				{
					$s2=1+$a2+$b2;
					$s3=$s3%60;
				}
			else
				{
					$s2=$a2+$b2;
				}
			
		if($s2>59)
			{
				$s1=1+$a1+$b1;
				$s2=$s2%60;
			}
		else	
			{
				$s1=$a1+$b1;
			}
				
		
		// Remaining time calculation
		
		if($s3>$t3)
			$a3=$s3-$t3;
		else	
			{
				$s2=$s2-1;
				$s3=$s3+60;
				$a3=$s3-$t3;
			}
			
		if($s2>$t2)
			$a2=$s2-$t2;
		else	
			{
				$s1=$s1-1;
				$s2=$s2+60;
				$a2=$s2-$t2;
			}
		
		if($s1<$t1)
			$a1=$a2=$a3=0;
		else
			$a1=$s1-$t1;
		
		
		if($a1<0)
			$a1=$a2=$a3=0;
		$final=$a1.':'.$a2.':'.$a3;
		
		
		
		
		
		
		/*$s1=($a1+$b1)-$t1;
		$s2=($a2+$b2)-$t2;
		$s3=($a3+$b3)-$t3;
		if($s3<0)
		{
			$s2-=1;
			$s3=0;
		}
		if($s3>59)
		{
			$s2+=1;
			$s3=$s3%60;
		}
		if($s2<0)
		{
			$s1-=1;
			$s2=$s2%60; */
			
		$_SESSION['final']=$final;
		//echo '==='.$final;
		$itemId=$row['item_id'];
		$stmt="update bid set time_remain='$final' where item_id='$itemId'";
		mysql_query($stmt,$con);
	}
echo "</table>";
echo "</body>";
echo "</html>";

mysql_close($con);
?>

		</center>
		<form action="seller.php" method="post">
		  <input type="submit" value="seller" style="width: 100px; height:50px">
	  </form>
	  <form action="buyer.php" method="post">
		  <input type="submit" value="buyer" style="width: 100px; height:50px">
	  </form>
	   <form action="index.html" method="post">
		  <input type="submit" value="logout" style="width: 100px; height:50px">
	  </form>
	</body>
	
</html>