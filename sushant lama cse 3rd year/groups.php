<?php 
    session_start();
    require_once("config.php");

    if(isset($_POST['submit'])){
        $group = $_POST['group_name'];

        $sql = mysqli_query($con,"select * from groups where group_name='$group'");
        $row = mysqli_num_rows($sql);

        if($row>0){
            echo "<script>alert('group already exists');</script>";
        }
        else{
                $msg=mysqli_query($con,"insert into groups(group_name) values('$group')");
                if($msg){
                        echo "<script>alert('Group added successfully');</script>";
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
    <title>Groups</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php  include 'top_nav.php'  ?>
    <form name="groups" method="post" onsubmit="return true">
        <div class="form-control">
            <label for="groups_name" id="label-name" >
                Group Name:
            </label>

            <input type="text" name="group_name" placeholder="Enter group name" required>
        </div>
        <button type="submit" name="submit">add group</button>
    </form>
</body>
</html>