<?php include("database.php");
include("navbar.php");
if(isset($_SESSION['adminid'])){
    $result = $mysqli->query("SELECT * FROM orders");
    ?>
    <div class="container-fluid my-3">
    <h2 class="fw-bold text-center font-italic my-3 ">Orders Dashboard</h2>
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Order Id</th>
                            <th>Address</th>
                            <th>Phone No</th>
                            <th>Amount</th>						
                            <th>Payment Mode</th>
                            <th>Order Date</th>
                            <th>Status</th>
                            <th>Details</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($row = mysqli_fetch_assoc($result)){
                            $orderid = $row['orderid'];
                            $address1 = $row['address1'];
                            $address2 = $row['address2'];
                            $mobile = $row['mobile'];
                            $amount = $row['amount'];
                            $orderdate = $row['orderdate'];
                            $paymentmode = $row['paymentmode'];
                            $address = $address1." ".$address2;
                            if($paymentmode == 0) {
                             $paymentmode = "Cash on Delivery";
                            }
                            else {
                            $paymentMode = "Online";
                            }
                            $orderstatus = $row['orderstatus'];
                            if ($orderstatus == 0) 
                            $tstatus = "Order Placed.";
                            elseif ($orderstatus == 1) 
                            $tstatus = "Order Confirmed.";
                            elseif ($orderstatus == 2)
                            $tstatus = "Preparing your Order.";
                            elseif ($orderstatus == 3)
                            $tstatus = "Your order is on the way!";
                            elseif ($orderstatus == 4) 
                            $tstatus = "Order Delivered.";
                            elseif ($orderstatus == 5) 
                            $tstatus = "Order Denied.";
                            else
                            $tstatus = "Order Cancelled.";
                        ?>
                        <tr>
                            <td><?php echo $orderid; ?></td>
                            <td><?php echo substr($address, 0, 20) . "...";?></td>
                            <td><?php echo $mobile; ?></td>
                            <td><?php echo $amount; ?></td>
                            <td><?php echo $paymentmode; ?></td>
                            <td><?php echo $orderdate; ?></td>
                            <td><?php echo $tstatus; ?></td>
                            <td><a href="orderdetails.php?id=<?php echo $orderid; ?>" class="text-success">Order Details</a></td>
                            <td><a href="changestatus.php?id=<?php echo $orderid; ?>" class="text-success">Change Status</a></td>  
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
else{
    header("login.php");
}
?>