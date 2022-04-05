<?php include("database.php");
 if(isset($_POST['login'])&& $_POST['email']&& $_POST['password']){  
 
    $email = "";
    $password = "";
    $gevonden = false;
    
    $email=$_POST['email'];
    $password=$_POST['password'];

    $result = $mysqli->query("SELECT * FROM admins WHERE email='$email' AND password='$password'");

    $rows = $result->fetch_all(MYSQLI_ASSOC);
    foreach($rows as $row){
        $gevonden = true;
        $_SESSION['adminid'] = $row['adminid'];
        $_SESSION['adminname']=$row['firstname']." ".$row['lastname'];
    }       
    if($gevonden == false){
      echo "<p>Email and password are not match. Register if necessary</p>";
    }             
    header("location:home.php");    
}
else{
    //header("location: inloggen.php");
    // echo "<p>Fill out the form please!</P>";
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="main.css">
    <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
    .divider:after,
    .divider:before {
    content: "";
    flex: 1;
    height: 1px;
    background: #eee;
    }
    </style>
</head>
<body>
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="images/logo.jpg">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        
        <h2 class="fw-bold text-center mb-3 display-4">Admin login</h2>
        <form action="" method="post">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="form1Example13" name="email" class="form-control form-control-lg" />
            <label class="form-label" for="form1Example13">Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" id="form1Example23" name="password" class="form-control form-control-lg" />
            <label class="form-label" for="form1Example23">Password</label>
          </div>
          <!-- Submit button -->
          <button type="submit" name="login" class="btn btn-success btn-lg btn-block mb-3">Sign in</button>          
        </form>
        <p class="mb-5">If you don't register yet, go to  <a class="text-success" href="register.php"> Register</a> page.</p>

      </div>
    </div>
  </div>
</section>


 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
</body>
</html>