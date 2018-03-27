<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-2">
  <div class="container">

    <!-- Logo/title button to return to home page -->
    <a class="navbar-brand" href="<?php echo URLROOT; ?>">TheRecipesProject</a>

    <!-- Hamburger button only becomes visible when screen size becomes smaller -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" 
          aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Hamburder collapsable menu -->
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="/" id="" data-toggle="dropdown">Sign In</a>
          <div class="dropdown-menu dropdown-menu-right" style="width: 400px;">
            <form class="px-4 py-3"> <!-- p = padding, x = Left and right -->
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

  </div>
</nav>