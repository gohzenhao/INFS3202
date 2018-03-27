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
    <link href="vendor/bootstrap/css/custom.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- font awesome icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" />
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
        <?php
        session_start();
        if(isset($_SESSION['user_id'])){

          // echo '<span>Welcome '. $_SESSION['user_name'] . '!</span>';

          echo '<div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <span class="text-white mx-auto pr-5">Welcome '. $_SESSION['user_name'] . ' </span>
              </li>
              <li class="nav-item">
                <form action="includes/logout.php" method="POST">
                  <button type="submit" name="submit">LOG OUT</button>
                </form>
              </li>
            </ul>
          </div>';

        }else{
          echo '<div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="" data-toggle="dropdown"> SIGN IN </a>


                  <div class="dropdown-menu">
                    <form class="px-4 py-3" action="includes/login.php" method="POST"> <!-- p = padding, x = Left and right -->
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="loginUsername"id="loginUsername" placeholder="Username">
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control"  name="loginPassword"id="loginPassword" placeholder="Password">
                      </div>
                      <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
                    </form>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Forgot password?</a>
                  </div>

              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#signupModal">JOIN</a>
              </li>
            </ul>
          </div>';
        }

         ?>

      </div>
    </nav>

      <!-- Modal element for Sign up form -->
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
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
            <button type="submit" class="btn btn-primary" name="submit">Register</button>
          </div>
          </form>
        </div>
      </div>
    </div>
