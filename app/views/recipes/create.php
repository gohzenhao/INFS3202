<?php require APPROOT . '/views/includes/header.php'; ?>

    <div class="container col-8">

        <div class="py-3 text-center">
            <h1>New Recipe</h1>
        </div>

        <div class="row">
            <form class="col" action="<?php echo URLROOT; ?>/recipes/saverecipe" method="GET">
                <div class="row mb-3">
                    <div class="col-5">
                        <img src="<?php echo URLROOT?>/img/beef.jpg" alt="Insert_Image">

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
                
                <div class="row">
                    <div class="col form-group form-inline">
                        <label for="prepTime">Preparation Time: </label>
                        <input class="form-control form-control-sm" name="prepTime" type="text" placeholder="Preparation Time">
                    </div>
                    <div class="col form-group form-inline">
                        <label for="servingSize">Serving Size: </label>
                        <input class="form-control form-control-sm" name="servingSize" type="text" placeholder="Serving Size">
                    </div>
                </div>

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

                <div class="row mb-3">
                    <label class="col-12" for="ingredients">Directions: </label>
                    
                    <button class="btn btn-primary col-12">Add another step</button>
                </div>
                <div class="row">
                    <button class="btn btn-success btn-lg ml-auto" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>


<?php require APPROOT . '/views/includes/footer.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/recipes/create.css">

<script src="<?php echo URLROOT; ?>/js/recipes/create.js"></script>