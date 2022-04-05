<?php include("database.php");
include("navbar.php");
if(isset($_SESSION['adminid'])){
    $result=$mysqli->query("SELECT * FROM categories");
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    ?>
    <div class="container-fluid my-3">
    <h2 class="fw-bold text-center font-italic my-3 ">Categories Dashboard</h2>
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Categoryid</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Createdate</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($rows as $row){ ?>
                        <tr>
                            <td><?php echo $row['categoryid'] ?></td>
                            <td><img src="<?php echo $row['image'] ?>" width="100px" height="80px" alt=""></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo substr($row['description'], 0, 50) . "..."; ?></td>
                            <td><?php echo $row['createdate'] ?></td>
                            <td><a href="updatecategory.php?id=<?php echo $row['categoryid'];?>" class="text-success">Update</a></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
            <div class="text-center">
                <form action="addcategory.php" method="post">
                    <input class="my-3 btn btn-success btn-lg" type="submit" name="addcategory" value="Add category">
                </form>
            </div>
    </div>
    <?php
}
else{
    header("login.php");
}
?>