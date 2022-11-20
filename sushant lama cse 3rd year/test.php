<?php
$username ="root";
$password ="";
$SERVER='localhost';
$database='art_gallary';
$con = mysqli_connect($SERVER,$username,$password,$database);

$db = mysqli_select_db($con,$database);
    
if($con){
    // echo "randi connection sucess";
    ?>

    <script>
        alert('randi connection sucess');
    </script>

    <?php
}
else{
    echo "failed randi";
    die("no cunnection". mysqli_connect_error());
}
    // echo"hello sushant";
    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     // collect value of input field
    //     $name = $_POST['name'];
    //     if (empty($name)) {
    //         echo "Name is empty";
    //     } else {
    //         echo $name;
    //     }
    // }
?>