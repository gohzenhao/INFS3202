// Add handlers for initial elements
addRemoveMeHandler($('button.remove-me'));
addIngredientEnterKeyHandler($('input.ingredient-input'));
addDirectionEnterKeyHandler($('textarea.direction-input'));

/**
 * For both Ingredients and Directions lists:
 * Removes list item associated to remove button
 * 
 * @param: jquery wrapper object
 */
function addRemoveMeHandler(element) {
    element.on("click", function(event) {
        event.preventDefault();
        var listItem = $(this).parent().parent().parent();
        listItem.slideUp('fast', function(){
            $(this).remove()
        });
    });
}

/**
 * Prevent ENTER key from ingredient input field to trigger remove-me
 * Will trigger add-more instead
 * 
 * @param: jquery wrapper object of input element
 */
function addIngredientEnterKeyHandler(element) {
    element.on("keypress", function(event) {
        if(event.keyCode == 13) {
            event.preventDefault();
            $('.ingred-add-more').trigger("click");
        }
    });
}

/**
 * When SHIFT + ENTER is pressed add new direction step
 * 
 * @param: jquery wrapper object of textarea element
 */
function addDirectionEnterKeyHandler(element) {
    element.on("keydown", function(event) {
        if(event.keyCode == 13 && event.shiftKey) {
            event.preventDefault();
            $('.direction-add-more').trigger("click");
        }
    });
}

/** Handle creating more ingredients forms */
$('.ingred-add-more').on("click", function(event) {
    event.preventDefault();
    var listObj = $('.ingredients');
    var newItem = '<li class="form-group">'
        + '<div class="input-group mb-3">'
        + '<div class="input-group-prepend drag-me"><span class="input-group-text fa fa-bars"></span></div>'
        + '<input class="ingredient-input form-control" name="ingredients[]" type="text" placeholder="Enter ingredient and amount">'
        + '<div class="input-group-append"><button class="input-group-text btn btn-danger remove-me">X</button></div>';
    var newElement = $(newItem);
    listObj.append(newElement.hide());
    newElement.slideDown('fast');

    addRemoveMeHandler(newElement.find('button.remove-me'));
    addIngredientEnterKeyHandler(newElement.find('input.ingredient-input'));
});

/** Handle creating more directions form */
$('.direction-add-more').on("click", function(event){
    event.preventDefault();
    var listObj = $('.directions');
    var newItem = '<li class="form-group">'
        + '<div class="input-group mb-3">'
        + '<div class="input-group-prepend drag-me"><span class="input-group-text fa fa-bars"></span></div>'
        + '<textarea class="direction-input form-control" name="directions[]" rows="4"></textarea>'
        + '<div class="input-group-append"><button class="input-group-text btn btn-danger remove-me">X</button></div></div></li>';
    var newElement = $(newItem);
    listObj.append(newElement.hide());
    newElement.slideDown('fast');

    addRemoveMeHandler(newElement.find('button.remove-me'));
    addDirectionEnterKeyHandler(newElement.find('textarea.direction-input'));
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
