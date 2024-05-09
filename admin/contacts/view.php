<?php require('../includes/header.php'); ?>
<?php require('../includes/navbar.php'); ?>
<?php require('../includes/sidebar.php'); ?>


<section class="py-5">
    <div class="container w-50 py-5">
        <h4>Add Contact</h4>

        <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $select = "SELECT * FROM contacts WHERE id = $id";
            $get_select = mysqli_query($conn,$select);
            $data = mysqli_fetch_assoc($get_select);

        }
        ?>
        <form action="#" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
                <label for="exampleInputname" class="form-label">name</label>
                <input type="text" class="form-control" name="name"  value = "<?php echo $data['name']?>"     id="exampleInputIcon" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputsubject" class="form-label">subject</label>
                <input type="text" class="form-control" name="subject"  value = "<?php echo $data['subject']?>"      id="exampleInputIcon" aria-describedby="emailHelp">
            </div>s
            <div class="mb-3">
                <label for="exampleInputemail" class="form-label">email</label>
                <input type="email" class="form-control" name="email"   value = "<?php echo $data['email']?>"     id="exampleInputIcon" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputmessage" class="form-label">message</label>
                <input type="text" class="form-control" name="message"   value = "<?php echo $data['message']?>"     id="exampleInputIcon" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary" name="edit">Submit</button>
            <div class="mb-3 form-check">
                <span>I have already an account <a href="index.php">Login Now</a></span>
            </div>

            
        </form>
    </div>
</section>

<?php require('../includes/footer.php'); ?>