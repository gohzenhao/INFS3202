<?php require APPROOT . '/views/includes/header.php'; ?>

    <!-- Container for displaying recipe information -->
    <div class="container col-lg-8 col-md-10 col-sm-12">
        <!-- Title of recipe -->
        <div class="py-3 text-center">
            <h1><?php echo $data['title']?></h1>
            <?php flash('comment_success'); ?>
        </div>

        <div class="col mb-3">
            <div class="row mb-4">
                <!-- Recipe Preview Image -->
                <div class="col-5">
                    <h5 class="row">Recipe Picture: </h5>
                    <div class="m-auto">
                        <img src="<?php echo URLROOT?>/img/beef.jpg" alt="Recipe Preview Image Here">
                    </div>
                </div>

                <!-- Recipe details -->
                <div class="col-7">
                    <!-- Author -->
                    <div class="row">
                        <h5 class="row">Author:</h5>
                        <p class="w-100 mh-80"><?php echo $data['ownerid'];?></p>
                    </div>
                    <!-- Description -->
                    <div class="row">
                        <h5 class="row">Description:</h5>
                        <p class="w-100 mh-80"><?php echo $data['description'];?></p>
                    </div>
                    <!-- Preparation time and Serving size -->
                    <div class="row">
                        <div class="col">
                            <h5 class="row">Preparation Time: </h5>
                            <span class="w-100"><?php echo $data['prepTime'];?></span>
                        </div>
                        <div class="col">
                            <h5 class="row">Serving Size: </h5>
                            <span class="w-100"><?php echo $data['servingSize'];?></span>
                        </div>
                    </div>
                </div>
            </div>
            <hr/>

            <!-- Ingredients -->
            <div class="row mb-3">
                <h5 class="w-100">Ingredients: </h5>
                <ul class="col-8 ingredients">
                    <?php
                        foreach($data['ingredients'] as $item) {
                            echo '<li><p class="w-100">' . $item['value'] . '</p></li>';
                        }
                    ?>
                </ul>
            </div>
            <hr/>

            <!-- Directions -->
            <div class="row mb-3">
                <h5 class="w-100">Directions: </h5>
                <ol class="col-8 directions list-group">
                    <?php
                        foreach($data['directions'] as $item) {
                            echo '<li><p class="w-100 list-group-item my-1">' . $item['description'] . '</p></li>';
                        }
                    ?>
                </ol>
            </div>

        </div>
    </div><!-- End of Recipe Information container -->

    <div class="container">

      <form action="<?php echo URLROOT; ?>/recipes/display/2" method="POST">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="text-center">Comments</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <h3>Leave a comment :</h3>
          <textarea name="comment" type="text" class="form-control"> </textarea>
          <div class="row">
            <div class="col-lg-12">
              <h3> Rating : </h3>
            </div>

            <!-- <div class="col-lg-3">
              <input type="text" disabled id="inputRating" name="rating" />
            </div> -->
            <div class="col-lg-12">
                <label class="radio-inline">
                  <input type="radio" value="1" name="rating">1
                </label>
                <label class="radio-inline">
                  <input type="radio" value"2" name="rating">2
                </label>
                <label class="radio-inline">
                  <input type="radio" value="3" name="rating">3
                </label>
                <label class="radio-inline">
                  <input type="radio" value="4" name="rating">4
                </label>
                <label class="radio-inline">
                  <input type="radio" value"5" name="rating">5
                </label>
                <span class="invalid-feedback"><?php echo $data['rating_error']?></span>
            </div>
          </div>

            <!-- <div class="rating-group">
              <a href="javascript:;" name="rating" class="stars-outer-comment" onclick="setRating1()"></a>
              <a href="#" name="rating" class="stars-outer-comment"></a>
              <a href="#" name="rating" class="stars-outer-comment"></a>
              <a href="#" name="rating" class="stars-outer-comment"></a>
              <a href="#" name="rating" class="stars-outer-comment"></a>
                <div class="stars-inner">
                </div>
            </div> -->
        </div>
      </div>
      <input type="submit" value="submit" class="btn btn-success btn-block">
    </form>
    </div>



<?php require APPROOT . '/views/includes/footer.php'; ?>

<script src="<?php echo URLROOT; ?>/js/home/rating.js"></script>
