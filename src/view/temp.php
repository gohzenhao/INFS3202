<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TheRecipesProject</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- My Own stylesheet -->
    <link href="vendor/bootstrap/css/header.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
      body {
        padding-top: 54px;
      }
      @media (min-width: 992px) {
        body {
          padding-top: 56px;
        }
      }

    </style>

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.html">TheRecipesProject</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="" data-toggle="dropdown"> SIGN IN </a>
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
                <a class="dropdown-item" href="#">Forgot password?</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#signupModal">JOIN</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="SignupFormModal">
      
    <?php 
      include './src/view/signup_form.php';
    ?>

      <div class="row">
        <div class="col-lg-12">
          <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="collapse navbar-collapse">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link text-dark" href="#"> Recipes </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-dark" href="#">Quick & Easy</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-dark" href="#">Healthy</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-dark" href="#">Baking</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-dark" href="#">Entertaining</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-dark" href="#">Menus</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-dark" href="#">Fresh</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>

    </div>

    <!-- Page Content -->

    <header class="masthead">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h1 class="display-3 text-white">Search all of our 50,000 recipes</h1>
            <p class="lead text-white">Perfection starts from home</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">
                  <div class="row">
                    <div class="col-lg-1">
                    </div>
                    <div class="col-lg-2">
                      <i class="material-icons">search</i>
                    </div>
                    <div class="col-lg-1">
                      Search
                    </div>
                    <div class="col-lg-1">
                    </div>
                  </div>
                </button>
              </span>
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 -->
        </div>
      </div>
    </header>



    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
