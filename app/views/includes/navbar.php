<nav class="navbar navbar-expand-lg mb-2">
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
          <li class="nav-item dropdown">
            <a class="navbar-text text-white nav-link dropdown-toggle" data-toggle="dropdown" href="#">Welcome <?php echo $_SESSION['user_name'] ?></a>
            <div class="dropdown-menu dropdown-menu">
              <a class="dropdown-item" href="<?php echo URLROOT; ?>/account/edit">Edit profile</a>
              <a class="dropdown-item">Manage recipes</a>
              <!-- <div class="dropdown-divider"></div>
              <a class="dropdown-item">Logout</a> -->
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
          </li>
        </ul>
      </div>

    <?php else : ?>
      <!-- Hamburder collapsable menu -->
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown">Sign In</a>
            <div class="dropdown-menu dropdown-menu-right" style="width: 400px;">
              <form class="px-4 py-3" action="<?php echo URLROOT; ?>/users/login" method="POST">
                <div class="form-group">
                  <label for="username_email">Email address</label>
                  <input type="text" name="username_email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Password">
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
  </div>
</nav>
