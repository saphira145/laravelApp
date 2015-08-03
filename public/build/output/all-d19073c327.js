   
(function() {
    var search = {
        init : function() {
            this.$search_button = $("#search_button");
            this.bindEvents();
        },
        cacheDom : function() {
            this.$list_student = $(".list-student");
            this.$search_key = $("#search_key");
            this.search_key = this.$search_key.val();
            this.url = 'students/search?search_query=' + this.search_key;
        },
        bindEvents : function() {
            this.$search_button.on('click', this.searchAjax.bind(this));
        },
        searchAjax : function() {
            this.cacheDom();
            $.ajax({
                url : this.url,
                type : 'get',
                dataType: 'html',
                error : function() {
                    //
                },
                success : function(response) {
                    this.$list_student.html(response);
                }.bind(this)
            });
        }
    }
    search.init();
})();
//# sourceMappingURL=all.js.map