<?php

include 'dbconnect.php';
$msg=$_POST['text'];
$room=$_POST['room'];
$ip=$_POST['ip'];

$sql="INSERT INTO `msgs` ( `msg`, `room`, `ip`, `stime`) VALUES ('$msg', '$room', '$ip', current_timestamp());";
$result=mysqli_query($conn,$sql);
?>