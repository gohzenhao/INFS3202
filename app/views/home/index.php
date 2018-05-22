<!-- <div class="container-fluid"> -->

<?php flash('logout_success'); ?>

<!-- Page Content -->

<header class="masthead">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="display-3 text-white">Search all of our recipes</h1>
                <p class="lead text-white">Perfection starts from home</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- Search bar - opens search page to display results -->
                <form action="<?php echo URLROOT;?>/search" method="GET">
                    <div class="input-group mb-3">
                        <input id="search-bar" name="query" type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-primary px-5" type="submit">
                                <div class="row">
                                    <div class="col-lg-2"><i class="material-icons">search</i></div>
                                    <div class="col-lg-1">Search</div>
                                </div>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>

<!-- featured thumbnails -->
  <div class="container">
    <hr/>
    <?php echo '<div class="featured" id="feature">
      <div class="container">
        <div class="featured-box">
        <h1>Recipe of the week : </h1>
        <h1>' . $data['featured'][0]->title . '</h1>
        <p class="lead">
          By : ' . $data['owner']->user_name .'
        </p>
        <p class="lead text-white"><a href="'.URLROOT.'/recipes/display/'. $data['featured'][0]->rid .'" style="text-decoration:none;text-transform:uppercase;color:black;">View Recipe > </a></p>
        </div>
      </div>
    </div>';
    ?>
  </div>


<div class="container">
<div class="row mt-4 pl-4 pr-4">
    <div class="col-lg-12 text-center">
        <h3> <u> Featured custom recipes </u> </h3>
    </div>

    <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
        <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="card-deck w-95 mx-auto">
                  <?php
                  for($x = 1;$x<4;$x++){
                    echo '<div class="card">
                      <img class="card-img-top" src="' . URLROOT.'/img'. $data['featured'][$x]->imagePath .'" alt="Card image cap">
                      <div class="card-body">

                          <h5 class="card-title ml-auto">' . $data['featured'][$x]->title . '<span class="featured1">
                          <div class="stars-outer">
                              <div class="stars-inner">
                              </div>
                          </div>
                          </span></h5>
                      <p class="card-text">' . $data['featured'][$x]->description.'</p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                      </div>
                  </div>';
                }
                  ?>

                </div>
            </div>

            <div class="carousel-item">
                <div class="card-deck w-95 mx-auto">

                  <?php
                  for($x = 4;$x<sizeof($data['featured']);$x++){
                    echo '<div class="card">
                      <img class="card-img-top" src="' . URLROOT.'/img' . $data['featured'][$x]->imagePath .'" alt="Card image cap">
                      <div class="card-body">

                          <h5 class="card-title ml-auto">' . $data['featured'][$x]->title . '<span class="featured1">
                          <div class="stars-outer">
                              <div class="stars-inner">
                              </div>
                          </div>
                          </span></h5>
                      <p class="card-text">' . $data['featured'][$x]->description.'</p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                      </div>
                  </div>';
                }
                  ?>

                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <i class="material-icons md-48">chevron_left</i>
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <i class="material-icons md-48">chevron_right</i>
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </div>
</div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>
