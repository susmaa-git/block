<?php require('../config/config.php');?>
<?php


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $delete = "DELETE FROM testimonials WHERE id = $id";
    $get_delete = mysqli_query($conn, $delete);
    echo "<meta http-equiv=\"refresh\"content=\"0;URL = index.php\">";
}




?>