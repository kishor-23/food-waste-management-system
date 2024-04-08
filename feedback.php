<?php
session_start();
include 'connection.php';

if (isset($_POST['feedback'])) {
  $email = $_POST['email'];
  $name = $_POST['name'];
  $msg = $_POST['message'];
  $sanitized_emailid =  mysqli_real_escape_string($connection, $email);
  $sanitized_name =  mysqli_real_escape_string($connection, $name);
  $sanitized_msg =  mysqli_real_escape_string($connection, $msg);
  $query="insert into user_feedback(name,email,message) values('$sanitized_name','$sanitized_emailid','$sanitized_msg')";
  $query_run= mysqli_query($connection, $query);
  if($query_run)
  {
    //echo '<script type="text/javascript">alert("data saved")</script>';
      header("location:contact.html");
     
  }
  else{
      echo '<script type="text/javascript">alert("data not saved")</script>'; 
  }

}
?>
