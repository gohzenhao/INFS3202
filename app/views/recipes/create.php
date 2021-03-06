<div class="row">

    <?php require_once APPROOT.'/views/includes/sidenav.php'; ?>

    <!-- Create Recipe Form Area -->
    <div class="container col-lg-9 col-md-10 col-sm-12 border-left">

        <div class="py-3 text-center col-8">
            <h1>New Recipe</h1>
        </div>

        <form class="col" action="<?php echo URLROOT; ?>/recipes/create" method="POST" enctype="multipart/form-data">
            <div class="row mb-3">
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <label for="imgPreview">Recipe Picture: </label>
                    <div class="previewPic m-auto">
                        <input name="imgPreview" type="file" accept="image/jpeg, image/png">
                    </div>
                    <small class="" style="color: #dc3545;"><?php echo $data['img_error'] ?></small>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mr-4">
                    <div class="row form-group">
                        <label for="title">Title:</label>
                        <input name="title" type="text" class="form-control <?php echo (!empty($data['title_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']?>">
                        <span class="invalid-feedback"><?php echo $data['title_error'] ?></span>
                    </div>
                    <div class="row form-group">
                        <label for="desc">Description:</label>
                        <textarea name="desc" rows="4" class="form-control <?php echo (!empty($data['description_error'])) ? 'is-invalid' : ''; ?>"><?php echo $data['description']?></textarea>
                        <span class="invalid-feedback"><?php echo $data['description_error'] ?></span>
                    </div>
                </div>
            </div>
            <hr/>

            <!-- Preparation time and Serving size -->
            <div class="row">
                <div class="col form-group form-inline">
                    <label for="prepTime" class="pr-2">Preparation Time: </label>
                    <input name="prepTime" type="text" placeholder="Please enter time and units" class="w-50 form-control form-control-sm <?php echo (!empty($data['prepTime_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['prepTime']?>">
                    <span class="invalid-feedback"><?php echo $data['prepTime_error'] ?></span>
                </div>
                <div class="col form-group form-inline">
                    <label for="servingSize" class="pr-2">Serving Size: </label>
                    <input name="servingSize" type="text" class="w-50 form-control form-control-sm <?php echo (!empty($data['servingSize_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['servingSize']?>">
                    <span class="invalid-feedback"><?php echo $data['servingSize_error'] ?></span>
                </div>
            </div>
            <hr/>

            <!-- Add Ingredients form -->
            <div class="row mb-3">
                <label class="col-12" for="ingredients">Ingredients: </label>
                <ul class="col-8 ingredients <?php echo (!empty($data['ingredients_error'])) ? 'form-control is-invalid' : ''; ?>">
                    <li class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend drag-me"><span class="input-group-text fa fa-bars"></span></div>
                            <input class="ingredient-input form-control" name="ingredients[]" type="text" placeholder="Enter ingredient and amount">
                            <div class="input-group-append"><button class="input-group-text btn btn-danger remove-me">X</button></div>
                        </div>
                    </li>
                </ul>
                <span class="invalid-feedback"><?php echo $data['ingredients_error'] ?></span>
                <button class="ingred-add-more btn btn-primary col-5">Add more ingredients</button>
            </div>
            <hr/>

            <!-- Add Directions form -->
            <div class="row mb-3">
                <label class="col-12" for="directions">Directions: </label>
                <ol class="col-8 directions <?php echo (!empty($data['directions_error'])) ? 'form-control is-invalid' : ''; ?>">
                    <li class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend drag-me center"><span class="input-group-text fa fa-bars"></span></div>
                            <!-- TODO: add upload image option -->
                            <textarea class="direction-input form-control" name="directions[]" rows="4"></textarea>
                            <div class="input-group-append"><button class="input-group-text btn btn-danger remove-me">X</button></div>
                        </div>
                    </li>
                </ol>
                <span class="invalid-feedback"><?php echo $data['directions_error'] ?></span>
                <button class="direction-add-more btn btn-primary col-5">Add another step</button>
            </div>

            <hr/>

            <!-- Upload youtube link -->
            <div class="row mb-3">
                <div class="col form-group form-inline">
                    <h5 class="col-12">Have a video on how to follow your recipe?</h5>
                    <label for="youtubeLink" class="pr-2"> Youtube link: </label>
                    <input id="youtubeLink" name="youtubeLink" type="text" placeholder="Paste URL here" class="w-50 form-control form-control-sm <?php echo (!empty($data['link_error'])) ? 'form-control is-invalid' : ''; ?>">
                    <span class="invalid-feedback"><?php echo $data['link_error'] ?></span>
                </div>
            </div>

            <div class="row">
                <button class="btn btn-success btn-lg mb-5 col-8" type="submit">Save</button>
            </div>
        </form>
    </div>


</div>


<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/recipes/create.css">
