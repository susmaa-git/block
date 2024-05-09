<?php require('../includes/header.php'); ?>
<?php require('../includes/navbar.php'); ?>
<?php require('../includes/sidebar.php'); ?>


<section class="py-5">
    <div class="container w-50 ">
        <h4>EDIT SKILL</h4>

        <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $select = "SELECT * FROM skills WHERE id = $id";
            $result = mysqli_query($conn,$select);
            $data = mysqli_fetch_assoc($result);
        }

        if (isset($_POST['edit_file'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            
            if ($title != "" && $description != "") {

                $update = "UPDATE skills SET title = '$title', description = '$description' WHERE id = $id";
                $result = mysqli_query($conn, $update);
                if ($result) {
        ?>
                    
                  
                    ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Skill is updated</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                    } else {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Skill is not updated</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                <?php
                       echo "<meta http-equiv=\"refresh\" content=\"2;URL=create.php\">";
                    }
                }
            } else {
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>All fields are required</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        <?php
            }
        

        ?>
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputTitle" class="form-label">Title</label>
                <input type="text" class="form-control" value = "<?php echo  $data['title'];?>"      name="title" id="exampleInputTitle" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputDescription" class="form-label">Description</label>
                <input type = "text" class="form-control" name="description"  value = "<?php echo  $data['description'];?>"         id="exampleInputDescription" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary" name="edit_file">Submit</button>
            <div class="mb-3 form-check">
                <span>I have already an account <a href="index.php">Login Now</a></span>
            </div>
        </form>
    </div>
</section>

<?php require('../includes/footer.php'); ?>