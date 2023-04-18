
<?php
ob_start(); 
// $connection = mysqli_connect("localhost:3307", "root", "");
// $db = mysqli_select_db($connection, 'demo');
 include("connect.php"); 
if($_SESSION['name']==''){
	header("location:signin.php");
}
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="admin.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Admin Dashboard Panel</title> 
    
<?php
 $connection=mysqli_connect("localhost:3307","root","");
 $db=mysqli_select_db($connection,'demo');
 


?>
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <!--<img src="images/logo.png" alt="">-->
            </div>

            <span class="logo_name">ADMIN</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="#">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dahsboard</span>
                </a></li>
                <!-- <li><a href="#">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Content</span>
                </a></li> -->
                <li><a href="analytics.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Analytics</span>
                </a></li>
                <li><a href="donate.php">
                    <i class="uil uil-heart"></i>
                    <span class="link-name">Donates</span>
                </a></li>
                <li><a href="feedback.php">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">Feedbacks</span>
                </a></li>
                <li><a href="adminprofile.php">
                    <i class="uil uil-user"></i>
                    <span class="link-name">Profile</span>
                </a></li>
                <!-- <li><a href="#">
                    <i class="uil uil-share"></i>
                    <span class="link-name">Share</span>
                </a></li> -->
            </ul>
            
            <ul class="logout-mode">
                <li><a href="../logout.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <!-- <p>Food Donate</p> -->
            <p  class ="logo" >Food <b style="color: #06C167; ">Donate</b></p>
             <p class="user"></p>
            <!-- <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div> -->
            
            <!--<img src="images/profile.jpg" alt="">-->
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-user"></i>
                        <!-- <i class="fa-solid fa-user"></i> -->
                        <span class="text">Total users</span>
                        <?php
                           $query="SELECT count(*) as count FROM  login";
                           $result=mysqli_query($connection, $query);
                           $row=mysqli_fetch_assoc($result);
                         echo "<span class=\"number\">".$row['count']."</span>";
                        ?>
                        <!-- <span class="number">50,120</span> -->
                    </div>
                    <div class="box box2">
                        <i class="uil uil-comments"></i>
                        <span class="text">Feedbacks</span>
                        <?php
                           $query="SELECT count(*) as count FROM  user_feedback";
                           $result=mysqli_query($connection, $query);
                           $row=mysqli_fetch_assoc($result);
                         echo "<span class=\"number\">".$row['count']."</span>";
                        ?>
                        <!-- <span class="number">20,120</span> -->
                    </div>
                    <div class="box box3">
                        <i class="uil uil-heart"></i>
                        <span class="text">Total doantes</span>
                        <?php
                           $query="SELECT count(*) as count FROM food_donations";
                           $result=mysqli_query($connection, $query);
                           $row=mysqli_fetch_assoc($result);
                         echo "<span class=\"number\">".$row['count']."</span>";
                        ?>
                        <!-- <span class="number">10,120</span> -->
                    </div>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Recent Donations</span>
                </div>
            <div class="get">
            <?php

$loc= $_SESSION['location'];

// Define the SQL query to fetch unassigned orders
$sql = "SELECT * FROM food_donations WHERE assigned_to IS NULL and location=\"$loc\"";

// Execute the query
$result=mysqli_query($connection, $sql);
$id=$_SESSION['Aid'];

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
    $sql = "SELECT * FROM food_donations WHERE Fid = $order_id AND assigned_to IS NOT NULL";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Order has already been assigned to someone else
        die("Sorry, this order has already been assigned to someone else.");
    }



    $sql = "UPDATE food_donations SET assigned_to = $delivery_person_id WHERE Fid = $order_id";
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

<!-- Display the orders in an HTML table -->
<div class="table-container">
         <!-- <p id="heading">donated</p> -->
         <div class="table-wrapper">
        <table class="table">
        <thead>
        <tr>
            <th >Name</th>
            <th>food</th>
            <th>Category</th>
            <th>phoneno</th>
            <th>date/time</th>
            <th>address</th>
            <th>Quantity</th>
            <!-- <th>Action</th> -->
         
          
           
        </tr>
        </thead>
       <tbody>

        <?php foreach ($data as $row) { ?>
        <?php    echo "<tr><td data-label=\"name\">".$row['name']."</td><td data-label=\"food\">".$row['food']."</td><td data-label=\"category\">".$row['category']."</td><td data-label=\"phoneno\">".$row['phoneno']."</td><td data-label=\"date\">".$row['date']."</td><td data-label=\"Address\">".$row['address']."</td><td data-label=\"quantity\">".$row['quantity']."</td>";
?>
        
            <!-- <td><?= $row['Fid'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['address'] ?></td> -->
            <td data-label="Action" style="margin:auto">
                <?php if ($row['assigned_to'] == null) { ?>
                    <form method="post" action=" ">
                        <input type="hidden" name="order_id" value="<?= $row['Fid'] ?>">
                        <input type="hidden" name="delivery_person_id" value="<?= $id ?>">
                        <button type="submit" name="food">Get Food</button>
                    </form>
                <?php } else if ($row['assigned_to'] == $id) { ?>
                    Order assigned to you
                <?php } else { ?>
                    Order assigned to another delivery person
                <?php } ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

            </div>

        

 
<!-- 
                <div class="table-container">
         <p id="heading">donated</p>
         <div class="table-wrapper">
        <table class="table">
        <thead>
        <tr>
            <th >Name</th>
            <th>food</th>
            <th>Category</th>
            <th>phoneno</th>
            <th>date/time</th>
            <th>address</th>
            <th>Quantity</th>
            <th>Status</th>
          
           
        </tr>
        </thead>
       <tbody>
   
         <?php
        $loc=$_SESSION['location'];
        $query="select * from food_donations where location='$loc' ";
        $result=mysqli_query($connection, $query);
        if($result==true){
            while($row=mysqli_fetch_assoc($result)){
                echo "<tr><td data-label=\"name\">".$row['name']."</td><td data-label=\"food\">".$row['food']."</td><td data-label=\"category\">".$row['category']."</td><td data-label=\"phoneno\">".$row['phoneno']."</td><td data-label=\"date\">".$row['date']."</td><td data-label=\"Address\">".$row['address']."</td><td data-label=\"quantity\">".$row['quantity']."</td><td  data-label=\"Status\" >".$row['quantity']."</td></tr>";

             }
            
          }
          else{
            echo "<p>No results found.</p>";
         }
    
       ?> 
    
        </tbody>
    </table>
         </div>
                </div>
                
          -->
            
        </div>
    </section>

    <script src="admin.js"></script>
</body>
</html>
