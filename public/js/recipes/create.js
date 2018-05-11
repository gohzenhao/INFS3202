if (jQuery) {  
console.log('jQuery is loaded');
} else {
    console.log('jQuery is NOT loaded');
}

// Add handlers for initial elements
addRemoveMeHandler();
addIngredientEnterKeyHandler();
addDirectionEnterKeyHandler();

/**
 * For both Ingredients and Directions lists:
 * Removes list item associated to remove button
 */
function addRemoveMeHandler() {
    $('button.remove-me').on("click", function(event) {
        event.preventDefault();
        $(this).parent().parent().parent().remove();
    });
}

/**
 * Prevent ENTER key from ingredient input field to trigger remove-me
 * Will trigger add-more instead
 */
function addIngredientEnterKeyHandler() {
    $('input.ingredient-input').on("keypress", function(event) {
        event.preventDefault();
        $('.ingred-add-more').trigger("click");
    });
}

/**
 * When SHIFT + ENTER is pressed add new direction step
 */
function addDirectionEnterKeyHandler() {
    $('textarea.direction-input').on("keydown", function(event) {
        if(event.keyCode == 13 && event.shiftKey) {
            event.preventDefault();
            $('.direction-add-more').trigger("click");
        }
    });
}

/**
 * Handle creating more ingredients forms
 */
$('.ingred-add-more').on("click", function(event) {
    event.preventDefault();
    var listObj = $(event.target).prev().prev();
    var newItem = '<li class="form-group ingredient">'
        + '<div class="input-group mb-3">'
        + '<div class="input-group-prepend drag-me"><span class="input-group-text fa fa-bars"></span></div>'
        + '<input class="ingredient-input form-control" name="ingredients[]" type="text" placeholder="Enter ingredient and amount">'
        + '<div class="input-group-append"><button class="input-group-text btn btn-danger remove-me">X</button></div>';
    var newElement = $(newItem);
    listObj.append(newElement);

    addRemoveMeHandler();
    addIngredientEnterKeyHandler();
});

/**
 * Handle creating more directions form
 */
$('.direction-add-more').on("click", function(event){
    event.preventDefault();
    var listObj = $(event.target).prev().prev();
    var newItem = '<li class="form-group direction">'
        + '<div class="input-group mb-3">'
        + '<div class="input-group-prepend drag-me"><span class="input-group-text fa fa-bars"></span></div>'
        + '<textarea class="direction-input form-control" name="directions[]" rows="4"></textarea>'
        + '<div class="input-group-append"><button class="input-group-text btn btn-danger remove-me">X</button></div></div></li>';
    var newElement = $(newItem);
    listObj.append(newElement);

    addRemoveMeHandler();
    addDirectionEnterKeyHandler();
});



/**
 * Handle drag and drop reordering of ingredients
 */
$('ul.ingredients,ol.directions').sortable({
    handle: 'div.drag-me',
    // set $item relative to cursor position
    onDragStart: function ($item, container, _super) {
        var offset = $item.offset(),
            pointer = container.rootGroup.pointer;

        _super($item, container);
    }
});

/**
 * Create upload image preview area
 */
$('.previewPic').uploadPreview({
    width: '250px',
    height: '200px',
    backgroundSize: 'cover',
    fontSize: '16px',
    border: '3px solid #dedede',
    lang: 'en'
});

// $('.imgContainer1').uploadPreview({
//     width: '150px',
//     height: '150px',
//     backgroundSize: 'cover',
//     fontSize: '16px',
//     border: '3px solid #dedede',
//     lang: 'en'
// });
