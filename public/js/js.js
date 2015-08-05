'use strict';


// sticky search
$(".search-box").sticky({ topSpacing: 0 });


// Search Ajax
(function() {
    
    pagination.init();
    search.init();
    var search_key;
        
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
            search_key = this.$search_key.val();
            this.url = 'students/searchAndPaginateAjax?search_key=' + search_key;
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
//                    var data = $.json(response);
                    this.$list_student.html(response);
                }.bind(this)
            });
        },
        enterPress : function(e) {
            if (e.which === 13) {
                this.$search_button.click();
            }
        }
    };
     
    
    var pagination = {
        init : function() {
            this.cacheDom();
            this.bindEvents();
        },
        cacheDom : function() {
            this.$list_student = $(".list-student");
        },
        cacheValue : function() {
            this.url = 'students/searchAndPaginateAjax?page=' + this.pageIndex;
            if(search_key) {
                this.url += '&search_key=' + search_key;
            }
        },
        bindEvents : function() {
            this.$list_student.on('click', '.pagination > li', this.paginateAjax.bind(this));
        },
        paginateAjax : function(e) {
            e.preventDefault();
            this.pageIndex = $(e.target).attr("href").split("page=")[1];
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
        }
    };
    
})();

//# sourceMappingURL=all.js.map