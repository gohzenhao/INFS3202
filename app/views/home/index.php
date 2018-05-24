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
        <a href="'.URLROOT.'/recipes/display/'. $data['week']->rid .'" style="text-decoration:none;color:black;">
        <div class="featured-box">
        <h1>Recipe of the week : </h1>
        <h1>' . $data['week']->title . '</h1>
        <p class="lead">
          By : ' . $data['owner']->user_name .'
        </p>
        <p class="lead" style="font-weight:bold;">---- VIEW RECIPE ----</p>
        </div>
        </a>
      </div>
    </div>';
    ?>
  </div>


<div class="container">
    <div class="row mt-4 pl-4 pr-4">
        <div class="col-lg-12 text-center">
            <h3> <u> Featured custom recipes </u> </h3>
        </div>
            <div id="feature-cards" class="card-group">
                <?php for ($x = 0; $x < sizeof($data['featured']); $x++): ?>
                    <div class="col-lg-4 mt-4 d-flex">
                        <div class="card d-flex w-100" id="featured-card">
                        <a href="<?php echo URLROOT.'/recipes/display/'.$data['featured'][$x]->rid?>">
                            <img class="card-img-top" src="<?php echo URLROOT.'/img'. $data['featured'][$x]->imagePath ?>" alt="Card image cap" style="object-fit:cover;height:200px">
                            <div class="card-body">
                                <h5 class="card-title ml-auto"><?php echo $data['featured'][$x]->title ?>
                                    <span id="featured<?php echo $x ?>">
                                        <div class="stars-outer"><div class="stars-inner"></div></div>
                                    </span>
                                </h5>
                            <p class="card-text"><?php echo $data['featured'][$x]->description ?></p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                            </a>
                        </div>
                    </div>
                <?php endfor;?>
            </div>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>

<script>
  document.addEventListener('DOMContentLoaded',getRatings());

function getRatings(){
    var jArray= <?php echo json_encode($data['average']); ?>;
    const ratings = {
        featured0: jArray[0],
        featured1: jArray[1],
        featured2: jArray[2],
        featured3: jArray[3],
        featured4: jArray[4],
        featured5: jArray[5],
    }

    console.log(jArray);

    const totalStars = 5.0;
    for(let rating in ratings){
        // Get rating bar 
        let ratingBar = document.getElementById(`${rating}`).getElementsByClassName("stars-inner")[0];

        var starPercentage = (ratings[rating] / totalStars) * 100;
        // let starPercentageRounded = `${Math.round(starPercentage /10 ) * 10}%`;
        ratingBar.style.width = `${Math.round(starPercentage /10 ) * 10}%`;
    }

}
</script>
