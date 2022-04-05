<?php include("database.php");
include("navbar.php");
if(isset($_SESSION['adminid'])){
    $result=$mysqli->query("SELECT * FROM users");
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    foreach($rows as $row){
    ?>
    <div class="container-fluid my-3">
        <h2 class="fw-bold text-center font-italic my-3 ">Users Dashboard</h2>
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Userid</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Mobile</th>
                            <th>Joindate</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $row['userid'] ?></td>
                            <td><?php echo $row['firstname'] ?></td>
                            <td><?php echo $row['lastname'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['password'] ?></td>
                            <td><?php echo $row['mobile'] ?></td>
                            <td><?php echo $row['joindate'] ?></td>
                        </tr>
                    </tbody>
                </table>
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