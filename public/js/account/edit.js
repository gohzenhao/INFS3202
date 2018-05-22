$(document).on("click", ".editButton", function (event) {
    var inputField = $(event.target).prev();
    console.log(inputField);
    inputField.prop("disabled", false);
    inputField.focus();
    inputField.next().prop("hidden", true);
    inputField.next().next().prop("hidden", false);
});


$(window).on('scroll',function(){
    if($(window).scrollTop()) {
      $('#navbar').addClass('black');
    } else {
      $('#navbar').removeClass('black');
    }
});