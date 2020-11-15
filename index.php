  <?php
  //include login page controller.
  include_once('controllers/login_controller.php');
  ?>
  <?php include_once('partials/header.php'); ?>

    <section class="p-4 pt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto">

            <h5 class="h5 mb-3 font-weight-normal">Please sign in</h5>
            <div class="mb-4">
  						<?php
  						include("partials/alerts/success.php");
  						include("partials/alerts/errors.php");
  						?>
  					</div>
            <form action="" method="post" class="">



              <div class="form-group">
                <label for="inputEmail" >Email address</label>
                <input name="email" type="email" id="inputEmail" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="inputPassword" >Password</label>
                <input name="password" type="password" id="inputPassword" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="inputRole" >Login As</label>
                <select name="user_type" id="inputRole" class="custom-select" required>
                  <option value=""></option>
                <option value="administrator">Administrator</option>
                <option value="researcher">Researcher</option>
                <option value="reviewer">Reviewer</option>
                <option value="editor">Editor</option>
                </select>
            </div>

              <!-- <div class="form-group form-check">
                <label>
                  <input type="checkbox" class="form-check-input" value="remember-me"> Remember me
                </label>
              </div> -->

              <button class="btn btn-primary btn-block" type="submit">Sign in</button>

            </form>

            <p class="p-4 pt-5 text-center text-muted">&copy; 2020, All Rights Reserved. Group 16.</p>
          </div>
        </div>
      </div>
    </section>

    <?php include_once('partials/footer.php'); ?>
