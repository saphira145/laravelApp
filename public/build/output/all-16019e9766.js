'use strict';
$(".search-box").sticky({ topSpacing: 0 });
       
$("li.active").next().addClass('next');
$("li.active").prev().addClass('prev');

(function() {
    var search = {
        init : function() {
            this.cacheDom();
            this.bindEvents();
        },
        cacheDom : function() {
            this.$list_student = $(".list-student");
            this.$search_button = $("#search_button");
            this.$search_key = $("#search_key");
        },
        cacheValue : function() {
            this.search_key = this.$search_key.val();
            this.url = 'students/show?search_query=' + this.search_key;
        },
        bindEvents : function() {
            this.$search_button.on('click', this.searchAjax.bind(this));
            this.$search_key.keypress(this.enterPress.bind(this));
        },
        searchAjax : function() {
            this.cacheValue();
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
        },
        enterPress : function(e) {
            if (e.which === 13) {
                this.$search_button.click();
            }
        }
    }
    search.init();
})();

//# sourceMappingURL=all.js.map