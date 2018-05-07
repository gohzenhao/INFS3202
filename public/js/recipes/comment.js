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
        url = "http://localhost/infs3202project/app/ajax/addComment.php?rid={0}&comment={1}&rating={2}".format(rid, comment, rating.value);
        // Ajax request
        $.ajax({
            url: url, 
            success: function(result){
                // Clear comment and rating
                $('#commentText').val("");
                rating.checked = false;

                // Handle result
                console.log("ajax success: " + result);
                var json = JSON.parse(result);
                if(json.success == false) {
                    // TODO: handle error
                } else {
                    $("#commentsArea").append(json.commentElement);
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