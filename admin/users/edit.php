<?php require('../includes/header.php'); ?>
<?php require('../includes/navbar.php'); ?>
<?php require('../includes/sidebar.php'); ?>


<section class="py-5">
    <div class="container w-50 ">
        <h4>Add User</h4>

        <?php

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $select = "SELECT * FROM users WHERE id = $id";
            $result = mysqli_query($conn,$select);
            $data = mysqli_fetch_assoc($result);
        }






        if (isset($_POST['edit'])) {
            $name = $_POST['name'];
            $username = $_POST['username'];
            $phone = $_POST['Phone'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($name != "" && $username!= "" && $phone != "" && $email != "" && $password != "") {

                $select = "UPDATE users SET name = '$name', username = '$username', Phone = '$phone', email = '$email',password = '$password' WHERE id = $id";
                $result = mysqli_query($conn, $select);
                if($result){
                    ?>
                    
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>User is updated</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                    } else {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>User is not updated</strong>
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
                <label for="exampleInputName" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="exampleInputName" value="<?php echo $data['name']; ?>"          aria-describedby="emailHelp">
                <input type="text" class="form-control" name="name" id="exampleInputName" value="<?php echo $data['name']; ?>" aria-describedby="emailHelp">

            </div>
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="exampleInputName"  value="<?php echo $data['username']; ?>"      aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPhone" class="form-label">Phone</label>
                <input type="tel" class="form-control" name="Phone" id="exampleInputPhone"  value="<?php echo $data['Phone']; ?>"     aria-describedby="phoneHelp">

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1"     value="<?php echo $data['email']; ?>"  aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password"  value="<?php echo $data['password']; ?>"    id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary" name="edit">Submit</button>
            <div class="mb-3 form-check">
                <span>I have already an account <a href="index.php">Login Now</a></span>
            </div>
        </form>
    </div>
</section>

<?php require('../includes/footer.php'); ?>