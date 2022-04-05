<?php
include("head.php");
?>
<style>.contact-container{
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px 0px #4e524e;
}</style>
<!-- Contact Section -->
    <!--Section: Contact v.2-->
<section class="mb-4 contact">
    <div class="container">
        <!--Section heading-->
        <h2 class="h1-responsive font-italic font-weight-bold text-center my-4">Contact us</h2>
        <!--Section description-->
        <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
            a matter of hours to help you.</p>

        <div class="row contact-container">

            <!--Grid column-->
            <div class="col-md-9 mb-md-0 my-3">
                <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                    <!--Grid row-->
                    <div class="row mb-3">

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <label for="name" class="">Your name</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <label for="email" class="">Your email</label>
                                <input type="text" id="email" name="email" class="form-control">
                            </div>
                        </div>
                        <!--Grid column-->

                    </div>
                    <!--Grid row-->

                    <!--Grid row-->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="md-form mb-0">
                                <label for="subject" class="">Subject</label>
                                <input type="text" id="subject" name="subject" class="form-control">
                            </div>
                        </div>
                    </div>
                    <!--Grid row-->

                    <!--Grid row-->
                    <div class="row mb-3">

                        <!--Grid column-->
                        <div class="col-md-12">

                            <div class="md-form">
                                <label for="message">Your message</label>
                                <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                            </div>

                        </div>
                    </div>
                    <!--Grid row-->

                </form>

                <div class="text-center text-md-center mb-3">
                    <a class="btn btn-success" onclick="document.getElementById('contact-form').submit();">Send</a>
                </div>
                <div class="status"></div>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-3 text-center">
                <ul class="list-unstyled mb-0">
                    <li><i class="fas fa-map-marker-alt fa-2x"></i>
                        <p>Teylerstraat 22, 2032 SR, Haarlem</p>
                    </li>

                    <li><i class="fas fa-phone mt-4 fa-2x"></i>
                        <p>+ 31 687 627 89</p>
                    </li>

                    <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                        <p>contact@hlahlakitchen.com</p>
                    </li>
                </ul>
            </div>
            <!--Grid column-->

        </div>
    </div>
</section>
<!--Section: Contact v.2-->
<!-- End Contact -->
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
                <a href="<?php echo SITEURL; ?>blogs.php"class="btn btn-variety d-block mb-3">
                    View all Blog's
                    <i class="fas fa-pen"></i>
                </a>
            </div>
        </div>
    </div>
</section>
 <!-- End of Blog Section-->
 <?php include('footer.php') ?>


