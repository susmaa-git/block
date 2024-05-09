<?php require('../includes/header.php'); ?>
<?php require('../includes/navbar.php'); ?>
<?php require('../includes/sidebar.php'); ?>


<section class="py-5">
    <div class="container w-50 ">
        <h4>Add User</h4>

        <?php

        if (isset($_POST['register'])) {
            $name = $_POST['name'];
            $username = $_POST['username'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($name != "" && $username!= "" && $phone != "" && $email != "" && $password != "") {

                $select = "SELECT * FROM users WHERE email='$email'";
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
                    $insert = "INSERT INTO users (name, username,phone, email, password) VALUES ('$name', '$username','$phone', '$email', '$password')";
                    $result = mysqli_query($conn, $insert);
                    if ($result) {
                    ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>User is created</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                    } else {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>User is not created</strong>
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
                <label for="exampleInputName" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="exampleInputName" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="exampleInputName" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPhone" class="form-label">Phone</label>
                <input type="tel" class="form-control" name="phone" id="exampleInputPhone" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary" name="register">Submit</button>
            <div class="mb-3 form-check">
                <span>I have already an account <a href="index.php">Login Now</a></span>
            </div>
        </form>
    </div>
</section>

<?php require('../includes/footer.php'); ?>