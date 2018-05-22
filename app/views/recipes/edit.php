<div class="row">

    <div class="col-lg-3" id="sidebar">
        <h3 class="mt-3 mb-4 pl-3"><u>Activities</u></h3>
        <ul class="nav nav-pills nav-stacked">
            <a href="#section1"><li><h5>My Recipes</h5></h5></li></a>
            <a href="#section2"><li><h5>Create Recipe</h5></li></a>
            <a href="#section1"><li><h5>Edit Profile</h5></li></a>
        </ul>
        <br><hr/>
    </div>

    <!-- Create Recipe Form Area -->
    <div class="container col-lg-8 col-md-10 col-sm-12">

        <div class="py-3 text-center">
            <h1>Edit Recipe</h1>
        </div>

        <form class="col" action="<?php echo URLROOT;?>/recipes/edit/<?php echo $data['rid'];?>" method="POST" enctype="multipart/form-data">
            <div class="row mb-3">
                <div class="col-5">
                    <label for="imgPreview">Recipe Picture: </label>
                    <img src="<?php echo URLROOT.'/img'.$data['imagePath'];?>" alt="">
                    <!-- <div class="previewPic m-auto" >
                        <input name="imgPreview" type="file"  accept="image/jpeg, image/png">
                    </div> -->
                    <small class="" style="color: #dc3545;"><?php echo $data['img_error'] ?></small>
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
                <ul class="col-5 ingredients <?php echo (!empty($data['ingredients_error'])) ? 'form-control is-invalid' : ''; ?>">
                    <?php foreach($data['ingredients'] as $item) : ?>
                        <li class="form-group">
                            <div class="input-group mb-3">
                                <input class="ingredient-input form-control" name="ingredients[]" type="text" placeholder="Enter ingredient and amount" value="<?php echo $item;?>">
                            </div>
                        </li>
                    <?php endforeach;?>
                </ul>
                <span class="invalid-feedback"><?php echo $data['ingredients_error'] ?></span>
            </div>
            <hr/>

            <!-- Add Directions form -->
            <div class="row mb-3">
                <label class="col-12" for="directions">Directions: </label>
                <ol class="col-8 directions <?php echo (!empty($data['directions_error'])) ? 'form-control is-invalid' : ''; ?>">
                    <?php foreach($data['directions'] as $item) : ?>
                        <li class="form-group">
                            <div class="input-group mb-3">
                                <textarea class="direction-input form-control" name="directions[]" rows="4"><?php echo $item;?></textarea>
                            </div>
                        </li>
                    <?php endforeach;?>
                </ol>
                <span class="invalid-feedback"><?php echo $data['directions_error'] ?></span>
            </div>

            <hr/>

            <!-- Upload youtube link -->
            <div class="row mb-3">
                <div class="col form-group form-inline">
                    <h5 class="col-12">Have a video on how to follow your recipe?</h5>
                    <label for="youtubeLink" class="pr-2"> Youtube link: </label>
                    <input id="youtubeLink" class="w-50 form-control form-control-sm <?php echo (!empty($data['link_error'])) ? 'form-control is-invalid' : ''; ?>" name="youtubeLink" type="text" placeholder="Paste URL here" value="<?php echo $data['link']?>">
                    <span class="invalid-feedback"><?php echo $data['link_error'] ?></span>
                </div>
            </div>

            <div class="row">
                <button class="btn btn-success btn-lg ml-auto mb-5" type="submit">Save</button>
            </div>
        </form>
    </div>


</div>
