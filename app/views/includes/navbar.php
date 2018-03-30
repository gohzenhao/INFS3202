<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-2">
  <div class="container">

    <!-- Logo/title button to return to home page -->
    <a class="navbar-brand" href="<?php echo URLROOT; ?>/home">TheRecipesProject</a>

    <!-- Hamburger button only becomes visible when screen size becomes smaller -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" 
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <?php if(isset($_SESSION['user_id'])) : ?>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <span class="navbar-text text-white">Welcome <?php echo $_SESSION['user_name'] ?></span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
          </li>
        </ul>
      </div>

    <?php else : ?>
      <!-- TODO: login from dropdown menu -->
      <!-- Hamburder collapsable menu -->
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown">Sign In</a>
            <div class="dropdown-menu dropdown-menu-right" style="width: 400px;">
              <form class="px-4 py-3">
                <div class="form-group">
                  <label for="exampleDropdownFormEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <label for="exampleDropdownFormPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
              </form>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo URLROOT; ?>">Forgot password?</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/registration">Register</a>
          </li>
        </ul>
      </div>
    <?php endif; ?>


      <!-- Modal element for Sign up form -->
    <!--       
    <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="signupModalLabel">TheRecipeProject Registration</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="includes/signup.php" method="POST">

              <div class="form-group">
                <label class="control-label col-lg-4">Name</label>
                <div class="col-lg-10">
                  <div class="input-group">
                    <span class="signup_icon"> <i class="fas fa-user"></i></span>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name"/>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-4">Email</label>
                <div class="col-lg-10">
                  <div class="input-group">
                    <span class="signup_icon"><i class="fas fa-envelope"></i></span>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email"/>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-4">Username</label>
                <div class="col-lg-10">
                  <div class="input-group">
                    <span class="signup_icon"><i class="fas fa-users"></i></span>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username"/>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-4">Password</label>
                <div class="col-lg-10">
                  <div class="input-group">
                    <span class="signup_icon"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password"/>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-lg-8">Confirm Password</label>
                <div class="col-lg-10">
                  <div class="input-group">
                    <span class="signup_icon"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter your password again"/>
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer mx-auto">
            <button type="submit" class="btn btn-primary" name="submit">Register</button>
          </div>
          </form>
        </div>
      </div>
    </div> -->

  </div>
</nav>