<?php include("database.php");
include("navbar.php");
if(isset($_SESSION['adminid'])){
    $result=$mysqli->query("SELECT * FROM menus;");
    $rows = $result->fetch_all(MYSQLI_ASSOC);    
    ?>
    <div class="container-fluid my-3">
    <h2 class="fw-bold text-center font-italic my-3 ">Menu's Dashboard</h2>
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Menuid</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Specification</th>
                            <th>Price</th>
                            <th>Category type</th>
                            <th>Details</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($rows as $row){
                            $categoryid = $row['categoryid'];
                            $cresult=$mysqli->query("SELECT name FROM categories WHERE categoryid='$categoryid'");
                            while($crow = mysqli_fetch_assoc($cresult)){

                            ?>
                        <tr>
                            <td><?php echo $row['menuid'] ?></td>
                            <td><img src="<?php echo $row['image'] ?>" alt="" width="100px" height="80px"></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['specification'] ?></td>
                            <td><?php echo "€ ".$row['price'] ?></td>
                            <td><?php echo $crow['name'] ?></td>
                            <td><a href="updatemenu.php?id=<?php echo $row['menuid'] ?>" class="text-success">Update</a></td>
                            <td><a href="deletemenu.php?id=<?php echo $row['menuid'] ?>" class="text-success">Delete</a></td>
                        </tr>
                        <?php } } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="text-center">
                <form action="addmenu.php" method="post">
                    <input class="my-3 btn btn-success btn-lg" type="submit" name="addmenu" value="Add menu">
                </form>
            </div>
    </div>
    <?php
    
}
else{
    header("login.php");
}
?>