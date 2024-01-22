<?php
$room=$_POST['room'];

if (strlen($room)>20 or strlen($room)<2) {
    echo "<script>alert('The name is too small or too large') </script>";
    echo '<script>window.location="http://localhost/chat"</script>;';
}
else if (!ctype_alnum($room)) {
    echo "<script>alert('Please choose an alphanumeric name') </script>";
    echo '<script>window.location="http://localhost/chat"</script>;';
}
else {
    include 'dbconnect.php';
}
$sql = "SELECT * FROM `rooms` Where `roomname`='$room'";
$result=mysqli_query($conn,$sql);
if ($result) {
    if (mysqli_num_rows($result)>0) {
        echo "<script>alert('Please choose a different room name the room name is already taken')</script>";
        echo '<script>window.location="http://localhost/chat"</script>;';

    }
    else{
        $sql="INSERT INTO `rooms` (`roomname`, `stime`) VALUES ('$room', current_timestamp());";
        
        if (mysqli_query($conn,$sql)) {
            echo "<script>alert('Your room is now ready you can go and chat now')</script>";
            echo '<script>window.location="http://localhost/chat/rooms.php?roomname='.$room.'"</script>;';
        }
    }
}
else {
    echo "error".mysqli_error($conn);
}


?>