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
                <ol class="col-8 directions">
                    <?php
                        foreach($data['directions'] as $item) {
                            echo '<li><p class="w-100 my-1">' . $item['description'] . '</p></li>';
                        }
                    ?>
                </ol>
            </div>

        </div>
    </div><!-- End of Recipe Information container -->

    <div class="container">

        <h2 class="mx-auto text-center">Comments</h2>

        <?php  if(isset($_SESSION['user_id'])) : ?>

            <!-- Comments submission form -->
            <div class="mb-3 col-8 mx-auto">
                <div class="row mb-2">
                    <label for="comment">Leave a comment :</label>
                    <textarea id="commentText" class="w-100 form-control" name="comment" rows="3" type="text"></textarea>
                    <div class="invalid-feedback">Please enter a comment</div>
                </div>
                
                <div class="row mb-2">
                    <label>Rating:</label>
                    <div id="ratingRadios" class="col-lg-12 form-check form-control">
                        <label class="radio-inline">
                            <input id="rating1" type="radio" value="1" name="rating">1
                        </label>
                        <label class="radio-inline">
                            <input id="rating2" type="radio" value="2" name="rating">2
                        </label>
                        <label class="radio-inline">
                            <input id="rating3" type="radio" value="3" name="rating">3
                        </label>
                        <label class="radio-inline">
                            <input id="rating4" type="radio" value="4" name="rating">4
                        </label>
                        <label class="radio-inline">
                            <input id="rating5" type="radio" value="5" name="rating">5
                        </label>
                    </div>
                    <span class="invalid-feedback">Please enter a rating</span>
                </div>
                <button id="submitComment" type="submit" class="btn btn-success btn-block" onclick="saveComment(<?php echo $data['rid'] ?>)">Submit</button>
            </div>

        <?php  endif; ?>

        <!-- Display Comments below -->
        <div id="commentsArea" class="col-8 mx-auto">

            <!-- Template -->
            <!-- <div class="card mb-3">
                <div class="card-body">
                    <div class="stars-outer"><div class="stars-inner" style="width: 50%;"></div></div>
                    <p class="card-text">Comment: </p>
                    <h6 class="card-title">Author: username </h6>
                    <small class="card-subtitle text-muted">Date: </small>
                </div>
            </div> -->
        
            <?php 
                foreach($data['comments'] as $comment) {
                    echo '<div class="card mb-3">
                            <div class="card-body">
                                <div class="stars-outer"><div class="stars-inner" style="width: '.($comment->rating*20).'%;"></div></div>
                                <p class="card-text">'.$comment->comment_description.'</p>
                                <h6 class="card-title">Author: '.$comment->ownerid.'</h6>
                                <small class="card-subtitle text-muted">Date: '.$comment->date.'</small>
                            </div>
                        </div>';
                }
                
                
            ?>
        
        </div>

    </div>

<?php require APPROOT . '/views/includes/footer.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/recipes/display.css">

<script src="<?php echo URLROOT; ?>/js/recipes/comment.js"></script>
