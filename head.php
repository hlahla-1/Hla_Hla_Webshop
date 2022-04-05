<?php
 include('database.php');
 ?>       
<!Doctype html>
<html lang="en">
  <head>
    <title> Hla Hla Kitchen</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="main.css">
    <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <!-- Cover Section -->
    <section>
        <div class="cover">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 d-flex align-items-center">
                        <p class="mb-0 phone pl-md-2">
                            <a href="#"class="mr-2">
                                <i class="fas fa-phone mr-1"></i>
                                +31 06 8762 7789
                            </a>
                            <a href="mailto:hlahlakitchen@gmail.com"><i class="fas fa-paper-plane mr-1"></i>
                                hlahlakitchen@gmail.com
                            </a>
                        </p>
                    </div>
                    <?php
                        if(isset($_SESSION['userid'])){
                            $id=$_SESSION['userid'];
                            $result =$mysqli->query("SELECT * FROM users WHERE userid='$id'");
                            $rows = $result->fetch_all(MYSQLI_ASSOC);
                            foreach($rows as $row){ ?>
                            <div class="reg">
                            <i class="fas fa-user-alt"></i>
                            <a href="<?php echo SITEURL; ?>profile.php" class="mr-2 mb-0"><?php echo $row['firstname']." ".$row['lastname']?></a>
                            <a href="<?php echo SITEURL; ?>logout.php" class="mr-2 mb-0">logout</a>
                        </div>
                        <?php } }
                        else{?>
                        <div class="reg">
                            <a href="<?php echo SITEURL; ?>register.php" class="mr-2 mb-0">Sign-Up</a>
                            <a href="<?php echo SITEURL; ?>login.php">Log In</a>
                        </div>
                    </div>
                    <?php
                        }
                    ?>                    
                </div>
            </div>
        </div>
    </section>
    <!-- End of Cover Section -->
    <!-- Navbar Section -->
    <section>
        <nav class="navbar navbar-expand-lg main-navbar bg-color main-navbar-color" id="main-navbar">
        <div class="container">
            <a class="navbar-brand" href="<?php echo SITEURL; ?>"> Hla Hla Kitchen</a>
            <?php
             if(isset($_SESSION['userid'])){
                $id=$_SESSION['userid'];
                $result=$mysqli->query("SELECT SUM(itemQuantity) AS count FROM viewcart WHERE userid= '$id'");
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                foreach($rows as $row){
                $count = $row['count'];
                }
                if(!$count){
                    $count=0;
                }
                ?>
                <div class="order-lg-last">
                <a href="<?php echo SITEURL; ?>cart.php"><i class="fas fa-shopping-bag fa-2x btn-group"></i></a> <span class="text-success fw-bold"><?php echo " ".$count." "; ?></span>
                </div>
                <?php
                }
                else{?>
                    <div class="order-lg-last">
                    <a href="<?php echo SITEURL; ?>cart.php"><i class="fas fa-shopping-bag fa-2x btn-group"></i></a> 
                    </div>
                <?php
                }?>            
            <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#myNav" aria-controls="nav" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars"></i></button>
            <div class="collapse navbar-collapse"id="myNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="<?php echo SITEURL; ?>"class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo SITEURL; ?>categories.php"class="nav-link">Categories</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo SITEURL; ?>menus.php"class="nav-link">Menu's</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo SITEURL; ?>blogs.php"class="nav-link">Blogs</a>
                </li>
                <!-- <li class="nav-item">
                    <a href="<?php echo SITEURL; ?>about.php"class="nav-link">About Us</a>
                </li> -->
                <li class="nav-item">
                    <a href="<?php echo SITEURL; ?>contact.php"class="nav-link">Contact</a>
                </li>
            </ul>
        </div>
        </div>
        </nav>
    </section>    
    <!--End of Navbar-->
