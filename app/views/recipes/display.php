<?php require APPROOT . '/views/includes/header.php'; ?>

    <!-- Container for displaying recipe information -->
    <div class="container col-lg-8 col-md-10 col-sm-12">
        <!-- Title of recipe -->
        <div class="py-3 text-center">
            <h1><?php echo $data['title']?></h1>
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

        <h2 class="text-center">Comments</h2>
        <p class="text-center">Coming soon....</p>

    </div>

<?php require APPROOT . '/views/includes/footer.php'; ?>