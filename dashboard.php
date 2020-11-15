<?php
//include login page controller.
include_once('controllers/dashboard_controller.php');
?>
<?php include_once('partials/header.php'); ?>

  <section class="p-4 pt-5 pb-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mx-auto">

          <h5 class="h5 mb-3 font-weight-normal"><?php echo($user['role']);?> Dashboard</h5>
          <div class="mb-4">
            <?php
            include("partials/alerts/success.php");
            include("partials/alerts/errors.php");
            ?>
          </div>
          <?php
          //include the dashboard for this role
          include("partials/dashboards/{$user['role']}.php");
          ?>
        </div>
      </div>
    </div>
  </section>

  <?php
   include_once('partials/footer.php');
  ?>
