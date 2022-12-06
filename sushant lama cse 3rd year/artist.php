<?php 
    session_start();
    require_once("config.php");

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $age = $_POST['age'];
        $birthplace = $_POST['birthPlace'];
        $style = $_POST['style'];


        $sql = mysqli_query($con,"select * from artist where artist_name='$name'");
        $row = mysqli_num_rows($sql);
        if($row>0){
            echo "<script>alert('artist already exists');</script>";
        }
        else{
            $msg=mysqli_query($con,"insert into artist(artist_name,birthplace,age,style) values('$name','$birthplace','$age','$style')");
            if($msg){
                echo "<script>alert('Registered successfully');</script>";
            }
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Artist</title>
<link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php  include 'top_nav.php'  ?>
    <form  method="post" name="artist" onsubmit="return true">

            <div class="form-control">
                <label for="artist_name" id="label-name">
                    Name :
                </label>
                
                <input type="text" name="name" placeholder="Enter artist name" required>
            </div>

            <div class="form-control">
                <label for="artist_age" id="label-age">
                    Age :
                </label>
                
                <input type="text" name="age" placeholder="Enter artist age" required>
            </div>

            <div class="form-control">
                <label for="artist_birthplace" id="label-birthplace">
                    BirthPlace :
                </label>
                
                <input type="text" name="birthPlace" placeholder="Enter artist birthplace"required>
            </div>

            <div class="form-control">
                <label for="artist_style" id="label-style">
                    Style :
                </label>
                
                <input type="text" name="style" placeholder="Enter artist style"required>
            </div>

            <button type="submit" name="submit">Add Artist</button> 
    </form>
</body>
</html>