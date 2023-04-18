<?php
ob_start(); 

// $connection = mysqli_connect("localhost:3307", "root", "");
// $db = mysqli_select_db($connection, 'demo');
include '../connection.php';
 include("connect.php"); 
if($_SESSION['name']==''){
	header("location:deliverylogin.php");
}
$name=$_SESSION['name'];
$id=$_SESSION['Did'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="delivery.css">
    <link rel="stylesheet" href="../home.css">
</head>
<body>
<header>
        <div class="logo">Food <b style="color: #06C167;">Donate</b></div>
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <nav class="nav-bar">
            <ul>
                <li><a href="delivery.php" >Home</a></li>
                <li><a href="openmap.php" >map</a></li>
                <li><a href="deliverymyord.php"  class="active">myorders</a></li>
    
            </ul>
        </nav>
    </header>
    <br>
    <script>
        hamburger=document.querySelector(".hamburger");
        hamburger.onclick =function(){
            navBar=document.querySelector(".nav-bar");
            navBar.classList.toggle("active");
        }
    </script>
    <style>
        .itm{
            background-color: white;
            display: grid;
        }
        .itm img{
            width: 400px;
            height: 400px;
            margin-left: auto;
            margin-right: auto;
        }
        p{
            text-align: center; font-size: 28PX;color: black; 
        }
        a{
            /* text-decoration: underline; */
        }
        @media (max-width: 767px) {
            .itm{
                /* float: left; */
                
            }
            .itm img{
                width: 350px;
                height: 350px;
            }
        }
    </style>

        <div class="itm" >

            <img src="../img/delivery.gif" alt="" width="400" height="400"> 
          
        </div>

        <div class="get">
            <?php


// Define the SQL query to fetch unassigned orders
$sql = "SELECT fd.Fid AS Fid, fd.name,fd.phoneno,fd.date,fd.delivery_by, fd.address as From_address, 
ad.name AS delivery_person_name, ad.address AS To_address
FROM food_donations fd
LEFT JOIN admin ad ON fd.assigned_to = ad.Aid where delivery_by='$id';
";

// Execute the query
$result=mysqli_query($connection, $sql);



// Check for errors
if (!$result) {
    die("Error executing query: " . mysqli_error($conn));
}

// Fetch the data as an associative array
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// If the delivery person has taken an order, update the assigned_to field in the database
if (isset($_POST['food']) && isset($_POST['delivery_person_id'])) {
    $order_id = $_POST['order_id'];
    $delivery_person_id = $_POST['delivery_person_id'];

    $sql = "UPDATE food_donations SET delivery_by = $delivery_person_id WHERE Fid = $order_id";
    // $result = mysqli_query($conn, $sql);
    $result=mysqli_query($connection, $sql);


    if (!$result) {
        die("Error assigning order: " . mysqli_error($conn));
    }

    // Reload the page to prevent duplicate assignments
    header('Location: ' . $_SERVER['REQUEST_URI']);
    // exit;
    ob_end_flush();
}
// mysqli_close($conn);


?>
<div class="log">
<!-- <button type="submit" name="food" onclick="">My orders</button> -->
<a href="delivery.php">Take orders</a>
<p>Order assigned to you</p>
<br>
</div>
  

<!-- Display the orders in an HTML table -->
<div class="table-container">
         <!-- <p id="heading">donated</p> -->
         <div class="table-wrapper">
        <table class="table">
        <thead>
        <tr>
            <th >Name</th>
            <!-- <th>food</th> -->
            <!-- <th>Category</th> -->
            <th>phoneno</th>
            <th>date/time</th>
            <th>Pickup address</th>
            <th>Delivery address</th>
            <!-- <th>Orders</th> -->
         
          
           
        </tr>
        </thead>
       <tbody>

        <?php foreach ($data as $row) { ?>
        <?php    echo "<tr><td data-label=\"name\">".$row['name']."</td><td data-label=\"phoneno\">".$row['phoneno']."</td><td data-label=\"date\">".$row['date']."</td><td data-label=\"Pickup Address\">".$row['From_address']."</td><td data-label=\"Delivery Address\">".$row['To_address']."</td>";
?>
        
            <!-- <td><?= $row['Fid'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['address'] ?></td> -->
            <!-- <td data-label="Action" style="margin:auto"> -->
                <!-- <?php if ($row['delivery_by'] == $id) { ?>
                    Order assigned to you
                <?php } else { ?>
                    Order assigned to another delivery person
                <?php } ?> -->
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

            </div>

        
     
        

   <br>
   <br>
</body>
</html>