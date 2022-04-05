<?php
include("head.php");
?>
<!-- Search Section -->
<section>
    <div class="container">
        <h2 class="py-2">Search Result for <em>"<?php echo $_GET['search']?>"</em> :</h2>
            <?php
                $noResult = true;
                $search = $_GET['search'];
                $result = $mysqli->query("SELECT * FROM categories WHERE MATCH(name,description) against('$search')"); 
                $rows = $result->fetch_all(MYSQLI_ASSOC);?>
                    <!-- Search Category section -->
                    <section id="variety" class="variety pt-4">
                        <div class="container">
                            <div class="section-title mb-5">
                            <h2 class="text-center font-weight-bold">Categories</h2>                
                            </div>
                            <div class="row">
                            <?php
                                foreach($rows as $row){
                                $noResult= false;
                            ?>
                                <div class="col-md-6 d-flex align-items-stretch">
                                    <div class="card">
                                        <div class="card-img">
                                            <img class="" src="<?php echo $row['image'] ?>" alt="">
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a href="<?php echo SITEURL; ?>category.php?categoryid=<?php echo $row['categoryid'] ?>"><?php echo $row['name'] ?></a>
                                            </h5>
                                            <p class="card-text">
                                            <?php echo $row['description'] ?>
                                            </p>
                                            <div class="read-more"><a href="<?php echo SITEURL; ?>category.php?categoryid=<?php echo $row['categoryid'] ?>">
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
                    <a href="<?php echo SITEURL; ?>categories.php"class="btn btn-variety d-block">
                        View all categories
                        <i class="fas fa-pepper-hot"></i>
                    </a>
                </div>
            </div>
        </div>
                </div>
            </section>
            <!-- End Category Section -->
            <!--Menu Section-->
            <?php
                $result = $mysqli->query("SELECT * FROM menus WHERE MATCH(name,specification) against('$search')"); 
                $rows = $result->fetch_all(MYSQLI_ASSOC);?>
                
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
                        foreach($rows as $row){
                        $noResult= false;
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
                        <?php }?>
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
    <?php
                if($noResult) {?>
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <h1>Your search - <em>"<?php echo $_GET['search']; ?>"</em> - No Result Found.</h1>
                            <p class="lead"> Suggestions: <ul>
                                <li>Make sure that all words are spelled correctly.</li>
                                <li>Try different keywords.</li>
                                <li>Try more general keywords.</li></ul>
                            </p>
                        </div>
                    </div>
                <?php } ?>
    <!--End of Menu Section-->
        </div>
</section>
<!-- End Search -->