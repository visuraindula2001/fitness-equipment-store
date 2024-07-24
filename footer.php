<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<!-- /////////////////////////// bottom navigation bar  //////////////////////// -->
   
<nav class="bottom-navbar">

 

<a href="home_page.php" class="fa-solid fa-house"></a>
 
<a href="#home_page.php#arrivals" class="fa-solid fa-tag"></a>
 
<?php

if(isset($_SESSION['user_id'])){
        $choose=mysqli_query($conn,"SELECT *FROM user_info WHERE uId='$id'");
        $row=mysqli_fetch_assoc($choose);

        $u=$row['email'];
        $p= $row['epassword'];

        $take=mysqli_query($conn,"SELECT *FROM normal_admin WHERE email='$u' and password='$p'");
        if(mysqli_num_rows($take)>0){
            echo'<a href="admin.php" class="fas fa-user-shield"></a>';  
    
        } 
                   
    }
        ?>

</nav>

    
    

     <!-- /////////////////////////////    footer    /////////////////////// -->



<section class="footer">

<div  class="box-container">

    <div class="box">
        <h3>Stores</h3>
        <a href="#" ><i class="fa-solid fa-location-dot"></i>Matara</a>
        <a href="#"><i class="fa-solid fa-location-dot"></i>Colombo</a>
        <a href="#"><i class="fa-solid fa-location-dot"></i>Kandy</a>
         
    </div>

    <div class="box">
        <h3>Main Links</h3>
        <a href="home_page.php"><i class="fa-solid fa-arrow-right"></i>Home</a>
        <a href="home_page.php#arrivals"><i class="fa-solid fa-arrow-right"></i>New Collection</a>
        
    </div>

    <div class="box">
        <h3>Related Pages</h3>
        <a href="#"><i class="fa-solid fa-arrow-right"></i>Account Information</a>
        <a href="#"><i class="fa-solid fa-arrow-right"></i>Order History</a>
        <a href="#"><i class="fa-solid fa-arrow-right"></i>Privacy Policy</a>
        <a href="#"><i class="fa-solid fa-arrow-right"></i>Payment Methods</a>
        <a href="#"><i class="fa-solid fa-arrow-right"></i>Our Services Overview</a> 
    </div>

    <div class="box">
        <h3>Contact Details</h3>
         
        <a href="#"><i class="fa-solid fa-phone"></i>0702028303</a>
        <a href="#"><i class="fa-solid fa-envelope"></i>visuraima17@gmail.com</a>
    </div>

</div>

<div class="credit">All Rights Reserved</div>
</section>



<!--  //////////////////       footer section ends    //////////////////////// -->


</body>
</html>