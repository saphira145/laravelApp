$(document).ready(function() {
   
    (function() {
        $("#search_button").on('click', function() {
            var value = $("#search_key").val();
            $.get('students/search?data', function(data) {
                console.log(data);
            }); 
        });
    })();
});
//# sourceMappingURL=all.js.map