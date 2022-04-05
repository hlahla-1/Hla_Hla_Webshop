<?php include("database.php");
include("navbar.php");
if(isset($_SESSION['adminid'])){
    $categoryid = $_GET['id'];
    
    if(isset($_POST['update'])){
       $categoryname=$_POST['categoryname']; 
       $description = $_POST['description'];
       if(isset($_FILES['image']['name'])){
        $image="images/".$_FILES['image']['name'];
       } 
       $resultupdate = $mysqli->query("UPDATE categories SET name = '$categoryname',description='$description',image='$image' WHERE categoryid='$categoryid'");

    }
    $result=$mysqli->query("SELECT * FROM categories where categoryid='$categoryid';");
    $rows = $result->fetch_all(MYSQLI_ASSOC);  
    foreach($rows as $row) {
    ?>
    <style>.wrapper{
       height: 45px;
        
  
    }</style>
    <div class="container my-3">
    <h2 class="fw-bold text-center font-italic my-3 ">Update Category</h2>
        <div class="row">
            <div class="col">
                <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-floating mb-3">
                        <label for="floatingInput">Category name</label>
                        <input type="text" name="categoryname" class="form-control" value="<?php echo $row['name']; ?>">                        
                    </div>
                    <div class="form-floating mb-3">                        
                        <label for="floatingInput">Description</label>
                        <textarea name="description"class="form-control" placeholder="<?php echo $row['description'] ?>"></textarea>
                    </div>
                    <div class="form-floating mb-3">
                        <label for="floatingInput">Image</label>                                            
                        <input type="file" name="image"class="form-control wrapper">
                    </div>
                    <div class="text-center">
                    <input class="my-3 btn btn-success btn-lg"type="submit" name="update" value="Update">
                    </div>
                    <p>Go To <a href="categories.php">Categories dashboard</a></p>
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