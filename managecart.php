<?php
include("database.php");
if(isset($_SESSION['userid'])){            
    $userid=$_SESSION['userid'];
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST['addtobag'])){   
            
            $menuid = $_POST["menuid"];
            //Check this menu already exitst or not
            $result = $mysqli->query("SELECT * FROM viewcart WHERE menuid = '$menuid' AND userid ='$userid'");
            $existrow = mysqli_num_rows($result);
            if($existrow >0) {
                echo "<script>alert('Menu Already Added.');
                window.history.back(1);
                </script>";
            }
            else{
                $sql="INSERT INTO viewcart (menuid,itemquantity,userid,addeddate) VALUES ('$menuid','1','$userid',current_timestamp())";

                if ($mysqli->query($sql) === TRUE) {
                    echo "<script>
                    window.history.back(1);
                    </script>";
                }
            }
        }
    if(isset($_POST['removeitem'])) {
        $menuid = $_POST["menuid"];
        $sql = "DELETE FROM viewcart WHERE menuid= '$menuid'  AND userid='$userid'";   
        if($mysqli->query($sql) === TRUE){
        echo "<script>alert('Removed');
                window.history.back(1);
            </script>";
        }
    }
    if(isset($_POST['removeallitem'])) {
        $sql = "DELETE FROM viewcart WHERE userid ='$userid'";   
        if($mysqli->query($sql) === TRUE){
        echo "<script>alert('Removed All');
                window.history.back(1);
            </script>";
            header("location:cart.php");
        }
    }
    if(isset($_POST['order'])) {
        $adr1 = $_POST["address"];
        $adr2 = $_POST["address1"];
        $mobile = $_POST["mobile"];
        $city = $_POST["city"];
        $postcode = $_POST["postcode"];
        $address3 = $adr1.", ".$adr2;
        $address4 = $postcode.", ".$city;
        $amount = $_POST['totalprice'];

        $result=$mysqli->query("INSERT INTO orders (userId, address1,address2, mobile, amount, paymentMode, orderStatus, orderDate) VALUES ('$userid', '$address3', '$address4', '$mobile', '$amount', '0', '0', current_timestamp())");
        $orderid=$mysqli->insert_id;
        if ($result) { 
            $addResult = $mysqli->query("SELECT * FROM viewcart WHERE userid='$userid'");
            while($addrow = mysqli_fetch_assoc($addResult)){
                    $menuid = $addrow['menuid'];
                    $itemquantity = $addrow['itemquantity'];
                    $itemresult = $mysqli->query("INSERT INTO orderitems (orderid, menuid, itemquantity) VALUES ('$orderid', '$menuid', '$itemquantity')");
                }
                if($itemresult){
                $deleteresult = $mysqli->query("DELETE FROM viewcart WHERE userid = $userid");
                echo '<script>alert("Thanks for ordering with us. Your order id is ' .$orderid. '.");
                    window.location.href="index.php";  
                    </script>';
                    exit();
                }
            }
       
           
    }
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
    {
        $menuid = $_POST['menuid'];
        $qty = $_POST['quantity'];
        $updateresult = $mysqli->query("UPDATE viewcart SET itemquantity='$qty' WHERE menuid='$menuid' AND userid ='$userid'");
        
    }
}
}    
else
{
    header("location:login.php");
}
?>