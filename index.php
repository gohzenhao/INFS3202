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
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="" data-toggle="dropdown"> SIGN IN </a>
              <div class="dropdown-menu">
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
            ... TODO ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Register</button>
          </div>
        </div>
      </div>
    </div>

    <div class="container">

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

    <!-- Category thumbnails -->
    <div class="container">

      <div class="row mt-3" >
        <div class="col-lg-12 text-center">

          <h3> <u>Categories</u> </h3>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-lg-3">
          <a href="#">
            <div class="thumbnails">
              <img src="images/chicken.jpg" alt="chicken" style="width:100%;">
              <div class="overlay">
                <div class="text">
                  Chicken Recipes
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3">
          <a href="#">
            <div class="thumbnails">
              <img src="images/beef.jpg" alt="beef" style="width:100%;">
              <div class="overlay">
                <div class="text">
                  Beef Recipes
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3">
          <a href="#">
            <div class="thumbnails">
              <img src="images/seafood.jpg" alt="seafood" style="width:100%;">
              <div class="overlay">
                <div class="text">
                  Seafood Recipes
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3">
          <a href="#">
            <div class="thumbnails">
              <img src="images/lamb.jpg" alt="curry" style="width:100%;">
              <div class="overlay">
                <div class="text">
                  Lamb Recipes
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-lg-3">
          <a href="#">
            <div class="thumbnails">
              <img src="images/curry.jpeg" alt="curry" style="width:100%;">
              <div class="overlay">
                <div class="text">
                  Curry Recipes
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3">
          <a href="#">
            <div class="thumbnails">
              <img src="images/pasta.jpg" alt="pasta" style="width:100%;">
              <div class="overlay">
                <div class="text">
                  Pasta Recipes
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3">
          <a href="#">
            <div class="thumbnails">
              <img src="images/pizza.jpg" alt="pizza" style="width:100%;">
              <div class="overlay">
                <div class="text">
                  Pizza Recipes
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3">
          <a href="#">
            <div class="thumbnails">
              <img src="images/taco.jpg" alt="taco" style="width:100%;">
              <div class="overlay">
                <div class="text">
                  Taco Recipes
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <!-- featured custom recipes -->
    <div class="container">
      <div class="row mt-3">
        <div class="col-lg-12 text-center">
          <h3> <u> Featured custom recipes </u> </h3>
        </div>

        <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="card-deck w-95 mx-auto">
                <div class="card">
                  <img class="card-img-top" src="images/salmon_custom.jpg" alt="Card image cap">
                  <div class="card-body">

                      <h5 class="card-title ml-auto">Card title <span class="featured1">
                        <div class="stars-outer">
                          <div class="stars-inner">
                          </div>
                        </div>
                      </span></h5>


                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                  </div>

                <div class="card">
                  <img class="card-img-top" src="images/salmon_custom.jpg" alt="Card image cap">
                  <div class="card-body">
                      <h5>Card title
                        <span class="featured2">
                        <div class="stars-outer">
                          <div class="stars-inner">
                          </div>
                        </div>
                      </span>
                      </h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
                <div class="card">
                  <img class="card-img-top" src="images/salmon_custom.jpg" alt="Card image cap">
                  <div class="card-body">
                      <h5>Card title
                        <span class="featured3">
                          <div class="stars-outer">
                            <div class="stars-inner">
                            </div>
                          </div>
                        </span></h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="card-deck w-95 mx-auto">
                <div class="card">
                  <img class="card-img-top" src="images/salmon_custom.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">Card title
                      <span class="featured4">
                        <div class="stars-outer">
                          <div class="stars-inner">
                          </div>
                        </div>
                      </span>
                    </h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
                <div class="card">
                  <img class="card-img-top" src="images/salmon_custom.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">Card title
                      <span class="featured5">
                        <div class="stars-outer">
                          <div class="stars-inner">
                          </div>
                        </div>
                      </span>
                    </h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
                <div class="card">
                  <img class="card-img-top" src="images/salmon_custom.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">Card title
                      <span class="featured6">
                        <div class="stars-outer">
                          <div class="stars-inner">
                          </div>
                        </div>
                      </span>
                    </h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="card-deck w-95 mx-auto">
                <div class="card">
                  <img class="card-img-top" src="images/salmon_custom.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">Lemongrass Salmon
                      <span class="featured7">
                        <div class="stars-outer">
                          <div class="stars-inner">
                          </div>
                        </div>
                      </span>
                    </h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
                <div class="card">
                  <img class="card-img-top" src="images/salmon_custom.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">Card title
                      <span class="featured8">
                        <div class="stars-outer">
                          <div class="stars-inner">
                          </div>
                        </div>
                      </span></h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
                <div class="card">
                  <img class="card-img-top" src="images/salmon_custom.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">Card title
                      <span class="featured9">
                        <div class="stars-outer">
                          <div class="stars-inner">
                          </div>
                        </div>
                      </span>
                    </h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <i class="material-icons md-48">chevron_left</i>
            <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span> -->
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <i class="material-icons md-48">chevron_right</i>
            <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span> -->
          </a>
        </div>


      </div>
      <!-- <div class="container">
        <div class="row">

          <div class="featured1">
            <div class="stars-outer">
              <div class="stars-inner">

              </div>
            </div>
          </div>
          <div class="featured2">
            <div class="stars-outer">
              <div class="stars-inner">

              </div>
            </div>
          </div>
          <div class="featured3">
            <div class="stars-outer">
              <div class="stars-inner">

              </div>
            </div>
          </div>
        </div>
      </div> -->




    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script>

      const ratings = {
        featured1: 4.0,
        featured2: 5.0,
        featured3: 2.7,
        featured4: 3.0,
        featured5: 5.0,
        featured6: 2.0,
        featured7: 1.0,
        featured8: 4.0,
        featured9: 5.0
      }

      const totalStars = 5.0;

      document.addEventListener('DOMContentLoaded',getRatings());

      function getRatings(){

        for(let rating in ratings){

          const starPercentage = (ratings[rating] / totalStars) * 100;

          const starPercentageRounded = `${Math.round(starPercentage /10 ) * 10}%`;

          document.querySelector(`.${rating} .stars-inner`).style.width = starPercentageRounded;


        }

      }
    </script>

  </body>

</html>
