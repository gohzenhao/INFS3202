// $('#submitComment').on('click', function(){
var saveComment = function(rid){
    // Remove is invalid class attribute
    $('#commentText,#ratingRadios').removeClass("is-invalid");
    var isValidComment = true;

    // Comment textarea validation
    var comment = $('#commentText').val();
    if(comment == '') {
        $('#commentText').addClass("is-invalid");
        isValidComment = false;
    }

    // Rating radio buttons validation
    var rating = false;
    var radios = document.getElementsByName("rating");
    for (var i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            rating = radios[i];
            break;
        }
    }
    if (!rating.value) {
        $('#ratingRadios').addClass("is-invalid");
        isValidComment = false;
    }

    if(isValidComment) {
        // Prepare url
        url = "http://localhost/infs3202project/app/api/addComment.php?rid={0}&comment={1}&rating={2}".format(rid, comment, rating.value);
        // url = "http://localhost/TheRecipesProject/app/api/addComment.php?rid={0}&comment={1}&rating={2}".format(rid, comment, rating.value);
        // url = "https://infs3202-df3fe271.uqcloud.net/infs3202project/app/api/addComment.php?rid={0}&comment={1}&rating={2}".format(rid, comment, rating.value);
        // Ajax request
        $.ajax({
            url: url,
            success: function(result){
                // Clear comment and rating
                $('#commentText').val("");
                rating.checked = false;

                // Handle result
                console.log(result);
                var json = JSON.parse(result);
                if(json.success == false) {
                    // TODO: handle error
                } else {
                    commentHTML = $($.parseHTML(json.content));
                    $("#commentsArea").prepend(commentHTML.hide());
                    commentHTML.slideDown('slow');
                }
            },
            error: function() {
                console.log("Uh-oh");
            }
        });
    }
};

/**
 * String formatting function
 * replaces {number} with string specified by argument to function call
 */
String.prototype.format = function () {
    var args = [].slice.call(arguments);
    return this.replace(/(\{\d+\})/g, function (a){
        return args[+(a.substr(1,a.length-2))||0];
    });
};
