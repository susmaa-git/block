<?php require('../includes/header.php'); ?>
<?php require('../includes/navbar.php'); ?>
<?php require('../includes/sidebar.php'); ?>


<section class="py-5">
    <div class="container w-50 ">
        <h4>EDIT SKILL</h4>

        <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $select = "SELECT * FROM categories WHERE id = $id";
            $result = mysqli_query($conn,$select);
            $data = mysqli_fetch_assoc($result);
        }

        

        ?>
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputTitle" class="form-label">Title</label>
                <input type="text" class="form-control" value = "<?php echo  $data['title'];?>"      name="title" id="exampleInputTitle" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputdesc" class="form-label">desc</label>
                <input type = "text" class="form-control" name="desc"  value = "<?php echo  $data['desc'];?>"         id="exampleInputdesc" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary" name="edit_file">Submit</button>
            <div class="mb-3 form-check">
                <span>I have already an account <a href="index.php">Login Now</a></span>
            </div>
        </form>
    </div>
</section>

<?php require('../includes/footer.php'); ?>