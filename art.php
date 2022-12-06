<?php 
    session_start();
    require_once("config.php");

    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $artist_name = $_POST['artist_name'];
        $creation_date = $_POST['creation_date'];
        $type = $_POST['type'];
        $group = $_POST['group_name'];
        $bought_on = $_POST['bought_on'];
        $price = $_POST['price'];


        $sql = mysqli_query($con,"select * from artwork where title='$title'");
        $row = mysqli_num_rows($sql);

        if($row>0){
            echo "<script>alert('title already exists');</script>";
        }
        else{
            $artist_result = mysqli_query($con,"select * from artist where artist_name='$artist_name'");
            $artist_row = mysqli_num_rows($artist_result);
            if($artist_row>0){
                $group_result = mysqli_query($con,"select * from groups where group_name='$group'");
                $group_row =  mysqli_num_rows($group_result);
                if($group_row>0){
                    $msg=mysqli_query($con,"insert into artwork(title,artist_name,creation_date,type,group_name,price,bought_on) values('$title','$artist_name','$creation_date',$type,'$group','$price','$bought_on')");
                    if($msg){
                        echo "<script>alert('Registered successfully');</script>";
                    }
                }else{
                    echo "<script>alert('group doesn\'t exist');</script>";
                }
            }
            else{
                echo "<script>alert('arist doesn\'t exist');</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Art</title>
<link rel="stylesheet" href="style.css"/>
</head>
    <body>
    <?php  include 'top_nav.php'  ?>
        <form  method="post" name="art" onsubmit="return true">
            <div class="form-control">
                <label for="art_title" id="label-title">
                    Title :
                </label>

                <input type="text" name="title" placeholder="Enter art title" required>
            </div>

            <div class="form-control">
                <label for="art_artist" id="label-artist">
                    Artist :
                </label>

                <input type="text" name="artist_name" placeholder="Enter artist name" required>
            </div>

            <div class="form-control">
                <label for="art_creation_date" id="label-creation_date">
                    Creation Date:
                </label>

                <input type="date" name="creation_date" required>
            </div>

            <div class="form-control">
                <label for="art_type" id="label-type">
                    type:
                </label>

                <input type="text" name="type" placeholder="Enter art type"required>
            </div>

            <div class="form-control">
                <label for="art_group_name" id="label-group_name">
                    Add group:
                </label>

                <input type="text" name="group_name" placeholder="Enter group name" required>
            </div>

            <div class="form-control">
                <label for="art_price" id="label-price">
                    Price:
                </label>

                <input type="text" name="price" placeholder="Enter art price"required>
            </div>

            <div class="form-control">
                <label for="art_bought_on" id="label-bought_on">
                    Bought on:
                </label>

                <input type="date" name="bought_on" required>
            </div>

            <button type="submit" name="submit">Add art</button>
        </form>
    </body>
</html>