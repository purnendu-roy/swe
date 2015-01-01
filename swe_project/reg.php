<?php
	session_start();
?>

<html>
<head>
	<title> </title>
</head>
<body>

<form action="regcheck.php" method="post">
		<b>User name:</b>
		<p><input  type="text"  name="name"/>
		<?php echo $_SESSION['u_blank']; ?><?php echo $_SESSION['u_valid']; ?></p><br><br>
		
		<p><b>Password:</b>
		<input type="password" class="tbx" name="pwd"><br><br></p>
		
		<p><b>User ID:</b>
		<input  type="text" class="tbx" name="uid" value="only 5 characters">
		<?php echo $_SESSION['id_blank'];?><br><br></p>
		
		<p><b>city:</b>
		<input  type="text" class="tbx" name="city"><br><br></p>
		
		<p><b>State:</b>
		<input  type="text" class="tbx" name="state"><br><br></p>
		
		<p><b>Em@il:</b>
		<input  type="text" class="tbx" name="email">
		<?php echo $_SESSION['e_blank'];?><?php echo $_SESSION['e_valid'];?><br><br> </p>
		
		<p><b>Phone:</b>
		<input  type="text" class="tbx" name="ph">
		<?php echo $_SESSION['p_blank'];?><?php echo $_SESSION['p_valid'];?><br><br></p>
		
		<p><b>Pan:</b>
		<input  type="text" class="tbx" name="pan">
		<?php echo $_SESSION['pn_blank']; ?><br><br></p>
		<?php $_SESSION['u_blank']="";
			  $_SESSION['u_valid']="";
			  $_SESSION['id_blank']="";
			  $_SESSION['e_blank']="";
			  $_SESSION['e_valid']="";
			  $_SESSION['p_blank']="";
			  $_SESSION['p_valid']="";
			  $_SESSION['pn_blank']=""; ?>
		<input type="submit" value="register" name="submit">
</form>
		<div id="pos">
		<form action="index.html">
		<input class="bn" type="submit" value="back">
		</form>
		</div>
</body>
</html>