<?php require APPROOT . '/views/includes/header.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/recipes/search.css">

    <div class="container">
        <h1><?php echo $data['title']?></h1>
        <h3>Display search results of recipes here</h3>

        <!-- Search bar -->
        <div class="input-group mb-3">
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

        <div class="list-group">
            <?php
                foreach($data['recipes'] as $item) {
                    echo '<a class="list-group-item list-group-item-action flex-column mb-3" href="'.URLROOT.'/recipes/display/'. $item->rid .'">
                    <div class="row">
                        <div class="">
                            <img class="preview-img mw-40" src="'.URLROOT.'/img/beef.jpg" alt="Preview: '. $item->imagePath .'">
                        </div>
                        <div class="col">
                            <div class="d-flex w-100 justify-content-between">
                                <h4>' . $item->title .'</h4>
                            </div>
                            <p>' . $item->description . '</p>
                        </div>
                    </div></a>';
                }
            ?>
        </div>



    </div>

<?php require APPROOT . '/views/includes/footer.php'; ?>
