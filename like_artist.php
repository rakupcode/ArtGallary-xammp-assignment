<?php 
    session_start();
    require_once("config.php");

    if(isset($_POST['submit'])){
        $customer_name = $_POST['customer_name'];
        $artist_name = $_POST['artist_name'];

        $customer_result = mysqli_query($con,"select customer_id from customer where customer_name='$customer_name'");
        $customer_row = mysqli_num_rows($customer_result);
        if($customer_row>0){
            $customer = $customer_result->fetch_assoc();
            $customer_id = $customer["customer_id"];
                $artist_result = mysqli_query($con,"select * from artist where artist_name='$artist_name'");
                $artist_row = mysqli_num_rows($artist_result);

                if($artist_row>0){
                    $artist = $artist_result->fetch_assoc();
                    $artist_id = $artist["artist_id"];

                    $sql = mysqli_query($con,"select * from likes_artists where customer_id='$customer_id' and artist_id='$artist_id'");
                    $row = mysqli_num_rows($sql);

                    if($row>0){
                        echo "<script>alert('like already exists');</script>";
                    }
                    else{
                        $msg=mysqli_query($con,"insert into likes_artists(customer_id,artist_id) values('$customer_id','$artist_id')");
                        if($msg){
                            echo "<script>alert('Registered successfully');</script>";
                        }
                    }
                }
                else{
                    echo "<script>alert('artist doesn't exists');</script>";
                }
        }
        else{
            echo "<script>alert('customer doesn't exists');</script>";
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