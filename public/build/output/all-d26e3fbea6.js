$(document).ready(function() {
   
    (function() {
        $("#search_button").on('click', function() {
            var value = $("#search_key").val();
            console.log(value);
            $.get('students/search?data=' + value, function(data) {
                console.log(data);
            }); 
        });
    })();
});
//# sourceMappingURL=all.js.map