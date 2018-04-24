<?php require APPROOT . '/views/includes/header.php'; ?>

    <div class="container col-8">

        <div class="py-5 text-center">
            <h1>New Recipe</h1>
        </div>

        <div class="row">
            <form class="col" action="<?php echo URLROOT; ?>/recipes/saverecipe" method="GET">
                <div class="row">
                    <div class="col-4">*insert image*</div>
                    <div class="col-8">
                        <div class="row">
                            <label for="">Title:</label>
                            <input type="text">
                        </div>
                        <div class="row">
                            <label for="">Description:</label>
                            <input type="text">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-12" for="ingredients">Ingredients: </label>
                    <ul class="ingredients">
                        <li class="form-group ingredient1">
                            <input name="ingredients[]" type="text"><button class="remove-me">x</button>
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

<script>
    if (jQuery) {  
      console.log('jQuery is loaded');
    } else {
        console.log('jQuery is NOT loaded');
    }

    var nextIngredient = 1;

    $(".ingred-add-more").on("click", function(event) {
        event.preventDefault();
        var listObj = $(event.target).prev();
        nextIngredient++;
        var newItem = '<li class="form-group ingredient' + nextIngredient + '"><input name="ingredients[]" type="text"><button class="remove-me">x</button></li>';
        var newElement = $(newItem);
        listObj.append(newElement);

        $("button.remove-me").on("click", function(event) {
            event.preventDefault();
            $(this).parent().remove();
        });
    });


</script>