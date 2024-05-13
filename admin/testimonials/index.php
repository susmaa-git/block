<?php require('../includes/header.php');?>
<?php require('../includes/navbar.php');?>
<?php require('../includes/sidebar.php');?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Manage testimonials</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Testimonials</li>
          <li class="breadcrumb-item active">Manage testimonials</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Manage testimonials</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th class="col">#</th>
                    <th class="col">img</th>
                    <th class="col">name</th>
                    <th class="col">position</th>>
                    <th class="col">message</th>>
                </thead>
                <tbody>
                  <?php
                  $select = "SELECT * FROM testimonials";
                  $get_select = mysqli_query($conn,$select);
                  $i = 1;
              while ($data = mysqli_fetch_array($get_select)){                    ?>
                    <tr>
                      <th scope="row"><?php echo $i++; ?></th>
                      <td><?php echo $data['img'];?></td>
                      <td><?php echo $data['name'];?></td>
                      <td><?php echo $data['position'];?></td>
                      <td><?php echo $data['message'];?></td>
                      <td>
                        <a href="edit.php?id=<?php echo $data['id'];?>" class="btn btn-sm btn-primary" role = "button">EDIT</a>
                        <a href="view.php?id=<?php echo $data['id'];?>" class="btn btn-sm btn-primary" role = "button">VIEW</a>
                        <a href="delete.php?id=<?php echo $data['id']; ?>"  class="btn btn-sm btn-danger" role = "button" onclick="return confirm('Do you want to delete?')">DELETE</a>

                      </td>
                      <?php
                  }
                  ?>
                    </tr>


                    

                
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

 <?php require('../includes/footer.php');?>