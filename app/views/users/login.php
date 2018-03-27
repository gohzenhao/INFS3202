<?php require APPROOT . '/views/includes/header.php'; ?>

  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <h2>Login</h2>
        <form action="<?php echo URLROOT; ?>/users/login" method="POST">
          <!-- Username/Email field -->
          <div class="form-group">
            <label for="username_email">Username/Email: <sup>*</sup></label>
            <input type="email" name="username_email" class="form-control form-control-lg <?php echo (!empty($data['username_email_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['username_email']; ?>">
            <span class="invalid-feed"><?php echo $data['username_email_error'] ?></span>
          </div>
          <!-- Password field -->
          <div class="form-group">
            <label for="password">Password: <sup>*</sup></label>
            <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
            <span class="invalid-feed"><?php echo $data['password_error'] ?></span>
          </div>

          <div class="row">
            <div class="col">
              <input type="submit" value="Login" class="btn btn-success btn-block">
            </div>
            <div class="col">
              <a href="<?php echo URLROOT; ?>/users/registration" class="btn btn-light btn-block">No account? Register</a>
            </div>
          </div>
          
        </form>
      </div>
    </div>
  </div>

<?php require APPROOT . '/views/includes/footer.php'; ?>