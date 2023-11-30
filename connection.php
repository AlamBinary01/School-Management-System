<?php
$con=new mysqli('localhost','root','','school');
if(!$con)
{
    die(mysqli_error($con));
}
?>