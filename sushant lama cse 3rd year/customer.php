<?php 
    session_start();
    require_once("config.php");

    if(isset($_POST['submit'])){
        $customer = $_POST['customer'];
        $address = $_POST['address'];
        $dollars_spent = $_POST['dollars_spent'];

        $sql = mysqli_query($con,"select * from customer where customer_name='$customer'");
        $row = mysqli_num_rows($sql);

        if($row>0){
            echo "<script>alert('customer already exists');</script>";
        }
        else{
                $msg=mysqli_query($con,"insert into customer(customer_name,address,dollars_spent) values('$customer','$address','$dollars_spent')");
                if($msg){
                    echo "<script>alert('Customer Added successfully');</script>";
                }
        }
    }
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Customer</title>
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
        <?php  include 'top_nav.php'  ?>
        <form name="customer" method="post" onsubmit="return true">
                <div class="form-control">
                    <label for="customer_name" id="label-name" >
                        Customer Name:
                    </label>

                    <input type="text" name="customer" placeholder="Enter customer name" required>
                </div>

                <div class="form-control">
                    <label for="customer_address" id="label-address">
                        Address :
                    </label>

                    <input type="text" name="address"  placeholder="Enter customer address" required>
                </div>

                <div class="form-control">
                    <label for="customer_amount" id="label-amount" >
                        Amount Spent :
                    </label>

                    <input type="number" name="dollars_spent" placeholder="Enter amount" required>
                </div>

                <button type="submit" name="submit">Add Customer</button>
        </form>
    </body>
</html>