<?php
require('../config/config.php');


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $delete = "DELETE FROM facts WHERE id = $id";
    $get_delete = mysqli_query($conn,$delete);
    echo "<meta http-equiv=\"refresh\"content=\"0;URL = index.php\">";




}




?>