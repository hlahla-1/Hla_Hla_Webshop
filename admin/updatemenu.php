<?php include("database.php");
include("navbar.php");
if(isset($_SESSION['adminid'])){
    $menuid = $_GET['id'];
    
    if(isset($_POST['update'])){
       $menuname=$_POST['menuname']; 
       $specification = $_POST['specification'];
       $price = $_POST['price'];
       if(isset($_FILES['image']['name'])){
        $image="images/".$_FILES['image']['name'];
       }       
       $categoryid = $_POST['categorytype'];

       $resultupdate = $mysqli->query("UPDATE menus SET name = '$menuname',specification='$specification',price='$price',image='$image',categoryid='$categoryid' WHERE menuid='$menuid'");

    }
    $result=$mysqli->query("SELECT * FROM menus where menuid='$menuid';");
    $rows = $result->fetch_all(MYSQLI_ASSOC);  
    foreach($rows as $row) {
    ?>
    <style>.wrapper{
       height: 45px;
        
  
    }</style>
    <div class="container my-3">
    <h2 class="fw-bold text-center font-italic my-3 ">Update Menu</h2>
        <div class="row">
            <div class="col">
                <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-floating mb-3">
                        <label for="floatingInput">Menu name</label>
                        <input type="text" readonly name="menuname" class="form-control" value="<?php echo $row['name']; ?>">                        
                    </div>
                    <div class="form-floating mb-3">                        
                        <label for="floatingInput">Specification</label>
                        <input type="text" readonly name="specification"class="form-control" value="<?php echo $row['specification'] ?>">
                    </div>
                    <div class="form-floating mb-3">
                        <label for="floatingInput">Price</label>                        
                        <input type="text" name="price"class="form-control" placeholder="<?php echo $row['price'] ?>">
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
                    <input class="my-3 btn btn-success btn-lg"type="submit" name="update" value="Update">
                    </div>
                    <p>Go To <a href="menus.php">Menu's dashboard</a></p>
                </form>              
            </div>
        </div>        
    </div>
    <?php
    } 
    
}
else{
    header("login.php");
}
?>