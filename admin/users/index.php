<?php require('../includes/header.php');?>
<?php require('../includes/navbar.php');?>
<?php require('../includes/sidebar.php');?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Manage users</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Manage users</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Manage users</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th class="col">#</th>
                    <th class="col">Name</th>
                    <th class="col">Username</th>
                    <th class="col">Phone</th>
                    <th class="col">Email</th>
                    <th class="col">Action</th>
                </thead>
                <tbody>
                  <?php
                  $select = "SELECT * FROM users";
                  $get_select = mysqli_query($conn,$select);
                  $i = 1;
                while ($data = mysqli_fetch_array($get_select)){                    ?>
                    <tr>
                      <th scope="row"><?php echo $i++; ?></th>
                      <td><?php echo $data['name'];?></td>
                      <td><?php echo $data['username'];?></td>
                      <td><?php echo $data['Phone'];?></td>
                      <td><?php echo $data['email'];?></td>
                      <td>
                        <a href="edit.php?id=<?php echo $data['id'];?>" class="btn btn-sm btn-primary" role = "button">EDIT</a>
                        <a href="view.php?id=<?php echo $data['id'];?>" class="btn btn-sm btn-primary" role = "button">VIEW</a>
                        <a href="delete.php?id=<?php echo $data['id']; ?>"  class="btn btn-sm btn-danger" role = "button" onclick="return confirm('Do you want to delete?')">DELETE</a>

                      </td>
                    </tr>


                    <?php
                  }
                  ?>

                
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