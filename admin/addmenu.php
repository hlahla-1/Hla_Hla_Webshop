<?php include("database.php");
include("navbar.php");
if(isset($_SESSION['adminid'])){
    if(isset($_POST['add'])){
       $menuname=$_POST['menuname']; 
       $specification = $_POST['specification'];
       $price = $_POST['price'];
       if(isset($_FILES['image']['name'])){
        $image="images/".$_FILES['image']['name'];
       }       
       $categoryid = $_POST['categorytype'];

       $sql ="INSERT INTO menus(name,specification,price,image,categoryid) VALUES
       ('$menuname','$specification','$price','$image','$categoryid')";
        if ($mysqli->query($sql) === TRUE) {
            // echo "You have registered!";
            header("location:menus.php");
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }$mysqli->close();
    }
    ?>
    <style>.wrapper{
       height: 45px;
        
  
    }</style>
    <div class="container my-3">
    <h2 class="fw-bold text-center font-italic my-3 ">Add A Menu</h2>
        <div class="row">
            <div class="col">
                <form method="POST" action="addmenu.php" enctype="multipart/form-data">
                <div class="form-floating mb-3">
                        <label for="floatingInput">Menu name</label>
                        <input type="text" name="menuname" class="form-control" placeholder="Enter menu name">                        
                    </div>
                    <div class="form-floating mb-3">                        
                        <label for="floatingInput">Specification</label>
                        <input type="text" name="specification"class="form-control" placeholder="Enter specification">
                    </div>
                    <div class="form-floating mb-3">
                        <label for="floatingInput">Price</label>                        
                        <input type="text" name="price"class="form-control" placeholder="Enter price">
                    </div>
                    <div class="form-floating mb-3">
                        <label for="floatingInput">Image</label>                                            
                        <input type="file" name="image"class="form-control wrapper">
                    </div>
                    <div class="form-floating mb-3">
                        <label for="floatingInput">Category Type</label><br>
                        <select name="categorytype" class="form-select form-select-lg my-2">
                        <?php
                            $categoryid = $row['categoryid'];
                            $cresult=$mysqli->query("SELECT * FROM categories");
                            while($crow = mysqli_fetch_assoc($cresult)) {
                         ?>                       
                        <option value="<?php echo $crow['categoryid'] ?>"><?php echo $crow['name'] ?></option>
                        <?php }?>
                        </select>

                        
                    </div>
                    <div class="text-center">
                    <input class="my-3 btn btn-success btn-lg"type="submit" name="add" value="Add">
                    </div>
                    <p>Go To <a href="menus.php">Menu's dashboard</a></p>
                </form>              
            </div>
        </div>        
    </div>
   <?php
}else{
    header("location:login.php");
} ?>