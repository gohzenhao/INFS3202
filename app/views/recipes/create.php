<?php require APPROOT . '/views/includes/header.php'; ?>

    <div class="container col-lg-8 col-md-10 col-sm-12">

        <div class="py-3 text-center">
            <h1>New Recipe</h1>
        </div>

        <div class="row">
            <form class="col" action="<?php echo URLROOT; ?>/recipes/saverecipe" method="POST" enctype="multipart/form-data">
                <div class="row mb-3">
                    <div class="col-5">
                        <label for="profilePicture">Recipe Picture: </label>
                        <div class="anyName m-auto">
                            <input name="profilePicture" type="file" accept="image/jpeg, image/png">
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="row form-group">
                            <label for="title">Title:</label>
                            <input class="form-control" name="title" type="text">
                        </div>
                        <div class="row form-group">
                            <label for="desc">Description:</label>
                            <textarea class="form-control" name="desc" rows="4"></textarea>
                        </div>
                    </div>
                </div>
                <hr/>

                <!-- Preparation time and Serving size -->
                <div class="row">
                    <div class="col form-group form-inline">
                        <label for="prepTime" class="pr-2">Preparation Time: </label>
                        <input class="form-control form-control-sm" name="prepTime" type="text">
                    </div>
                    <div class="col form-group form-inline">
                        <label for="servingSize" class="pr-2">Serving Size: </label>
                        <input class="form-control form-control-sm" name="servingSize" type="text">
                    </div>
                </div>
                <hr/>

                <!-- Add Ingredients form -->
                <div class="row mb-3">
                    <label class="col-12" for="ingredients">Ingredients: </label>
                    <ul class="col-5 ingredients">
                        <li class="form-group ingredient">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend drag-me"><span class="input-group-text fa fa-bars"></span></div>
                                <input class="form-control" name="ingredients[]" type="text">
                                <div class="input-group-append"><button class="input-group-text btn btn-danger remove-me">X</button></div>
                            </div>
                            
                        </li>
                    </ul>
                    <button class="ingred-add-more btn btn-primary col-12">Add more ingredients</button>
                </div>
                <hr/>

                <!-- Add Directions form -->
                <div class="row mb-3">
                    <label class="col-12" for="ingredients">Directions: </label>
                    <ol class="col-8 directions">
                        <li class="form-group direction">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend drag-me center"><span class="input-group-text fa fa-bars"></span></div>
                                <!-- TODO: insert upload image -->
                                <!-- <div class="border border-primary col-6">
                                    <div class="imgContainer1 m-auto">
                                        <input name="dImg1" type="file" accept="image/jpeg, image/png">
                                    </div>
                                </div> -->
                                
                                <textarea class="form-control" name="directions[]" rows="4"></textarea>
                                <div class="input-group-append"><button class="input-group-text btn btn-danger remove-me">X</button></div>
                            </div>
                        </li>
                    </ol>
                    <button class="direction-add-more btn btn-primary col-12">Add another step</button>
                </div>
                <hr/>

                <!-- Submit -->
                <div class="row">
                    <button class="btn btn-success btn-lg ml-auto" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>


<?php require APPROOT . '/views/includes/footer.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/recipes/create.css">

<script src="<?php echo URLROOT; ?>/js/recipes/create.js"></script>