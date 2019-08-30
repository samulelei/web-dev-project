<?php

  $myusername = mysqli_real_escape_string($connection,$_POST['username']);
  $mypassword = mysqli_real_escape_string($connection,$_POST['password']);

  $sql = "SELECT user_ID FROM user WHERE username = '$myusername' and password = '$mypassword'";

  $result = mysqli_query($connection,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  //$usertype = $row['usertype'];

  $count = mysqli_num_rows($result);

  // If result matched $myusername and $mypassword, table row must be 1 row

  if($count == 1) {
     $_SESSION['user'] = $myusername;
     $sql2 = "SELECT name, address FROM estate, apartment, user WHERE estate.ID = apartment.estate_ID and apartment.user_ID = user.user_ID and user.username = '$myusername'";
     $sql3 = "SELECT apartment.apartment_number FROM apartment, user WHERE apartment.user_ID = user.user_ID and user.username = '$myusername'";
     $sql4 = "SELECT * FROM user WHERE username = '$myusername'";
     $result2 = mysqli_query($connection,$sql2);
     $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
     $result3 = mysqli_query($connection,$sql3);
     $row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC);
     $result4 = mysqli_query($connection,$sql4);
     $row4 = mysqli_fetch_array($result4,MYSQLI_ASSOC);
     $address = utf8_encode($row2['address']);
     $estatename = utf8_encode($row2['name']);
     $apartment = $row3['apartment_number'];
     $firstname = utf8_encode($row4['firstname']);
     $lastname = utf8_encode($row4['lastname']);
     $phone = $row4['phone'];
     $email = $row4['email'];
     $_SESSION['firstname'] = $firstname;
     $_SESSION['lastname'] = $lastname;
     $_SESSION['phone'] = $phone;
     $_SESSION['email'] = $email;
     $_SESSION['address'] = $address;
     $_SESSION['apartment'] = $apartment;
     $_SESSION['estatename'] = $estatename;
     header("Location: ".$_SERVER['HTTP_REFERER']);

  }else {
     $errormsg = 'notlogged';
     $_SESSION['user'] = $errormsg;
     header("Location: ".$_SERVER['HTTP_REFERER']);
}
?>