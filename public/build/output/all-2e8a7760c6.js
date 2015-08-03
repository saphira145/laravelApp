$(document).ready(function() {
   
    (function() {
        $("#search_button").on('click', function() {
            $.get('students/search', function(data) {
                console.log(data);
            }); 
        });
    })();
});
//# sourceMappingURL=all.js.map