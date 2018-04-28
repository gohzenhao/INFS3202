<?php require APPROOT . '/views/includes/header.php'; ?>

    <div class="container col-lg-8 col-md-10 col-sm-12">

        <div class="py-3 text-center">
            <h1>New Recipe</h1>
        </div>

        <div class="row">
            <form class="col" action="<?php echo URLROOT; ?>/recipes/create" method="POST" enctype="multipart/form-data">
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
                        <small class="form-text text-muted">Please enter units</small>
                        <input name="prepTime" type="text" class="form-control form-control-sm <?php echo (!empty($data['prepTime_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['prepTime']?>">
                        <span class="invalid-feedback"><?php echo $data['prepTime_error'] ?></span>
                    </div>
                    <div class="col form-group form-inline">
                        <label for="servingSize" class="pr-2">Serving Size: </label>
                        <input name="servingSize" type="text" class="form-control form-control-sm <?php echo (!empty($data['servingSize_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['servingSize']?>">
                        <span class="invalid-feedback"><?php echo $data['servingSize_error'] ?></span>
                    </div>
                </div>
                <hr/>

                <!-- Add Ingredients form -->
                <div class="row mb-3">
                    <label class="col-12" for="ingredients">Ingredients: </label>
                    <ul class="col-5 ingredients <?php echo (!empty($data['ingredients_error'])) ? 'form-control is-invalid' : ''; ?>">
                        <li class="form-group ingredient">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend drag-me"><span class="input-group-text fa fa-bars"></span></div>
                                <input class="form-control" name="ingredients[]" type="text">
                                <div class="input-group-append"><button class="input-group-text btn btn-danger remove-me">X</button></div>
                            </div>
                        </li>
                    </ul>
                    <span class="invalid-feedback"><?php echo $data['ingredients_error'] ?></span>
                    <button class="ingred-add-more btn btn-primary col-12">Add more ingredients</button>
                </div>
                <hr/>

                <!-- Add Directions form -->
                <div class="row mb-3">
                    <label class="col-12" for="ingredients">Directions: </label>
                    <ol class="col-8 directions <?php echo (!empty($data['directions_error'])) ? 'form-control is-invalid' : ''; ?>">
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
                    <span class="invalid-feedback"><?php echo $data['directions_error'] ?></span>
                    <button class="direction-add-more btn btn-primary col-12">Add another step</button>
                </div>
                <hr/>

                <!-- Submit -->
                <div class="row">
                    <button class="btn btn-success btn-lg ml-auto mb-5" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>


<?php require APPROOT . '/views/includes/footer.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/recipes/create.css">

<script src="<?php echo URLROOT; ?>/js/recipes/create.js"></script>