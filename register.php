<?php include("head.php");
//var_dump($_POST);
//print_r($_POST);

//print_r($_SERVER);
if(isset($_POST['register'])&& $_POST['email'] && $_POST['password']){
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $mobile = $_POST['mobile'];
    if($password!=$cpassword)
    {
        echo "Passwords are not same!!";
    }
    
    $sql = "INSERT INTO users (firstname, lastname, email,password,mobile) VALUES
    ('$firstname', '$lastname', '$email','$password', '$mobile')";

    if ($mysqli->query($sql) === TRUE) {
        // echo "You have registered!";
        header("location:login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }$mysqli->close();
}
?>
<!-- Section Register -->
<style>section .register .register-container{
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px 0px #4e524e;
}</style>
<section>
<div class="container">
        <div class="row register mb-4">
            <div class="col-12">
            <h2 class="h1-responsive font-italic font-weight-bold text-center my-4">Register</h2>
                <form action="" method="post" class="register-container mb-4">
                    <div class="mb-3">
                        <label for="exampleInputName1" class="form-label">First name</label>
                        <input type="text" name="firstname" class="form-control" id="formGroupExampleInput" aria-describedby="emailHelp" require>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputName1" class="form-label">Last name</label>
                        <input type="text" name="lastname" class="form-control" id="formGroupExampleInput" aria-describedby="emailHelp" require>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" require>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Mobile</label>
                        <input type="text" name="mobile" class="form-control" id="formGroupExampleInput" aria-describedby="emailHelp" require>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="formGroupExampleInput" require>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Comfirm Password</label>
                        <input type="password" name="cpassword" class="form-control" id="formGroupExampleInput" require>
                    </div>
                    
                    <div class="text-center my-3">
                      <button type="submit" name="register" class="btn btn-lg btn-success">Register</button>
                    </div>
                    <p>Go To <a class="text-info" href="login.php">Login</a> page.</p>
                </form>      
        </div>
      </div>
    </div>
    </section>
    <!-- End Register -->
    <?php include("footer.php"); ?>