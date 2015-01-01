<?php
session_start();

include("db.php");


$_SESSION['u_blank']="";
$_SESSION['u_valid']="";
$_SESSION['id_blank']="";
$_SESSION['e_blank']="";
$_SESSION['e_valid']="";
$_SESSION['p_blank']="";
$_SESSION['p_valid']="";
$_SESSION['pn_blank']="";

$flg=0;


if(isset($_POST['submit']))
{
	$uname=$_POST["name"];
	$pass=$_POST["pwd"];
	$uid=$_POST["uid"];
	$city=$_POST["city"];
	$state=$_POST["state"];
	$email=$_POST["email"];
	$phone=$_POST["ph"];
	$pan=$_POST["pan"];
	
	//user name validation
	
	if(empty($_POST["name"]))
	{
		$_SESSION['u_blank']="* User Name is Required";
		$flg=1;
	}
	else
	{
		if(!preg_match("/^[a-zA-Z ]*$/",$uname))
		{
			$_SESSION['u_valid']="Only letters and White Space allowed";
			$flg=1;
		}
	}
	
	//user id cant be blank
	
	if(empty($_POST["uid"]))
	{
		$_SESSION['id_blank']="User ID is Required";
		$flg=1;
	}
	
	//email validation
	if(empty($_POST["email"]))
	{
		$_SESSION['e_blank']="Email ID is Required";
		$flg=1;
	}
	else
	{
		if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
		{
			$_SESSION['e_valid']="Invalid Email Format";
			$flg=1;
		}
	}
	
	//phone no validation
	
	if(empty($_POST["ph"]))
	{
		$_SESSION['p_blank']="Contact No. is Required";
		$flg=1;
	}
	else
	{
		if(!preg_match("/^[0-9]*$/",$phone))
		{
			$_SESSION['p_valid']="Invalid PHONE NO. Format";
			$flg=1;
		}
	}
	
	//pan no. cant be blank
	
	if(empty($_POST["pan"]))
	{
		$_SESSION['pn_blank']="PAN NO. is Required";
		$flg=1;
	}
	
	
	
}
if($flg==1)
	{
		header('location:reg.php');
	}
else
{	
$a=mysql_query("insert into login values('$uname','$pass','$uid','$city','$state','$email','$phone','$pan')");

$result=mysql_query("select * from login");
$_SESSION['user_id']=$_POST['uid'];
mysql_close($con);

	echo "<center>";
	echo "<h1>"."successfully registered"."</h1>"."<br>";
	echo "<a href='index.html'>"."back"."</a>"."<br>";
	echo "</center>";

}
?>