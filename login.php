<?php
include('head.php');
    if(isset($_POST['login'])&& $_POST['email']&& $_POST['password']){  
 
        $email = "";
        $password = "";
        $gevonden = false;
        
        $email=$_POST['email'];
        $password=$_POST['password'];

        $result = $mysqli->query("SELECT userid FROM users WHERE email='$email' AND password='$password'");

        $rows = $result->fetch_all(MYSQLI_ASSOC);
        foreach($rows as $row){
            $gevonden = true;
            $_SESSION['userid'] = $row['userid'];
        }       
        if($gevonden == false){
          echo "<p>Email and password are not match. Register if necessary</p>";
        }             
        header("location:index.php");    
    }
    else{
        //header("location: inloggen.php");
        // echo "<p>Fill out the form please!</P>";
    }
    ?>
<!-- Section Login -->
<style>section .login .login-container{
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px 0px #4e524e;
}</style>
<section class="">
<div class="container">
        <div class="row login">
            <div class="col-12 ">
            <h2 class="h1-responsive font-italic font-weight-bold text-center my-4">Login</h2>
                <form action="login.php" method="post" class="login-container mb-5">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="text-center">
                    <button class="my-3 btn btn-success btn-lg "type="submit" name="login">Login</button>
                    </div>
                    <p class="mb-5">If you don't register yet, go to  <a class="text-success" href="register.php"> Register</a> page.</p>
                </form>   
    
    </div>
  </div>        
</div>
</section>
<!-- End Login -->
<!--Menu Section-->
<section class="product-section bg-img py-3">
        <div class="container">
            <div class=" row justify-content-center pb-5">
                <div class="col-md-7 heading-section text-center">
                    <h2 class="font-weight-bold text-color glow">
                        Menu's
                    </h2>
                </div>
            </div>
            <!--End of title-->
            <div class="row">
                <?php
                    $result = $mysqli->query("SELECT * FROM menus LIMIT 8");
                    $rows = $result->fetch_all(MYSQLI_ASSOC);
                    foreach($rows as $row){
                ?>
                <div class="col-md-3 d-flex">
                    <div class="product glow">
                    <div class="img d-flex align-items-center justify-content-center">
                        <img src="<?php echo $row['image'] ?>"alt="">                                         
                    </div>
                     <div class="text text-center">
                         <span class="category font-weight-bold"><?php echo $row['name'] ?></span>
                         <h2 class="text-white"><?php echo $row['specification'] ?></h2>                         
                         <p class="price">$<?php echo $row['price'] ?></p>
                         <form action="managecart.php" method="post">
                             <input type="hidden" name="menuid" value="<?php echo $row['menuid']?>">
                             <button type="submit" class="btn btn-order mb-2" name="addtobag">Add To Bag <i class="fas fa-shopping-bag"></i></button>
                         </form>
                     </div>
                    </div>  
                </div>
                <?php } ?>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <a href="<?php echo SITEURL; ?>menus.php"class="btn btn-prod d-block">
                        View all menu's
                        <i class="fas fa-carrot"></i>
                    </a>
                </div>
            </div>
        </div>
</section>
    <!--End of Menu Section-->
    <!--Category----->
    <section id="variety" class="variety pt-4">
        <div class="container">
            <div class="section-title mb-5">
                <h2 class="text-center font-weight-bold">Categories</h2>                
            </div>
            <div class="row">
                <?php
                $result = $mysqli->query("SELECT * FROM categories LIMIT 6");
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                foreach($rows as $row){
                ?>
                <div class="col-md-6 d-flex align-items-stretch">
                    <div class="card">
                        <div class="card-img">
                            <img class="" src="<?php echo $row['image']; ?>" alt="">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="<?php echo SITEURL; ?>category.php?categoryid=<?php echo $row['categoryid'] ?>"><?php echo $row['name'] ?></a>
                            </h5>
                            <p class="card-text">
                            <?php echo $row['description'] ?>
                            </p>
                            <div class="read-more"><a href="#">
                                <i class="fas fa-arrow-circle-right"></i>
                                Read More
                            </a></div>
                        </div>
                    </div>                    
                </div>
               <?php } ?>                
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <a href="<?php echo $SITEURL;?>categories.php"class="btn btn-variety d-block">
                        View all categories
                        <i class="fas fa-pepper-hot"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!---End of Category-->
    <?php include('footer.php');?>
