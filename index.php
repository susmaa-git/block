

  <?php require('includes/header.php'); ?>
  <?php require('includes/navbar.php'); ?>
  <?php
  $home = "SELECT * FROM users";
  $get_home = mysqli_query($conn,$home);
  $home1 = mysqli_fetch_assoc($get_home);
  ?>
 
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container d-flex flex-column align-items-center" data-aos="zoom-in" data-aos-delay="100">
      <h1><?php echo @$home1['name']?></h1>
      <h2>I'm a professional illustrator from San Francisco</h2>
      <a href="about.html" class="btn-about">About Me</a>
    </div>
  </section><!-- End Hero -->

  <?php require('includes/footer.php'); ?>

 