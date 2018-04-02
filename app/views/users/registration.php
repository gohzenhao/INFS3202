<?php require APPROOT . '/views/includes/header.php'; ?>

  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <h2>Register An Account</h2>
        <form action="<?php echo URLROOT; ?>/users/registration" method="POST">
          <!-- Full name field -->
          <div class="form-group">
            <label class="control-label col-lg-4">Name</label>
            <div class="col-lg-10">
              <div class="input-group">
                <span class="signup_icon"> <i class="fas fa-user"></i></span>
                <input type="text" class="form-control <?php echo (!empty($data['name_error'])) ? 'is-invalid' : ''; ?>" name="name" id="name" placeholder="Enter your name" value="<?php echo $data['name']?>"/>
                <span class="invalid-feedback"><?php echo $data['name_error'] ?></span>
              </div>

            </div>
          </div>

          <!-- Email field -->
          <div class="form-group">
            <label class="control-label col-lg-4">Email</label>
            <div class="col-lg-10">
              <div class="input-group">
                <span class="signup_icon"><i class="fas fa-envelope"></i></span>
                <input type="email" class="form-control <?php echo (!empty($data['email_error'])) ? 'is-invalid' : ''; ?>" name="email" id="email" placeholder="Enter your email" value="<?php echo $data['email']?>"/>
                <span class="invalid-feedback"><?php echo $data['email_error'] ?></span>
              </div>
            </div>
          </div>


          <!-- Username field -->
          <div class="form-group">
            <label class="control-label col-lg-4">Username</label>
              <div class="col-lg-10">
                <div class="input-group">
                  <span class="signup_icon"><i class="fas fa-users"></i></span>
                  <input type="text" class="form-control <?php echo (!empty($data['username_error'])) ? 'is-invalid' : ''; ?>" name="username" id="username" placeholder="Enter your username" value="<?php echo $data['username']?>"/>
                  <span class="invalid-feedback"><?php echo $data['username_error'] ?></span>
                </div>
              </div>
          </div>

          <!-- Password field -->
          <div class="form-group">
            <label class="control-label col-lg-4">Password</label>
            <div class="col-lg-10">
              <div class="input-group">
                <span class="signup_icon"><i class="fas fa-lock"></i></span>
                <input type="password" class="form-control <?php echo (!empty($data['password_error'])) ? 'is-invalid' : ''; ?>" name="password" id="password" placeholder="Enter your password" value="<?php echo $data['password']?>"/>
                <span class="invalid-feedback"><?php echo $data['password_error']?></span>
              </div>
            </div>
          </div>

          <!-- Confirm Password field -->
          <div class="form-group">
            <label class="control-label col-lg-8">Confirm Password</label>
            <div class="col-lg-10">
              <div class="input-group">
                <span class="signup_icon"><i class="fas fa-lock"></i></span>
                <input type="password" class="form-control <?php echo (!empty($data['confirm_password_error'])) ? 'is-invalid' : ''; ?>" name="confirm_password" id="confirm_password" placeholder="Enter your password again" value="<?php echo $data['confirm_password']?>"/>
                <span class="invalid-feedback"><?php echo $data['confirm_password_error']?></span>
              </div>
            </div>
          </div>

          <!-- <div class="form-group">
            <label for="confirm_password">Confirm Password: <sup>*</sup></label>
            <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
            <span class="invalid-feedback"><?php echo $data['confirm_password_error'] ?></span>
          </div> -->

          <div class="row">
            <div class="col">
              <input type="submit" value="Register" class="btn btn-success btn-block">
            </div>
            <div class="col">
              <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Have an account? Login</a>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>

<?php require APPROOT . '/views/includes/footer.php'; ?>
