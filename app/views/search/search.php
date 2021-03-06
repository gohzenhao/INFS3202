<div class="container">

  <div class="row pt-4">

    <h1 class="col-lg-12 text-center">Search for recipes</h1>

    <!-- Search bar -->
    <div class="col-lg-12">

    <form action="<?php echo URLROOT;?>/search" method="GET">
        <div class="input-group mb-3">
            <input id="search-bar" name="query" type="text" class="form-control" placeholder="Search for..." value="<?php echo $data['query'] ?>">
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
  <div class="col-lg-12">
    <p>Suggestions: <span id="hint"></span></p>
  </div>
  </div>
    <h3>Search results :</h3>
    <!-- Display output of search -->
    <div class="list-group" id="search-items">
        <?php
            foreach($data['recipes'] as $item) {
                echo '<a class="list-group-item list-group-item-action flex-column mb-3" href="'.URLROOT.'/recipes/display/'. $item->rid .'">
                <div class="row">
                    <div class="">
                        <img class="preview-img img-thumbnail" src="'.URLROOT.'/img'.$item->imagePath.'" alt="Preview: '. $item->imagePath .'">
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

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/search/search.css">
