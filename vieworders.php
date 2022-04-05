<?php include("head.php");
if(isset($_SESSION['userid'])){
    $id = $_SESSION['userid']; ?>
<style>
    .table-wrapper{
        background: #fff;
        padding: 20px 25px;
        margin: 30px auto;
        border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-wrapper .btn {
        float: right;
        color: #333;
        background-color: #fff;
        border-radius: 3px;
        border: none;
        outline: none !important;
        margin-left: 10px;
    }
    .table-wrapper .btn:hover {
        color: #333;
        background: #f2f2f2;
    }
    .table-wrapper .btn.btn-primary {
        color: #fff;
        background: #03A9F4;
    }
    .table-wrapper .btn.btn-primary:hover {
        background: #03a3e7;
    }
    .table-title .btn {		
        font-size: 13px;
        border: none;
    }
    .table-title .btn i {
        float: left;
        font-size: 21px;
        margin-right: 5px;
    }
    .table-title .btn span {
        float: left;
        margin-top: 2px;
    }
    .table-title {
        color: #000;
        background: #adb5bd;		
        padding: 16px 25px;
        margin: -20px -25px 10px;
        border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }
</style>
<!-- View order section -->
<section>
    <div class="container">
        <div class="table-wrapper" id="empty">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4">
                        <h2>Order <b>Details</b></h2>
                    </div>
                    <div class="col-sm-8">
                        <a href="" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                                           <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                                                           <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                                                            </svg><span> Refresh List </span></a>
                        <a href="#" onclick="window.print()" class="btn btn-info"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                                                                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                                                                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                                                                                </svg><span> Print </span></a>   
                    </div>
                </div>
            </div>
                    <?php
                        $result = $mysqli->query("SELECT * FROM orders WHERE userid= '$id'");
                        $counter = 0;
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
                            
                            $counter++;
                            $resultorder = $mysqli->query("SELECT * FROM orderitems WHERE orderid='$orderid'");
                            
                            

                            ?>
                            <table class="table table-striped table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Address</th>
                                    <th>Phone No</th>
                                    <th>Amount</th>						
                                    <th>Payment Mode</th>
                                    <th>Order Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                <tr>
                                    <td><?php echo $orderid; ?></td>
                                    <td><?php echo substr($address, 0, 20) . "...";?></td>
                                    <td><?php echo $mobile; ?></td>
                                    <td><?php echo $amount; ?></td>
                                    <td><?php echo $paymentmode; ?></td>
                                    <td><?php echo $orderdate; ?></td>
                                    <td><?php echo $tstatus; ?></td>                                
                                </tr>
                                <tr>
                                <td>
                                        <tr>
                                            <th>Menu name</th>
                                            <th>Price</th>
                                            <th>Item Quantity</th>
                                        </tr>
                                        <?php
                                        while($rows = mysqli_fetch_assoc($resultorder)){
                                            $menuid = $rows['menuid'];
                                            $menuquantity = $rows['itemquantity'];
                                            $resultmenu = $mysqli->query("SELECT * FROM menus WHERE menuid='$menuid'");
                                            $menurows= mysqli_fetch_assoc($resultmenu);
                                            $menuname = $menurows['name'];
                                            $menuprice = $menurows['price'];
                                        ?>
                                        <tr>
                                            <td><?php echo $menuname; ?></td>
                                            <td><?php echo $menuprice; ?></td>
                                            <td><?php echo $menuquantity; ?></td>
                                        </tr>
                                    <?php } ?>
                                </td>
                                    
                            </tr>
                        <?php    
                        }
                        
                        if($counter==0) {
                            ?><script>                                    
                                document.getElementById("empty").innerHTML = '<div class="col-md-12 my-5"><div class="card"><div class="card-body cart"><div class="col-sm-12 empty-cart-cls text-center"> <img src="./images/card.png" width="130" height="130" class="img-fluid mb-4 mr-3"><h3><strong>You have not ordered any items.</strong></h3><h4 class="mb-4">Please order to make me happy :)</h4> <a href="index.php" class="btn-lg btn-success cart-btn-transform my-3" data-abc="true">continue shopping</a> </div></div></div></div>';
                            </script> <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?php }
?>
