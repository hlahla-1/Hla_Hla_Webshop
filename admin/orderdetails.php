<?php include("database.php");
include("navbar.php");
if(isset($_SESSION['adminid'])){
    $orderid = $_GET['id'];
    $result=$mysqli->query("SELECT * FROM orderitems WHERE orderid='$orderid'");
        ?>
        <div class="container">
            <h2 class="text-center font-weight-bold font-italic my-3">Order Details</h2>

            <div class="row">
                <div class="col">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Menuid</th>
                                <th>Image</th>
                                <th>Menu name</th>
                                <th>Specification</th>						
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                while($row=mysqli_fetch_assoc($result)){
                                    $menuid =$row['menuid'];
                                    $mresult = $mysqli->query("SELECT * FROM menus WHERE menuid='$menuid'");
                                    while($mrow=mysqli_fetch_assoc($mresult)){ ?>
                                        <tr>
                                            <td><?php echo $mrow['menuid'] ?></td>
                                            <td><img src="<?php echo $mrow['image'] ?>" alt="" width="100px" height="80px"></td>
                                            <td><?php echo $mrow['name'] ?></td>
                                            <td><?php echo $mrow['specification'] ?></td>
                                            <td><?php echo $mrow['price'] ?></td>
                                        </tr>
                                    <?php }
                                }
                                     ?>
                        </tbody>
                    </table>                    
                </div>
            </div>
            <p>Back to <a href="orders.php" class="text-success"> Orders</a></p>
        </div>
        <?php
    
}
else{
    header("location:login.php");
}
?>