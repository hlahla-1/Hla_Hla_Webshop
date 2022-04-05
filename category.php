<?php include("head.php");
if($_GET['categoryid']){
    $id=$_GET['categoryid'];
    $result =$mysqli->query("SELECT * FROM menus WHERE menus.categoryid='$id'");
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    ?>
      <!--Menu Section-->
    <section class="product-section bg-img py-3">
        <div class="container">
            <div class=" row justify-content-center pb-5">
                <div class="col-md-7 heading-section text-center">
                            <?php $cresult =$mysqli->query("SELECT name FROM categories WHERE categoryid='$id'");
                            $crows =$cresult->fetch_all(MYSQLI_ASSOC); 
                            foreach($crows as $crow){
                                ?>
                            <h2 class="font-weight-bold text-color glow">
                                Menu's of <?php echo $crow['name'];?>
                            </h2>
                    <?php }?>
                </div>
            </div>
            <!--End of title-->
            <div class="row">
                <?php foreach($rows as $row){ ?>
                <div class="col-md-3 d-flex">
                    <div class="product glow">
                    <div class="img d-flex align-items-center justify-content-center">
                        <img src="<?php echo $row['image'] ?>"alt="">                                         
                    </div>
                     <div class="text text-center">
                         <span class="category font-weight-bold"><?php echo $row['name'] ?></span>
                         <h6>
                             <i class="fas fa-star text-white"></i>
                             <i class="fas fa-star text-white"></i>
                             <i class="fas fa-star text-white"></i>
                             <i class="fas fa-star text-white"></i>
                             <i class="far fa-star text-white"></i>
                         </h6>
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
<?php
}
?>
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
   <?php include("footer.php"); ?>