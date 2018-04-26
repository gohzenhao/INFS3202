if (jQuery) {  
console.log('jQuery is loaded');
} else {
    console.log('jQuery is NOT loaded');
}

// Handle creating more ingredients forms
$(".ingred-add-more").on("click", function(event) {
    event.preventDefault();
    var listObj = $(event.target).prev();
    var newItem = '<li class="form-group ingredient">'
        + '<div class="input-group mb-3">'
        + '<div class="input-group-prepend drag-me"><span class="input-group-text fa fa-bars"></span></div>'
        + '<input class="form-control" name="ingredients[]" type="text">'
        + '<div class="input-group-append"><button class="input-group-text btn btn-danger remove-me">X</button></div>';
    var newElement = $(newItem);
    listObj.append(newElement);

    $("button.remove-me").on("click", function(event) {
        event.preventDefault();
        $(this).parent().parent().parent().remove();
    });
});

// Handle creating more directions form
$('.direction-add-more').on("click", function(e){
    e.preventDefault();
    var listObj = $(event.target).prev();
    var newItem = '<li class="form-group direction">'
        + '<div class="input-group mb-3">'
        + '<div class="input-group-prepend drag-me"><span class="input-group-text fa fa-bars"></span></div>'
        + '<textarea class="form-control" name="directions[]" rows="4"></textarea>'
        + '<div class="input-group-append"><button class="input-group-text btn btn-danger remove-me">X</button></div></div></li>';
    var newElement = $(newItem);
    listObj.append(newElement);

    $("button.remove-me").on("click", function(event) {
        event.preventDefault();
        $(this).parent().parent().parent().remove();
    });
});

// Handle drag and drop reordering of ingredients
$("ul.ingredients,ol.directions").sortable({
    handle: 'div.drag-me',
    // set $item relative to cursor position
    onDragStart: function ($item, container, _super) {
        var offset = $item.offset(),
            pointer = container.rootGroup.pointer;

        _super($item, container);
    }
});

$('.anyName').uploadPreview({
    width: '250px',
    height: '200px',
    backgroundSize: 'cover',
    fontSize: '16px',
    border: '3px solid #dedede',
    lang: 'en'
});

$('.imgContainer1').uploadPreview({
    width: '150px',
    height: '150px',
    backgroundSize: 'cover',
    fontSize: '16px',
    border: '3px solid #dedede',
    lang: 'en'
});
