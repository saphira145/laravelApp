$(document).ready(function() {
   
    (function() {
        $("#search_button").on('click', function() {
            var value = $("#search_key").val();
            $.ajax({
                url : 'students/search?search_query=' + value,
                type : 'get',
                dataType: 'html',
                
                success : function(response) {
                    $(".list-student").html(response);
                }
            });
        });
    })();
});
//# sourceMappingURL=all.js.map