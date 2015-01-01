<?php
$con=mysql_connect("localhost","root","shanoo");
if (!$con)
{
die('Could not connect: ' .mysql_error());
}
else
{
mysql_select_db("auction",$con);
}
?>