<?php 
    session_start();
    require_once("config.php");

    if(isset($_POST['submit'])){
        $customer = $_POST['customer_name'];
        $artist = $_POST['artist_name'];

        $sql = mysqli_query($con,"select * from likes_artist where customer_name='$customer' and artist_name='$artist'");
        $row = mysqli_num_rows($sql);
        if($row>0){
            echo "<script>alert('either aritst or customer already exists');</script>";
        }
        else{
            $customer_result = mysqli_query($con,"select * from customer where customer_name='$customer'");
            $customer_row = mysqli_num_rows($customer_result);
            if($customer_row>0){
                $artist_result = mysqli_query($con,"select * from artist where artist_name='$artist'");
                $artist_row = mysqli_num_rows($artist_result);
                if($artist_row>0){
                    $msg=mysqli_query($con,"insert into likes_artist(customer_name,artist_name) values('$customer','$artist')");
                    if($msg){
                        echo "<script>alert('Registered successfully');</script>";
                    }
                }
                else{
                    echo "<script>alert('artist doesn\'t exist');</script>";
                }
            }
            else{
                echo "<script>alert('customer doesn\'t exist');</script>";
            }
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Like Artist</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php  include 'top_nav.php'  ?>
    <form name="like_artist" method="post" onsubmit="return true">
        <div class="form-control">
            <label for="likeartist_customer_name" id="label-cname" >
                Customer Name:
            </label>

            <input type="text" name="customer_name" placeholder="Enter customer name" required>
        </div>
        <div class="form-control">
            <label for="likeartist_artist_name" id="label-aname" >
                Artist Name:
            </label>

            <input type="text" name="artist_name" placeholder="Enter artist name" required>
        </div>

        <button type="submit" name="submit">Add</button>
    </form>
</body>
</html>