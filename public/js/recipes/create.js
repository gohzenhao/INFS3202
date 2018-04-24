if (jQuery) {  
console.log('jQuery is loaded');
} else {
    console.log('jQuery is NOT loaded');
}

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

var adjustment;

$("ul.ingredients").sortable({
    handle: 'div.drag-me',
    // set $item relative to cursor position
    onDragStart: function ($item, container, _super) {
        var offset = $item.offset(),
            pointer = container.rootGroup.pointer;

        adjustment = {
            left: pointer.left - offset.left,
            top: pointer.top - offset.top
        };

        _super($item, container);
    }
});