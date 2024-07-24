<?php 
     include 'config.php';
     session_start();


     if(isset($_SESSION['user_id'])){
        $id=$_SESSION['user_id'];
     }

     if(isset($_SESSION['user_id'])){
        $choose=mysqli_query($conn,"SELECT *FROM user_info WHERE uId='$id'");
        $row=mysqli_fetch_assoc($choose);

        $u=$row['email'];
        $p= $row['epassword'];

        $take=mysqli_query($conn,"SELECT *FROM normal_admin WHERE email='$u' and password='$p'");
        if(!mysqli_num_rows($take)>0){
            header('Location:home_page.php');
    
        }     
                   
    }
    else{
        header('Location:home_page.php');
    }



    if(isset($_POST['submit'])){

        $product=$_POST['name'];
        $quantity=$_POST['quantity'];
        $descript=$_POST['description'];
        $price=$_POST['price'];
        
        $p_image = $_FILES['p_image']['name'];
        $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
       
        $p_image_folder_arrivals = 'items/'.$p_image;
        

        $check=mysqli_query($conn,"SELECT *FROM product_info WHERE pName='$product'");

        if(mysqli_num_rows($check)>0){
            $row=mysqli_fetch_assoc($check);
            $quantity=$quantity+$row['pQuantity'];
            $pid=$row['pId'];
          
            $add=mysqli_query($conn,"UPDATE product_info SET  pQuantity='$quantity',pDescription='$descript',pPrice='$price',pImg='$p_image' WHERE pId='$pid'");
            if($add){
                    move_uploaded_file($p_image_tmp_name,$p_image_folder_arrivals);
                    $message[]='PRODUCT SUCCESSFULLY ADDED';
            }
            else{
                $message[]='not updated';
            }

           
        }
        else{

        
        $insert=mysqli_query($conn,"INSERT INTO product_info(pName,pQuantity,pDescription,pPrice,pImg)
           VALUES('$product','$quantity','$descript','$price','$p_image')") or die('query failed');

           if($insert){
                    move_uploaded_file($p_image_tmp_name,$p_image_folder_arrivals);
                    $message[]='PRODUCT SUCCESSFULLY ADDED';

                
            }
            else{
                $message[]='image not uploaded';
            }
           
        } 

    }


   if(isset($_POST['add_admin'])){

      $aname = mysqli_real_escape_string($conn, $_POST['aname']);
      $aemail = mysqli_real_escape_string($conn, $_POST['aemail']);
      $anum = mysqli_real_escape_string($conn, $_POST['anum']);
      $apass = mysqli_real_escape_string($conn, md5($_POST['apassword']));
      $acpass = mysqli_real_escape_string($conn, md5($_POST['acpassword']));

      if($apass!= $acpass){
         $messageA[]='confirm password not match';
      }
      else{
         $check_admin=mysqli_query($conn,"SELECT *FROM normal_admin WHERE email='$aemail' and password='$apass'  ");

         if(mysqli_num_rows($check_admin)>0){
            $messageA[]='this admin already exists';
         }
         else{
            $add_am=mysqli_query($conn,"INSERT INTO `normal_admin`(`name`, `email`, `number`, `password`) VALUES ('$aname','$aemail','$anum','$apass')");
            $add_us=mysqli_query($conn,"INSERT INTO `user_info`(`name`, `email`, `number`, `epassword`) VALUES ('$aname','$aemail','$anum','$apass')");

            if($add_am and $add_us){
               $messageA[]='admin add sucsessfully';
            }
            else{
               $messageA[]='admin add fail';
            }
         }
      }
   }
    
?>
<!-- //////////////// html  ///////////// -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>

     <!-- linking fontawsome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- linking style sheets -->
    <link rel="stylesheet" href="login_sign_style.css">
    <!-- linking style sheets -->
    <link rel="stylesheet" href="style.css">
    <!-- linking swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>

    <style>
    .icon-eye {
        
        color: red; /* Change the color to red */
        font-size: 24px; /* Change the font size to 24 pixels */
        padding-bottom: 5px;
    }
</style> 
</head>
<body>
<header class="header">
<div class="header-1">
            <img src="logo-no-background.png" height="50px" width="300px">
             
            <div class="icons">                 
               <a href="#" id="shopping-cart"><i class="fa-solid fa-cart-shopping"></i></a>
               <a href="login.php" id="login-btn"><i class="fa-solid fa-user"></i></a>
               <a href="#" class="fa-brands fa-facebook"></a>
               <a href="#" class="fab fa-youtube"></a>                 
            </div>
        </div>
         

        <div class="header-2">
            <nav class="navbar">
                <a href="home_page.php">Home</a>
                
                <a href="home_page.php#arrivals">New Collection</a>
                <!-- <a href="#">Brands</a> -->
                <a href="admin.php">admin panal</a>  
            </nav>
        </div>
    </header>



      <!-- ////////////   add products   ////////// -->




      <div class="product-container">
        <div id="" class="signdiv"></div>
        <form action="" method="POST" enctype="multipart/form-data">

            <h3>add product</h3>
            

            <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>

      <div class="indiv">
      <span>product name</span>
            <input type="text" name="name" class="box" placeholder="Name" id="" required>
            <span>quantity</span>
            <input type="number" name="quantity" class="box" placeholder="Quantity" id="" required>
            <span>description</span>
            <input type="text" name="description" class="box" placeholder="Description" id="" required>
           
      </div>

      <div class="indiv">
      <span>price</span>
            <input type="number" min="0" name="price" class="box" placeholder="Price" id="" required>

      <span>image</span>     
            <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>       
            
      </div>
      <input type="submit" name="submit" value="Add" class="btn" >
                
        </form>
    </div>


 

    
    <!-- ///////////    super admin    ///////////// -->


    <?php  
     $knowing=mysqli_query($conn,"SELECT *FROM user_info WHERE uId='$id'");
     $look=mysqli_fetch_assoc($knowing);

     $ke=$look['email'];
     $kp=$look['epassword'];

    $check_super=mysqli_query($conn,"SELECT *FROM super_admin WHERE email='$ke' and password='$kp'");

     if(mysqli_num_rows($check_super)>0){
      echo '    <a style ="width: 200px;"  href="admin.php?add_admin"   class="option-btn-admin" > Add admin</a>';
    }

    ?>

    

   
    
    <!-- ////////////////    product table      ////////////-->


<section class="display-product-table" style="margin-bottom: 40px;">
<table>
   <thead>
      <th>image</th>
      <th>product</th>
      
      <th>quantity</th>
      <th>description</th>
      <th>price</th>
       
   </thead>

   <tbody>
      <?php
      
          $select_products = mysqli_query($conn, "SELECT * FROM `product_info` ORDER BY pID desc");
         if(mysqli_num_rows($select_products) > 0){
            while($row = mysqli_fetch_assoc($select_products)){
      ?>

      <tr>
        <?php 
        echo '<td><img src="items/'.$row['pImg'].'" height="100" alt=""></td>';
        ?>
         
         <td><?php echo $row['pName']; ?></td>
         <td><?php echo $row['pQuantity']; ?></td>
         <td><?php echo $row['pDescription']; ?></td>
         <td>Rs.<?php echo $row['pPrice']; ?>/-</td>
          
      </tr>

      <?php
         };    
         }
         else{
            echo "<div class='empty'>no product added</div>";
         };
      ?>
   </tbody>
</table>

</section>
 






    <!-- ///////////////////   add admin(sign form)    ////////////////// -->
    

    <?php   
    if(isset($_GET['add_admin'])){
       echo '<div class="add-form-container">
       
       <div id="" class="signdiv"></div>

      

       <form action="" method="POST" enctype="multipart/form-data">

       <a href="admin.php"  class="icon-eye fas fa-times"></a>

       
       
           <h3>Add Admin</h3>';

                 
      if(isset($messageA)){
         foreach($messageA as $messageA){
            echo '<div class="message">'.$messageA.'</div>';
         }
      }
        
         echo '
         
         <span>Name</span>
         <input type="text" name="aname" class="box" placeholder="User name" id="" required>
         <span>Email</span>
         <input type="email" name="aemail" class="box" placeholder="Enter your email" id="" required>
         <span>Mobile Number</span>
         <input type="number" name="anum" class="box" placeholder="94+number" id="" required>
         <span>Password</span>
         <input type="password" name="apassword" class="box" placeholder="Enter your password" id="" required>
         <span>Confirm Password</span>
         <input type="password" name="acpassword" class="box" placeholder="Enter your password" id="" required>
          
         <input type="submit" name="add_admin" value="add" class="btn" >
         
          
     </form>
 </div>';
      
echo  "<script>document.querySelector('.add-form-container').style.display = 'flex';</script>";
    }
    
    ?>

    
<!-- ////////////////////////////////////bottom nan  ///////////////////// -->

      

    
    

    <!-- /////////////////////////    footer    ////////////////// -->

    <?php  include 'footer.php'; ?>


<!-- ////////////////////////////     footer section ends  ///////////////// -->

<!-- loader -->

<div class="loader-container">
<img src="loader.gif" alt="">
</div> 

<!-- swiper linking -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

   <!-- linking the javascript -->
   <script src="javascript.js"></script>
    
</body>
</html>