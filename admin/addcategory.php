<?php include("database.php");
include("navbar.php");
if(isset($_SESSION['adminid'])){
    if(isset($_POST['add'])){
       $categoryname=$_POST['categoryname']; 
       $description = $_POST['description'];
       if(isset($_FILES['image']['name'])){
        $image="images/".$_FILES['image']['name'];
       } 
       $sql ="INSERT INTO categories(name,description,image) VALUES
       ('$categoryname','$description','$image')";
        if ($mysqli->query($sql) === TRUE) {
            // echo "You have registered!";
            header("location:categories.php");
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }$mysqli->close();
    }
    ?>
    <style>.wrapper{
       height: 45px;
        
  
    }</style>
    <div class="container my-3">
    <h2 class="fw-bold text-center font-italic my-3 ">Add A Category</h2>
        <div class="row">
            <div class="col">
                <form method="POST" action="addcategory.php" enctype="multipart/form-data">
                <div class="form-floating mb-3">
                        <label for="floatingInput">Category name</label>
                        <input type="text" name="categoryname" class="form-control" placeholder="Enter category name">                        
                    </div>
                    <div class="form-floating mb-3">                        
                        <label for="floatingInput">Description</label>
                        <textarea name="description" rows="3" class="form-control" id="description" placeholder="Enter description"></textarea>
                    </div>
                    <div class="form-floating mb-3">
                        <label for="floatingInput">Image</label>                                            
                        <input type="file" name="image"class="form-control wrapper">
                    </div>
                    
                    <div class="text-center">
                    <input class="my-3 btn btn-success btn-lg"type="submit" name="add" value="Add">
                    </div>
                    <p>Go To <a href="categories.php">Categories dashboard</a></p>
                </form>              
            </div>
        </div>        
    </div>
   <?php
}else{
    header("location:login.php");
} ?>