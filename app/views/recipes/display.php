<?php require APPROOT . '/views/includes/header.php'; ?>

    <div class="container col-lg-8 col-md-10 col-sm-12">
        <!-- Title of recipe -->
        <div class="py-3 text-center">
            <h1><?php echo $data['title']?></h1>
        </div>

        <div class="col">
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
                            <input class="form-control" name="ingredients[]" type="text">
                        </div>
                    </li>
                </ul>
            </div>
            <hr/>

            <!-- Add Directions form -->
            <div class="row mb-3">
                <label class="col-12" for="ingredients">Directions: </label>
                <ol class="col-8 directions <?php echo (!empty($data['directions_error'])) ? 'form-control is-invalid' : ''; ?>">
                    <li class="form-group direction">
                        <div class="input-group mb-3">
                            <textarea class="form-control" name="directions[]" rows="4"></textarea>
                        </div>
                    </li>
                </ol>
            </div>
            
        </div>
    </div>

<?php require APPROOT . '/views/includes/footer.php'; ?>