// When the page loads, run this code
$(document).ready(function() {
    // Call the search() function when the 'go' button is clicked
    $("#go").click(search);
});

function search() {
    // What's in the text box?
    var q = $("#q").val();
    // Send request to the server
    // The first argument should be to wherever you save the search page
    // The second argument sends a query string parameter
    // The third argument is the function to run with the results
    $.get('/search.php', { 'q': q }, showResults);
}

// Handle the results
function showResults(data) {
    var html = '';
    // If we got some results...
    if (data.length > 0) {
        html = '<ul>';
        // Build a list of them
        for (var i in data) {
            var escaped = $('<div/>').text(data[i]).html();
            html += '<li>' + escaped + '</li>';
        }
        html += '</ul>';
    } else {
        html = 'No results.';
    }
    // Put the result HTML in the page
    $("#output").html(html);
}
