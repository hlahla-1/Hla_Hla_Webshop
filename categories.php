<?php include("head.php");?>
    <!--Category----->
    <section id="variety" class="variety pt-4">
        <div class="container">
            <div class="section-title mb-5">
                <h2 class="text-center font-weight-bold">All Categories</h2>                
            </div>
            <div class="row">
                <?php
                $result = $mysqli->query("SELECT * FROM categories");
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                foreach($rows as $row){
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
        </div>
    </section>
    <!---End of Category-->
    <?php include("footer.php"); ?>
