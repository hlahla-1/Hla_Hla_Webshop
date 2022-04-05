<?php include("head.php");
?>
<!-- Dashboard section -->
<section class="dashboard">
<?php
if(isset($_SESSION['userid'])){
    $id = $_SESSION['userid'];
    $result = $mysqli->query("SELECT * FROM users WHERE userid ='$id'");
    $rows = $result->fetch_all(MYSQLI_ASSOC); 
}
?>
<style>section .details .details-container{
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px 0px #4e524e;
}</style>
<div class="container mb-5">
<h2 class="h1-responsive font-italic font-weight-bold text-center my-4">Account Details</h2>
    <div class="row details">
        <div class="col details-container"> 
            <table class="table table-hover table-striped">                
                <?php foreach($rows as $row){ ?>                                     
                    <tbody>
                        <!-- <tr>
                            <th>Dashboard</th>
                            <th>Details</th>
                        </tr> -->
                        <tr>
                            <th>Firstname</th>
                            <td><?php echo $row['firstname'] ?></td>                            
                        </tr>
                        <tr>
                            <th>Lastname</th>
                            <td><?php echo $row['lastname'] ?></td>                            
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo $row['email'] ?></td>                            
                        </tr>
                        <tr>
                            <th>Password</th>
                            <td><?php echo $row['password'] ?></td>                            
                        </tr>
                        <tr>
                            <th>Mobile</th>
                            <td><?php echo $row['mobile'] ?></td>                            
                        </tr>
                    </tbody> 
                    <?php } ?>
            </table>
            <div class=" m-3 text-center">
                <a href="update.php?id=<?php echo $row['userid'] ?>"><input class="btn btn-success mr-3" type="button" value="Update Details"></a>
                <a href="delete.php?id=<?php echo $row['userid'] ?>"><input class="btn btn-success mr-3" type="button" value="Delete Account"></a>
                <a href="vieworders.php?id=<?php echo $row['userid'] ?>"><input class="btn btn-success mr-3" type="button" value="Your orders"></a> 
            </div>
        </div>
    </div>    
</div>
</section>
<!-- End Dashboard Section -->
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
                    <!-- <div class="img d-flex align-items-center justify-content-center"> -->
                    <div class=" img d-flex align-items-center justify-content-center">    
                    <img src="<?php echo $row['image'] ?>"alt="">                                         
                    </div>
                     <div class="text text-center">
                         <span class="category font-weight-bold"><?php echo $row['name'] ?></span>
                         <h2 class="text-white"><?php echo $row['specification'] ?></h2>                         
                         <p class="price">$<?php echo $row['price'] ?></p>
                         <a href="#" class=" mb-1 btn btn-order">Add To Bag</a>
                     </div>
                    </div>  
                </div>
                <?php } ?>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <a href="#"class="btn btn-prod d-block">
                        View all menu's
                        <i class="fas fa-carrot"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--End of Menu Section-->
<!--Blog Section-->
<section class="blog-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center">
                <h2 class="blog-heading mt-2">Recent Blog</h2>
            </div>
        </div>
        <div class="row d-flex">
                <?php
                    $result = $mysqli->query("SELECT * FROM blogs LIMIT 4");
                    $rows = $result->fetch_all(MYSQLI_ASSOC);
                    foreach($rows as $row){
                ?>
            <div class="col-lg-6 d-flex align-items-stretch">
                <div class="blog-start d-flex">
                    <a href="#"class="block-20 img"
                    style="background-image: url('<?php echo $row['image'] ?>');">
                    </a>
                    <div class="text p-4 bg-light">
                        <div class="des">
                            <p><i class="fa fa-calendar"></i>
                            <?php echo $row['blogdate'] ?>
                            </p>
                        </div>
                        <h3 class="heading mb-3">
                            <a href="#">
                            <?php echo $row['title'] ?>
                            </a>
                        </h3>
                        <p><?php echo $row['body'] ?></p>
                        <a href="#" class="btn-custom">Continue
                            <i class="fa fa-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <a href="#"class="btn btn-variety d-block mb-3">
                    View all Blog's
                    <i class="fas fa-pen"></i>
                </a>
            </div>
        </div>
    </div>
</section>
 <!-- End of Blog Section-->
 <?php include("footer.php") ?>
