
<?php 
     include 'config.php';
     session_start();


     if(isset($_SESSION['user_id'])){
        $id=$_SESSION['user_id'];
     }

     if(isset($_GET['logout'])){
        session_destroy();
     }
     

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home page</title>
    <!-- linking fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- linking style sheets -->
    <link rel="stylesheet" href="style.css">
    <!-- linking swiper -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/> 
     
  

</head>
<body>

  <!-- //////////////////  Header  ////////////////////// -->

  <header class="header">
        <div class="header-1">
            <img src="logo-no-background.png" height="50px" width="300px" >

            <!-- <h1>Fitness World</h1> -->
             
            <div class="icons">
                 
               <a href="#" id="shopping-cart"><i class="fa-solid fa-cart-shopping"></i></a>
               <a href="login.php" id="login-btn"><i class="fa-solid fa-user"></i></a>
               <a href="#" class="fa-brands fa-facebook"></a>
               <a href="#" class="fab fa-youtube"></a>
                 
            </div>
        </div>

        <div class="header-2">
            <nav class="navbar">
                <a href="home_page.php#home">Home</a>
                <a href="home_page.php#arrivals">New Collection</a>
                <a href="#photobrands">Brands</a>
                 
                <?php

                if(isset($_SESSION['user_id'])){
                $choose=mysqli_query($conn,"SELECT *FROM user_info WHERE uId='$id'");
                $row=mysqli_fetch_assoc($choose);

                $u=$row['email'];
                $p= $row['epassword'];

                $take=mysqli_query($conn,"SELECT *FROM normal_admin WHERE email='$u' and password='$p'");
                if(mysqli_num_rows($take)>0){
                    echo '<a href="admin.php">admin panel</a>';  
            
                }                           
            }
                ?>  
            </nav>
        </div>
    </header>

 

     

     <!-- /////////////////   Main image section  ///////////////////// -->


<div class="main-image">
  <div class="main-text">
    <h1 style="font-size:50px; font-family: Andalé Mono;">Discover high <br>quality equipments <br>from leading <br>brands</h1>
    <br>
     <button style="color:aliceblue; background-color:#a60303;  font-weight: 400; width: 150px; height :50px;">SHOP NOW</button>
        
   </div>
</div> 


<!-- ////////////////////////////    icons section starts    ///////////////////////  -->



<section class="icons-container">

<div class="icons">
    
    <!-- ////////////////// <i class="fa-solid fa-motorcycle"></i>  ////////// -->

    <i class="fa-solid fa-globe"></i>
    <div class="content">
        <h3> Free dilivery</h3>

        <!-- ////////////////  <p> Free dilivery for purchases over RS.2000</p> ///////// -->

    </div>
    
</div>


<div class="icons">
    <i class="fa-solid fa-heart"></i>
    <div class="content">
        <h3>Customer Favorites</h3>    
    </div>   
</div>



<div class="icons">  
    <i class="fa-solid fa-tags"></i>
    <div class="content">       
        <h3>Special Offers</h3>       
    </div>   
</div>

<div class="icons">
    
    
    <i class="fa-solid fa-lock"></i>

    <div class="content">
        <h3>Secure Payments</h3>
        
    </div>
    
</div>

</section>

 <!-- /////////////////////  icons section ends  /////////////// -->

<div class="photo_brands" id="photobrands">
    <img src="Brands.jpg" >
</div>


<!-- /////////////////////   New Collection    ////////////////// -->

<?php 

echo '<section class="featured" id="arrivals">

<h1 class="heading"><span>New Collection</span></h1>

<div class="swipers featured-sliders" style="display:flex;">

<section class="gallery" id="gallery">

  <div class="box-container">';

$gal=mysqli_query($conn,"SELECT *FROM product_info");

if(mysqli_num_rows($gal)>0){
    while($set=mysqli_fetch_assoc($gal)){
     
        echo '
    <div class="box">
        <img src="items/'.$set['pImg'].'" alt="">
        <div class="content">

        <div class="icons">';

        
                 echo'  
                 
                </div>

                <h3 style="font-family: serif;">'.$set['pName'].'</h3>
                <h3 style="font-family: serif;">'.$set['pDescription'].'</h3>
                <h2 style="font-family: serif;">'.'Rs.'.$set['pPrice'].'/-'.'</h2>';
                
       echo ' </div>
    </div>
    ';
        
    }
}
echo '</div>
</section>
</div>
</section>';

?>



 

   
 

<!-- ////////////////////////   footer   ////////////// -->


 <?php  include 'footer.php'; ?>



<!-- ///////////////////    footer section ends  //////////////// -->

    
    


<!-- ////////////////////     loader   /////////////////////-->

<div class="loader-container">
<img src="loader.gif" alt="">
</div> 

<!-- //////////////////    swiper linking     ///////////////-->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>



   <!-- //////////////    linking the javascript   /////////////-->
   <script src="javascript.js"></script>

</body>
</html>