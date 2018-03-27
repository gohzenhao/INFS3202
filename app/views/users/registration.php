<?php require APPROOT . '/views/includes/header.php'; ?>

  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <h2>Register An Account</h2>
        <form action="<?php echo URLROOT; ?>/users/registration" method="POST">
          <!-- Full name field -->
          <div class="form-group">
            <label for="name">Full Name: <sup>*</sup></label>
            <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
            <span class="invalid-feed"><?php echo $data['name_error'] ?></span>
          </div>
          <!-- Email field -->
          <div class="form-group">
            <label for="email">Email: <sup>*</sup></label>
            <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
            <span class="invalid-feed"><?php echo $data['email_error'] ?></span>
          </div>
          <!-- Username field -->
          <div class="form-group">
            <label for="username">Username: <sup>*</sup></label>
            <input type="text" name="username" class="form-control form-control-lg <?php echo (!empty($data['username_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['username']; ?>">
            <span class="invalid-feed"><?php echo $data['username_error'] ?></span>
          </div>
          <!-- Password field -->
          <div class="form-group">
            <label for="password">Password: <sup>*</sup></label>
            <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
            <span class="invalid-feed"><?php echo $data['password_error'] ?></span>
          </div>
          <!-- Confirm Password field -->
          <div class="form-group">
            <label for="confirm_password">Confirm Password: <sup>*</sup></label>
            <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
            <span class="invalid-feed"><?php echo $data['confirm_password_error'] ?></span>
          </div>

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