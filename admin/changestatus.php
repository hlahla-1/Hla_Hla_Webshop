<?php include("database.php");
include("navbar.php");
if(isset($_SESSION['adminid'])){
    $orderid = $_GET['id'];
    if(isset($_POST['changestatus'])){
    $status = $_POST['orderstatus'];
    $result = $mysqli->query("UPDATE orders SET orderstatus='$status' WHERE orderid = '$orderid'");
    // header("location:orders.php");
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="form-floating my-3">
                        <label for="floatingInput">Choose order status</label><br>
                        <select name="orderstatus" class="form-select form-select-lg my-2">                                             
                            <option value="0">Order Placed</option>
                            <option value="1">Order Comfirmed</option>
                            <option value="2">Preparing your order</option>
                            <option value="3">Your order is on the way</option>
                            <option value="4">Order Delivered</option>
                            <option value="5">Order Denied</option>
                            <option value="6">Order Cancelled</option>
                        </select>  
                    </div>
                    <div class="">
                        <input class="my-3 btn btn-success btn-sm" type="submit" name="changestatus" value="Change Status">
                    </div>
                    <p>Go To <a href="orders.php">Menu's dashboard</a></p>
                </form>
            </div>
        </div>
    </div>

    <?php

} else{
    header("location:login.php");
}?>                     