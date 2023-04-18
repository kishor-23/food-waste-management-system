<?php
// session_start();
// $connection=mysqli_connect("localhost:3307","root","");
// $db=mysqli_select_db($connection,'demo');
include '../connection.php';
$msg=0;
if(isset($_POST['sign']))
{

    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $location=$_POST['district'];

    // $location=$_POST['district'];

    $pass=password_hash($password,PASSWORD_DEFAULT);
    $sql="select * from delivery_persons where email='$email'" ;
    $result= mysqli_query($connection, $sql);
    $num=mysqli_num_rows($result);
    if($num==1){
        // echo "<h1> already account is created </h1>";
        // echo '<script type="text/javascript">alert("already Account is created")</script>';
        echo "<h1><center>Account already exists</center></h1>";
    }
    else{
    
    $query="insert into delivery_persons(name,email,password,city) values('$username','$email','$pass','$location')";
    $query_run= mysqli_query($connection, $query);
    if($query_run)
    {
        // $_SESSION['email']=$email;
        // $_SESSION['name']=$row['name'];
        // $_SESSION['gender']=$row['gender'];
       
        header("location:delivery.php");
        // echo "<h1><center>Account does not exists </center></h1>";
        //  echo '<script type="text/javascript">alert("Account created successfully")</script>'; -->
    }
    else{
        echo '<script type="text/javascript">alert("data not saved")</script>';
        
    }
}


   
}
?>





<!DOCTYPE html>
<html lang="en">


  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Animated Login Form | CodingNepal</title>
    <link rel="stylesheet" href="deliverycss.css">
  </head>
  <body>
    <div class="center">
      <h1>Register</h1>
      <form method="post" action=" ">
        <div class="txt_field">
          <input type="text" name="username" required/>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required/>
          <span></span>
          <label>Password</label>
        </div>
        <div class="txt_field">
            <input type="email" name="email" required/>
            <span></span>
            <label>Email</label>
          </div>
          <div class="">
                           <!-- <label for="district">District:</label> -->
                           <select id="district" name="district" style="padding:10px; padding-left: 20px;">
                          <option value="chennai">Chennai</option>
                          <!-- <option value="kancheepuram">Kancheepuram</option>
                          <option value="thiruvallur">Thiruvallur</option>
                          <option value="vellore">Vellore</option>
                          <option value="tiruvannamalai">Tiruvannamalai</option>
                          <option value="tiruvallur">Tiruvallur</option>
                          <option value="tiruppur">Tiruppur</option> -->
                          <option value="coimbatore">Coimbatore</option>
                          <!-- <option value="erode">Erode</option>
                          <option value="salem">Salem</option>
                          <option value="namakkal">Namakkal</option>
                          <option value="tiruchirappalli">Tiruchirappalli</option>
                          <option value="thanjavur">Thanjavur</option>
                          <option value="pudukkottai">Pudukkottai</option>
                          <option value="karur">Karur</option>
                          <option value="ariyalur">Ariyalur</option>
                          <option value="perambalur">Perambalur</option> -->
                          <option value="madurai" selected>Madurai</option>
                          <!-- <option value="virudhunagar">Virudhunagar</option>
                          <option value="dindigul">Dindigul</option>
                          <option value="ramanathapuram">Ramanathapuram</option>
                          <option value="sivaganga">Sivaganga</option>
                          <option value="thoothukkudi">Thoothukkudi</option>
                          <option value="tirunelveli">Tirunelveli</option>
                          <option value="tiruppur">Tiruppur</option>
                          <option value="tenkasi">Tenkasi</option>
                          <option value="kanniyakumari">Kanniyakumari</option> -->
                        </select> 
                        
          </div>
          <br>
        <!-- <div class="pass">Forgot Password?</div> -->
        <input type="submit" name="sign" value="Register">
        <div class="signup_link">
          Alredy a member? <a href="deliverylogin.php">Sigin</a>
        </div>
      </form>
    </div>

  </body>
</html>
