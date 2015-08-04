'use strict';
// sticky search
$(".search-box").sticky({ topSpacing: 0 });

// Search Ajax
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
            this.url = 'http://localhost/app/public/students/show?search_query=' + this.search_key;
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
                beforeSend : function() {
                    alert(1);
                    window.location.href = 'http://localhost/app/public/students';
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