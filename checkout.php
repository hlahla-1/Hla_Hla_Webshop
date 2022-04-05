<?php
include("head.php");
?>
<!-- Checkout Detail Section -->
<section>
    <div class="container">
        <div class="row">
        <div class="col-lg-12 text-center my-3">
                <h1 class="">Enter Your Details</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="managecart.php" method="post">
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Address 2</label>
                        <input type="text" name="address1" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                    </div>
                    <div class="form-group">
                        <label for="mobilenumber">Mobile</label>
                        <input type="text" name="mobile" class="form-control" id="mobilenumber" placeholder="06">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" name="city" class="form-control" id="inputCity">
                        </div>
                        <div class="form-group col-md-2">
                        <label for="inputZip">Postcode</label>
                        <input type="text" name="postcode" class="form-control" id="inputZip">
                        </div>
                        <div class="form-group col-md-4">
                        <label for="inputState">State</label>
                        <select id="inputState" class="form-control">
                            <option selected>Choose...</option>
                            <option>Nederland</option>
                        </select>
                        </div>                        
                    </div>
                    <div class="text-center my-4">
                     <input type="hidden" name="totalprice" value="<?php echo $_GET['totalprice'];?>">   
                    <button type="submit" name="order" class="btn btn-lg btn-success mr-3">Order now</button>
                    </div>                  
                </form>
                
                <p>If you want to change your order again <a href="cart.php">back to Card.</a></p>
            </div>
        </div>
    </div>
</section>
<!-- End Chekout -->