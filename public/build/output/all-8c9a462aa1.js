$(document).ready(function() {
   
    (function() {
        $("#search_button").on('click', function() {
            var value = $("#search_key").val();
            $.get('students/search?search_query=' + value, function(data) {
                alert(1);
                $("#list-student").html(data);
            }); 
        });
    })();
});
//# sourceMappingURL=all.js.map