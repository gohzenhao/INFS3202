//TODO: remove? is this still needed?
if (jQuery) {
    console.log('jQuery is loaded');
} else {
    console.log('jQuery is NOT loaded');
}

$(document).on("click", ".editButton", function (event) {
    var inputField = $(event.target).prev();
    console.log(inputField);
    inputField.prop("disabled", false);
    inputField.focus();
    inputField.next().prop("hidden", true);
    inputField.next().next().prop("hidden", false);
});
