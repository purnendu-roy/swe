<?php
	/*This is bid database page Where the buyer will buy the item*/
	include("db.php");
	session_start();
	
	$Seller_id=$_POST["s_id"];
	$buyer_id=$_POST["b_id"];
	$item_name=$_POST["i_name"];
	$item_id=$_POST["i_id"];
	$item_price=$_POST["price"];
	$flag=0;
	$t=$_SESSION['time'];
	$bid=mysql_query("select * from bid where item_id='$item_id'");
	$b=mysql_fetch_array($bid);
	if($Seller_id==$buyer_id)
	{
		//echo "<a href="buyer.php">"."back"."</a>";
		die("you can not buy item posted by yourself");
	}
	if($buyer_id != $_SESSION['user_id'])
	{
		//echo "<a href="buyer.php">"."back"."</a>";
		die("buyer id and login id is not the same person");
	}
	if($b!=null)
	 {
	  $r=mysql_query("select bid_price from bid where item_id='$item_id'");
	  $re=mysql_fetch_array($r);
	  $percent_price=$re['bid_price']+$re['bid_price']*(10/100);
	  if($item_price>=$percent_price)
	 {
	    mysql_query("update bid set buyer_id='$buyer_id',bid_price=$item_price where item_id='$item_id' ");
	    header("location:buyer.php");
	 }
	 else
	  {
	    die("unsufficient price");
	  }
	  }
	 else
	  {
	    $r=mysql_query("select price from item where item_id='$item_id'");
	   $re=mysql_fetch_array($r);
	    $percent_price=$re['price']+$re['price']*(10/100);
	
	   if($item_price>=$percent_price)
	 {
	    mysql_query("insert into bid values('$Seller_id','$buyer_id','$item_name','$item_id','$item_price','$t')");
	    header("location:buyer.php");
	 }
	 else
	  {
	    die("unsufficient price");
	  }
	   }
?>
					
	