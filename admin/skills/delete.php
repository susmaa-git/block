<?php
require('../config/config.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $select = "DELETE FROM users WHERE id = $id";
    $get_select = mysqli_query($conn,$select);
    echo  "<meta http-equiv=\"refresh\"content=\"0;URL=index.php\">";



}




?>