<div class="container-fluid">

<div class="row">

<div class="col-lg-3" id="sidebar">
  <h3 class="mt-3 mb-4 pl-3"><u>Activities</u></h3>
  <ul class="nav nav-pills nav-stacked">
    <a href="#section1"><li><h5>My Recipes</h5></h5></li></a>
    <a href="#section2"><li><h5>Create Recipe</h5></li></a>
    <a href="#section1"><li><h5>Edit Profile</h5></li></a>
  </ul><br>
  <hr/>
</div>

<div class="container col-lg-8 col-md-10 col-sm-12">

    <div class="py-3 text-center col-8">
        <h1>New Recipe</h1>
    </div>

    <div class="row">
        <form class="col" action="<?php echo URLROOT; ?>/recipes/create" method="POST" enctype="multipart/form-data">
            <div class="row mb-3">
              <!-- <div class="col-2"></div> -->
                <div class="col-3">
                    <label for="imgPreview">Recipe Picture: </label>
                    <div class="previewPic">
                        <input name="imgPreview" type="file" accept="image/jpeg, image/png">
                    </div>
                    <small class="" style="color: #dc3545;"><?php echo $data['img_error'] ?></small>
                </div>
                <div class="col-5">
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
                <div class="col-2">

                </div>
            </div>
            <hr/>

            <!-- Preparation time and Serving size -->
            <div class="row">
              <!-- <div class="col-2">

              </div> -->
                <div class="col-5 form-group form-inline">
                    <label for="prepTime" class="pr-2">Preparation Time: </label>
                    <input name="prepTime" type="text" placeholder="Please enter time and units" class="w-50 form-control form-control-sm <?php echo (!empty($data['prepTime_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['prepTime']?>">
                    <span class="invalid-feedback"><?php echo $data['prepTime_error'] ?></span>
                </div>
                <div class="col-4 form-group form-inline">
                    <label for="servingSize" class="pr-2">Serving Size: </label>
                    <input name="servingSize" type="text" class="w-50 form-control form-control-sm <?php echo (!empty($data['servingSize_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['servingSize']?>">
                    <span class="invalid-feedback"><?php echo $data['servingSize_error'] ?></span>
                </div>
                <div class="col-2">

                </div>
            </div>
            <hr/>

            <!-- Add Ingredients form -->
            <div class="row mb-3">
              <!-- <div class="col-2">

              </div> -->
              <div class="col-8">

                <label class="col-12" for="ingredients">Ingredients: </label>
                <ul class="col-12 ingredients <?php echo (!empty($data['ingredients_error'])) ? 'form-control is-invalid' : ''; ?>">
                    <li class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend drag-me"><span class="input-group-text fa fa-bars"></span></div>
                            <input class="ingredient-input form-control" name="ingredients[]" type="text" placeholder="Enter ingredient and amount">
                            <div class="input-group-append"><button class="input-group-text btn btn-danger remove-me">X</button></div>
                        </div>
                    </li>
                </ul>
                <span class="invalid-feedback"><?php echo $data['ingredients_error'] ?></span>
                <button class="ingred-add-more btn btn-primary col-12">Add more ingredients</button>
            </div>
          </div>
            <hr/>

            <!-- Add Directions form -->
            <div class="row mb-3">
              <!-- <div class="col-2">

              </div> -->
              <div class="col-8">

                <label class="col-12" for="directions">Directions: </label>
                <ol class="col-12 directions <?php echo (!empty($data['directions_error'])) ? 'form-control is-invalid' : ''; ?>">
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
                <button class="direction-add-more btn btn-primary col-12">Add another step</button>
            </div>
          </div>

            <hr/>

            <!-- Upload youtube link -->
            <div class="row mb-3">
              <!-- <div class="col-2">

              </div> -->
              <div class="col-5">

                <div class="form-group form-inline">
                    <label class="col-12 pb-3">Have a video on how to follow your recipe?</label>
                    <label for="youtubeLink" class="pr-2"> Youtube link: </label>
                    <input id="youtubeLink" name="youtubeLink" type="text" placeholder="Paste URL here" class="w-50 form-control form-control-sm">
                    <span class="invalid-feedback"><?php echo $data['link_error'] ?></span>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-8">
                <button class="btn btn-success btn-lg mr-auto" type="submit" style="width:100%;">Save</button>
              </div>
            </div>
        </form>
    </div>
</div>

<div class="col-lg-1">

</div>

</div>
</div>


<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/recipes/create.css">
