<?php require('../includes/header.php'); ?>
<?php require('../includes/navbar.php'); ?>
<?php require('../includes/sidebar.php'); ?>


<section class="py-5">
    <div class="container w-50 ">
        <h4>Add FACT</h4>

        <?php

        if (isset($_POST['add_fact'])) {
            $number = $_POST['number'];
            $title = $_POST['title'];
            
            if ($number != "" && $title	!= "") {

                $select = "SELECT * FROM facts WHERE title='$title'";
                $result = mysqli_query($conn, $select);
                if ($result->num_rows > 0) {
        ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Name is already exit</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    // header('Refresh:2; URL=create.php');
                    echo "<meta http-equiv=\"refresh\" content=\"2;URL=create.php\">";
                } else {
                    $insert = "INSERT INTO facts (number, title) VALUES ('$number', '$title')";
                    $result = mysqli_query($conn, $insert);
                    if ($result) {
                    ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Fact is added</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                    } else {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Fact is not</strong>
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
                <label for="exampleInputNumber" class="form-label">Number</label>
                <input type="number" class="form-control" name="number" id="exampleInputNumber" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputTitle" class="form-label">Title</label>
                <input type = "text" class="form-control" name="title" id="exampleInputTitle" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary" name="add_fact">Submit</button>
            <div class="mb-3 form-check">
                <span>I have already an account <a href="index.php">Login Now</a></span>
            </div>
        </form>
    </div>
</section>

<?php require('../includes/footer.php'); ?>