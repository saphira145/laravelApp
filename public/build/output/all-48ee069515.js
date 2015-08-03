$(document).ready(function() {
   
    (function() {
        $("#search_button").on('click', function() {
            var value = $("#search_key").val();
            $.ajax({
                url : 'students/search?search_query=' + value,
                type : 'get',
                dataType: 'html',
                
                complete : function(response) {
                    $(".list-student").html(data);
                }
            });
//            $.get('students/search?search_query=' + value, function(data) {
//                $(".list-student").html(data);
//            }); 
        });
    })();
});
//# sourceMappingURL=all.js.map