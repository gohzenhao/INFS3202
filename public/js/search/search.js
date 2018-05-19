/**
 * On key up query database for matching similar recipe titles to input in search bar and 
 * append top 5 suggestions to "Suggestions: " display element
 * 
 * TODO: BUG - add escape character '\' before any ' characters from suggestionList[i]
 */
$('#search-bar').on('keyup', function(event) {
    var query = this.value;
    console.log(query);

    url = "http://localhost/infs3202project/app/api/liveSearch.php?queryString=" + query;
    // url = "http://localhost/TheRecipesProject/app/api/liveSearch.php?queryString=" + query;
    // url = "https://infs3202-df3fe271.uqcloud.net/infs3202project/app/api/liveSearch.php?queryString=" + query;
    
    // Ajax request
    $.ajax({
        url: url,
        success: function(result){
            // Clear suggestions list
            suggestionHTML = $('#hint');
            suggestionHTML.empty();

            // Handle result
            var json = JSON.parse(result);
            var suggestionList = json.topSuggestions;
        
            // ERROR: i will go out of bounds
            for (var i in suggestionList) {
                var element = '<a class="btn" style="text-decoration: underline;color: blue;" onclick="fillSearchInput(\'' + 
                    suggestionList[i] + '\')">' + suggestionList[i] + '</a>';
                suggestionHTML.append(element);
            }
            
        }
    });
});

/**
 * Fills value of search bar with text
 * 
 * @param {String}  
 */
function fillSearchInput($text) {
    console.log($text);
    var inputField = $('#search-bar');
    inputField.val($text);
    inputField.next().children().click();
}