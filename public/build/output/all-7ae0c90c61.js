   
(function() {
    var search = {
        init : function() {
            this.cacheDom();
            this.bindEvents();
        },
        cacheDom : function() {
            this.$list_student = $(".list-student");
            this.$search_key = $("#search_key");
            this.search_key = this.$search_key.val();
            this.url = 'students/search?search_query=' + value;
        },
        bindEvents : function() {
            $search_key.on('click', searchAjax.bind(this));
        },
        
        searchAjax : function() {
            $.ajax({
                url : this.url,
                type : 'get',
                dataType: 'html',
                error : function() {
                    //
                },
                success : function(response) {
                    $(".list-student").html(response);
                }
            });
        }
    }
    search.init();
//    $("#search_button").on('click', function() {
//        var value = $("#search_key").val();
//        $.ajax({
//            url : 'students/search?search_query=' + value,
//            type : 'get',
//            dataType: 'html',
//            error : function() {
//                //
//            },
//            success : function(response) {
//                $(".list-student").html(response);
//            }
//        });
//    });
})();
//# sourceMappingURL=all.js.map