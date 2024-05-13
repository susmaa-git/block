<?php require('../includes/header.php'); ?>
<?php require('../includes/navbar.php'); ?>
<?php require('../includes/sidebar.php'); ?>


<section class="py-5">
    <div class="container w-50 py-5">
        <h4>Add Testimonials</h4>

        <?php

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $select = "SELECT * FROM porfifolios WHERE id = $id";
            $get_select = mysqli_query($conn, $select);
            $daata = mysqli_fetch_assoc($get_select);
        }

        if (isset($_POST['add_file'])) {
            $img = $_POST['img'];
            $category_id = $_POST['category_id'];
            $client = $_POST['client'];
            $proj_name = $_POST['proj_name'];
            $proj_url = $_POST['proj_url'];
            $description = $_POST['description'];

            if ( $img != "" && $category_id != "" && $client != "" && $proj_name != "" && $proj_url != "" && $description != "") {
                $insert = "INSERT INTO porfifolios (img,category_id,client,proj_name,proj_url, description) VALUES ( '$img',$category_id,'$client','$proj_name','$proj_url','$description')";
                $result = mysqli_query($conn, $insert);
                if ($result) {
        ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Image is added</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php\">";
                } else {
                ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Image is not</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    echo "<meta http-equiv=\"refresh\" content=\"2;URL=create.php\">";
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
                <label for="category_id" class="form-label">category_id</label>
                <input type="number" class="form-control" name="category_id" value = "<?php echo $daata['category_id'];?>" id="category_id" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="client" class="form-label">Client</label>
                <input type="text" class="form-control" name="client" id="client"  value = "<?php echo $daata['client'];?>"  aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="proj_name" class="form-label">proj_name</label>
                <input type="text" class="form-control" name="proj_name" id="proj_name"     value = "<?php echo $daata['proj_name'];?>"  aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="proj_url" class="form-label">proj_url</label>
                <input type="text" class="form-control" name="proj_url" id="proj_url" value = "<?php echo $daata['proj_url'];?>"       aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <input type="text" class="form-control" name="description" id="description"    value = "<?php echo $daata['description'];?>"  aria-describedby="emailHelp">
            </div>
              
              
            
            <!-- Button trigger modal -->


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog        ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">

                                <style>
                                    [type=radio]:checked+img {
                                        outline: 2px solid #f00;
                                    }
                                </style>
                                <?php
                                $select = "SELECT * FROM files";
                                $get_select = mysqli_query($conn, $select);
                                while ($data = mysqli_fetch_assoc($get_select)) {
                                ?>

                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                        <label>
                                        <input type="radio" name="filename1" value="<?php echo $data['img_link']; ?>" style="opacity: 0;" />
                                        <img src="../uploads/<?php echo $data['img_link']; ?>" alt="" height="100px" width="100px">
                                        </label>
                                    </div>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button"   onclick="firstFunction()"  data-bs-dismiss="modal"     class="btn btn-primary">Save changes</button>

                        </div>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3 col-12">
                <input type="text" class="form-control" name="img" id="selectedimg"  readonly aria-describedby="helpId" placeholder="" />
                <div class="input-group-append">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Choose image
                    </button>
                </div>
            </div>






            <button type="submit" class="btn btn-primary" name="add_file">Submit</button>

        </form>
    </div>
</section>


<?php require('../includes/footer.php'); ?>


<!-- Button trigger modal -->




<script>
    function firstFunction() {
        var imgselection = document.querySelector('input[name=filename1]:checked').value;
        //var selectedOption = $("input:radio[name=filename]:checked").val()
        document.getElementById('selectedimg').value = imgselection; // use .innerHTML if we want data on label
    }
</script>