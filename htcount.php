<?php

include 'dbconnect.php';
$room = $_POST['room'];

$sql = "SELECT msg, stime, ip FROM msgs WHERE room='$room'";
$html_content = "";  // Initialize the variable to an empty string
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $html_content .= '<div class="container">';
        $html_content .= $row['ip'];
        $html_content .= " says <p>" . $row['msg'];
        $html_content .= '</p>
            <span class="time-right">' . $row['stime'] . '</span>
        </div>';
    }
}

echo $html_content;

?>
