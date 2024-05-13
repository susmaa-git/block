<?php require('../includes/header.php'); ?>
<?php require('../includes/navbar.php'); ?>
<?php require('../includes/sidebar.php'); ?>


<section class="py-5">
    <div class="container w-50 py-5">
        <h4>Edit abouts</h4>

        <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $select  = "SELECT * FROM abouts WHERE id = $id";
            $result = mysqli_query($conn, $select);
            $data = mysqli_fetch_assoc($result);
        }

        
 ?>
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="top-title" class="form-label">Top title</label>
                <input type="text" class="form-control" name="top_title" id="top-title" value = "<?php echo $data['top_title'];?>" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="top-description" class="form-label">Top description</label>
                <input type="text" class="form-control" name="top_desc" id="top-description"  value = "<?php echo $data['top_desc'];?>"     aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputTitle" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="exampleInputTitle"    value = "<?php echo $data['title'];?>"  aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputDescription" class="form-label">Description</label>
                <input type="text" class="form-control" name="description" id="exampleInputDescription"    value = "<?php echo $data['description'];?>"  aria-describedby="emailHelp">
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog        ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">

                                    <style>
                                        [type=radio]:checked+img {
                                            outline: 2px solid #f00;
                                        }
                                    </style>

                                    <?php
                                    $select_query = "SELECT * FROM files";
                                    $select_result = mysqli_query($conn, $select_query);
                                   
                                    while ($data_select = mysqli_fetch_array($select_result)) {
                                    ?>
                                        <div class="col-md-4 p-2">
                                            <label>
                                                <input type="radio" name="filename1" value="<?php echo $data_select['img_link']; ?>" style="opacity: 0;" />
                                                <img src="<?php echo "../uploads/" . $data_select['img_link']; ?>" alt="" height="100px;" width="100px;" style="margin-right:20px;">
                                            </label>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" onclick="firstFunction()" class="btn btn-primary"  data-bs-dismiss="modal">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="form-group col-12 mb-0">
            </div>

            <div class="input-group mb-3 col-12">
                <input id="sliderbox" type="text" class="form-control" name="img" readonly>
                <div class="input-group-append">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Choose button
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
        var selectedOption1 = document.querySelector('input[name=filename1]:checked').value;
        //var selectedOption = $("input:radio[name=filename]:checked").val()
        document.getElementById('sliderbox').value = selectedOption1; // use .innerHTML if we want data on label
    }
</script>