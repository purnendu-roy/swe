
<?php
	/*This is Seller database page Where the seller will post the item*/
	include("db.php");
	session_start();
	
	$Seller_id=$_POST["uid"];
	$item_name=$_POST["iname"];
	$item_id=$_POST["iid"];
	$item_detail=$_POST["idetails"];
	$item_price=$_POST["iprice"];
	$item_time=$_POST["itime"];
	$item_cat=$_POST["icat"];
	
	//$_SESSION['SID']=$Seller_id;
	$_SESSION['IID']=$item_id;
	
	$flag=0;
	$timeNow=date('H:i:s', strtotime("+5 hours + 30 minutes"));
	echo $timeNow;
	//seller cant post
	if($Seller_id !=  $_SESSION['user_id'])
	{
		die("you cant post");
	}
	$a=mysql_query("insert into 
					item values('$Seller_id','$item_name','$item_id','$item_detail','$item_price','$item_time','$item_cat','$timeNow')",$con);
	
	$_SESSION['time']=$_POST["itime"];
	$_SESSION['selprice']=$_POST["iprice"];
	/*seller id check whether the seller is having correct user_id */				
	
	$result=mysql_query("select * from item");
	
	
	
	while($row=mysql_fetch_array($result))
	{
	if($row['seller_id']==$a)
	{$flag=1;}
	}
	if($flag==0)
	{
		echo "<a href='home.php'>"."back"."</a>"."<br>";
		die("seller_id is wrong");
	}
	else
	{
		echo "<center>";
		echo "<h1>"."You have successfully Posted Your Item"."</h1>"."<br>";
		echo "<a href='home.php'>"."back"."</a>"."<br>";
		echo "</center>";
	}
	
	
	mysql_close($con);

	
?>