   
(function() {
    var search = {
        init : function() {
            this.cacheDome();
        },
        cacheDom : function() {
            $list_student = $(".list-student");
            $search_key = $("#search_key");
        }
        bindEvents : function() {
            
        }
    }
    $("#search_button").on('click', function() {
        var value = $("#search_key").val();
        $.ajax({
            url : 'students/search?search_query=' + value,
            type : 'get',
            dataType: 'html',
            error : function() {
                //
            },
            success : function(response) {
                $(".list-student").html(response);
            }
        });
    });
})();
//# sourceMappingURL=all.js.map