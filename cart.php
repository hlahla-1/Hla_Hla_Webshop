<?php
include("head.php");
if(isset($_SESSION['userid'])){
?>
    <!-- Section Cart -->
    <section>
    <div class="container" id="cont">
        <div class="row">
            <!-- <div class="mt-3 alert alert-secondary mb-0" style="width: -webkit-fill-available;">
              <strong>Info!</strong> online payment are currently disabled so please choose cash on delivery.
            </div> -->
            <div class="col-lg-12 text-center my-3">
                <h1 class="font-weight-bold">My Cart</h1>
            </div>         
            <div class="col-lg-8">
                <div class="card wish-list mb-3">
                    <table class="table text-center">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Image</th>
                                <th scope="col">Item Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">
                                    <form action="managecart.php" method="POST">
                                        <button name="removeallitem" class="btn btn-sm btn-outline-success">Remove All</button>
                                        <input type="hidden" name="userid" value="<?php $userid = $_SESSION['userid']; echo $userid ?>">
                                    </form>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                
                                $result = $mysqli->query("SELECT * FROM viewcart WHERE userid = '$userid'");
                                $counter = 0;
                                $totalPrice = 0;
                                while($row = mysqli_fetch_assoc($result)){
                                    $menuid = $row['menuid'];
                                    $quantity = $row['itemquantity'];
                                    $myresult = $mysqli->query("SELECT * FROM menus WHERE menuid = '$menuid'");
                                    $myrow = mysqli_fetch_assoc($myresult);
                                    $menuname = $myrow['name'];
                                    $menuprice = $myrow['price'];
                                    $menuimage = $myrow['image'];
                                    $total = $menuprice * $quantity;
                                    $counter++;
                                    $totalPrice = $totalPrice + $total;
                                    $_SESSION['totalprice']=$totalPrice;
                                    ?>                                    
                                    <tr>
                                            <td><?php echo $counter; ?></td>
                                            <!-- <td><div><img src="" width="60px" height="40px"></div></td> -->
                                            <td><?php echo $menuname; ?></td>
                                            <td><?php echo $menuprice; ?></td>
                                            <td>
                                                <form id="frm<?php echo $menuid;?>">
                                                    <input type="hidden" name="menuid" value="<?php echo $menuid;?>">
                                                    <input type="number" name="quantity" value="<?php echo $quantity;?>" class="text-center" onchange="updateCart('<?php echo $menuid;?>')" style="width:60px" min=1;">
                                                </form>
                                            </td>
                                            <td><?php echo $total;?></td>
                                            <td>
                                                <form action="managecart.php" method="POST">
                                                    <button name="removeitem" class="btn btn-sm btn-outline-success">Remove</button>
                                                    <input type="hidden" name="menuid" value="<?php echo $menuid;?>">
                                                </form>
                                            </td>
                                       </tr>
                                    <?php }
                                if($counter==0) {
                                ?>
                                    <script>
                                     document.getElementById("cont").innerHTML ='<div class="col-md-12 my-5"><div class="card"><div class="card-body cart"><div class="col-sm-12 empty-cart-cls text-center"><img src="./images/card.png" width="130" height="130" class="img-fluid mb-4 mr-3"><h3><strong>Your Cart is Empty</strong></h3><h4>Add something to make me happy :)</h4><a href="index.php" class="btn btn-success cart-btn-transform m-3" data-abc="true">continue order</a></div></div></div></div>';
                                    </script>
                                <?php
                                }
                            ?>
                        </tbody>
                    </table>                    
                </div>
                <div class="text-center my-3">
                        <a href="index.html" class="btn btn-success">Continue shopping</a>
                    </div>
            </div> 
        <div class="col-lg-4">
                <div class="card wish-list mb-3">
                    <div class="pt-4 border bg-light rounded p-3">
                        <h5 class="mb-3 text-uppercase font-weight-bold text-center">Order summary</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0 bg-light">Total Price<span>€ <?php echo $totalPrice; ?></span></li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0 bg-light">Shipping<span>€ 0</span></li>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3 bg-light">
                                <div>
                                    <strong>The total amount of</strong>
                                    <strong><p class="mb-0">(including Tax & Charge)</p></strong>
                                </div>
                                <span><strong>€ <?php echo $totalPrice ?></strong></span>
                                
                            </li>
                        </ul>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Cash On Delivery 
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault1" disabled>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Online Payment 
                            </label>
                        </div><br>
                        <form action="checkout.php" method="get">
                        <a href="checkout.php?totalprice=<?php echo $totalPrice;?>"><button type="button" class="btn btn-success btn-block">Checkout</button></a>
                        </form>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="pt-4">
                        <a class="dark-grey-text d-flex justify-content-between" style="text-decoration: none; color: #050607;" data-toggle="collapse" href="#collapseExample"
                            aria-expanded="false" aria-controls="collapseExample">
                            Add a discount code (optional)
                            <span><i class="fas fa-chevron-down pt-1"></i></span>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <div class="mt-3">
                                <div class="md-form md-outline mb-0">
                                    <input type="text" id="discount-code" class="form-control font-weight-light"
                                    placeholder="Enter discount code">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        </div> 
    </div>
    <?php    
}
else {
    header("location:login.php");
    
}
?>
                                
</section>
<!-- End Cart -->



<?php
include("footer.php");
?>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    <script>
        function check(input) {
            if (input.value <= 0) {
                input.value = 1;
            }
        }
        function updateCart(id) {
            $.ajax({
                url: 'managecart.php',
                type: 'POST',
                data:$("#frm"+id).serialize(),
                success:function(res) {
                    location.reload();
                } 
            })
        }
    </script>