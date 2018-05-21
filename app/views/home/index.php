<div class="container">

<?php flash('logout_success'); ?>
<!-- <div class="jumbotron text-center">
    
    <h1><?php echo $data['title']?></h1>
    <a class="btn btn-secondary" href="<?php echo URLROOT; ?>/home/about" role="button">Empty About</a>
    <a class="btn btn-primary" href="<?php echo URLROOT; ?>/users/registration" role="button">Register</a>
    <a class="btn btn-primary" href="<?php echo URLROOT; ?>/users/login" role="button">Login</a>
    <a class="btn btn-warning" href="<?php echo URLROOT; ?>/account" role="button">Account</a>
    <div class="w-100 mt-1">
        <a class="btn btn-primary" href="<?php echo URLROOT; ?>/search" role="button">Search Recipe</a>
        <a class="btn btn-warning" href="<?php echo URLROOT; ?>/recipes/create" role="button">Create Recipe</a>
        <a class="btn btn-warning" href="<?php echo URLROOT; ?>/recipes/display/1" role="button">Display Recipe</a>
    </div>
    <div class="w-100 mt-1">
        <a class="btn btn-primary" href="<?php echo URLROOT; ?>/chat" role="button">Chat Room</a>
        <a class="btn btn-primary" href="<?php echo URLROOT; ?>/celebritychefs" role="button">Gordon Ramsay's Recipes</a>
    </div>
</div> -->


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
            <button class="btn btn-primary px-5" type="button">
                <div class="row">
                    <div class="col-lg-2"><i class="material-icons">search</i></div>
                    <div class="col-lg-1">Search</div>
                </div>
            </button>
            </span>
        </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
    </div>
    </div>
</header>

<!-- featured thumbnails -->


    <div class="container">

        <div class="featured" style="outline:3px solid #fff;outline-offset:-20px">
          <div class="container">
            <div style="background-color:orange;width:40%;height:40%;margin-left:2rem;padding:1rem;">
            <h1>Recipe of the week : Chicken Pad Thai</h1>
            <p class="lead">
              By : Bobby Smith
            </p>
            </div>
          </div>
        </div>
    </div>


<!-- featured custom recipes -->
<div class="row mt-3 pl-4 pr-4">
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
                    <img class="card-img-top" src="<?php echo URLROOT; ?>/img/salmon_custom.jpg" alt="Card image cap">
                    <div class="card-body">

                        <h5 class="card-title ml-auto">Card title <span class="featured1">
                        <div class="stars-outer">
                            <div class="stars-inner">
                            </div>
                        </div>
                        </span></h5>


                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                    This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                  </p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                    </div>

                <div class="card">
                    <img class="card-img-top" src="<?php echo URLROOT; ?>/img/salmon_custom.jpg" alt="Card image cap">
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
                    <img class="card-img-top" src="<?php echo URLROOT; ?>/img/salmon_custom.jpg" alt="Card image cap">
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
                    <img class="card-img-top" src="<?php echo URLROOT; ?>/img/salmon_custom.jpg" alt="Card image cap">
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
                    <img class="card-img-top" src="<?php echo URLROOT; ?>/img/salmon_custom.jpg" alt="Card image cap">
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
                    <img class="card-img-top" src="<?php echo URLROOT; ?>/img/salmon_custom.jpg" alt="Card image cap">
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
                    <img class="card-img-top" src="<?php echo URLROOT; ?>/img/salmon_custom.jpg" alt="Card image cap">
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
                    <img class="card-img-top" src="<?php echo URLROOT; ?>/img/salmon_custom.jpg" alt="Card image cap">
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
                    <img class="card-img-top" src="<?php echo URLROOT; ?>/img/salmon_custom.jpg" alt="Card image cap">
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

</div><!-- Close container -->
