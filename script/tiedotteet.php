<?php

$myusername = $_SESSION['user'];
$sql = "SELECT bullet.date, bullet.text from bullet, estate, apartment, user WHERE bullet.estate_ID = estate.ID AND estate.ID = apartment.estate_ID AND apartment.user_ID = user.user_ID AND user.username = '$myusername' ORDER BY date DESC";
$result = mysqli_query($connection,$sql);
$rivit = mysqli_num_rows($result);

    if($rivit != 0) {
        
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $date = strtotime($row['date']);  // The date
            $formatdate = date('d.m.Y',$date);
            $formattime = date('H:i',$date);
            echo "<h3>" . $formatdate . " kello " . $formattime . "</h3>";
            echo "<p>" . (utf8_encode($row['text'])) . "</p>";  // bulletin
            echo "<br>";
        }
    }
    else {
    echo "Ei tiedotteita.";
    }

?>