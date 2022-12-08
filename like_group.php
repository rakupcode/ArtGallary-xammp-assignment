<?php 
    session_start();
    require_once("config.php");

    if(isset($_POST['submit'])){
        $customer = $_POST['customer_name'];
        $group = $_POST['group_name'];
        
        $customer_result = mysqli_query($con,"select customer_id from customer where customer_name='$customer'");
        $customer_row = mysqli_num_rows($customer_result);
            if($customer_row == 1){
                $customer = $customer_result->fetch_assoc();
                $customer_id = $customer["customer_id"];
                    $sql = mysqli_query($con,"select * from likes_groups where group_name='$group' and customer_id='$customer_id'");
                    $row = mysqli_num_rows($sql);
                        if($row>0){
                            echo "<script>alert('like already exists');</script>";
                        }
                        else{
                            $group_result = mysqli_query($con,"select * from groups where group_name='$group'");
                            $group_row = mysqli_num_rows($group_result);
                                if($group_row>0){
                                    $msg=mysqli_query($con,"insert into likes_groups(customer_id,group_name) values('$customer_id','$group')");
                                        if($msg){
                                            echo "<script>alert('Registered successfully');</script>";
                                        }
                                }
                                else{
                                    echo "<script>alert('group doesn\'t exist');</script>";
                                }
                        }
            }
            else{
                    echo "<script>alert('either customer doesn't exists');</script>";
            }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Like Group</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php  include 'top_nav.php'  ?>
    <form name="like_group" method="post" onsubmit="return true">
            <div class="form-control">
                <label for="like_group_customer" id="label-customer">
                    Customer :
                </label>

                <input type="text" name="customer_name" placeholder="Enter customer name" required>
            </div>

            <div class="form-control">
                <label for="like_group_group" id="label-group">
                    Group :
                </label>

                <input type="text" name="group_name" placeholder="Enter group name" required>
            </div>
        <button type="submit" name="submit">Add</button>
    </form>
</body>
</html>