<?php require('../includes/header.php'); ?>
<?php require('../includes/navbar.php'); ?>
<?php require('../includes/sidebar.php'); ?>


<section class="py-5">
    <div class="container w-50 py-5">
        <h4>Add Contact</h4>

        <?php

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $subject = $_POST['subject'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            
            if ($name != "" &&    $subject != "" && $email	!= "" && $message!= "") {

                $select = "SELECT * FROM contacts WHERE email='$email'";
                $result = mysqli_query($conn, $select);
                if ($result->num_rows > 0) {
        ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Email is already exit</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    // header('Refresh:2; URL=create.php');
                    echo "<meta http-equiv=\"refresh\" content=\"2;URL=create.php\">";
                } else {
                    $insert = "INSERT INTO contacts (name, subject ,email, message) VALUES('$name','$subject','$email','$message')";
                    $result = mysqli_query($conn, $insert);
                    if ($result) {
                    ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Contacts is added</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                    } else {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Contact is not added</strong>
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
        }

        ?>
        <form action="#" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
                <label for="exampleInputname" class="form-label">name</label>
                <input type="text" class="form-control" name="name"       id="exampleInputIcon" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputsubject" class="form-label">subject</label>
                <input type="text" class="form-control" name="subject"       id="exampleInputIcon" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputemail" class="form-label">email</label>
                <input type="email" class="form-control" name="email"       id="exampleInputIcon" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputmessage" class="form-label">message</label>
                <input type="text" class="form-control" name="message"       id="exampleInputIcon" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <div class="mb-3 form-check">
                <span>I have already an account <a href="index.php">Login Now</a></span>
            </div>

            
        </form>
    </div>
</section>

<?php require('../includes/footer.php'); ?>