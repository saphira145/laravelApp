'use strict';

// Search and Pagination Ajax
(function() {
    
    var search_key;
    
    // Search ajax
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
                beforeSend : function() {
                    //
                },
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
    };
    // Pagination ajax
    var pagination = {
        init : function() {
            this.cacheDom();
            this.bindEvents();
        },
        cacheDom : function() {
            this.$list_student = $(".list-student");
        },
        cacheValue : function() {
            if (this.pageIndex !== undefined)
                this.url = 'students/searchAndPaginateAjax?page=' + this.pageIndex;
            if(search_key !== undefined) 
                this.url += '&search_key=' + search_key;
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
    
    // Processing
    pagination.init();
    search.init();
    
})();

// sticky search
$(".search-box").sticky({ topSpacing: 0 });
//slide up message
$(".alert-success").delay(3000).slideUp();
//click delete button
$(".btn-delete").on('click', function() {
    if (!confirm("Bạn có muốn xóa?"))
        return false;
});
// validate form student
$("#create-student-form").validate({
    messages : {
        student_code : "Nhập mã sinh viên",
        fullname : "Nhập tên sinh viên",
        birthday : "Nhập ngày sinh",
        address : "Nhập địa chỉ"
    },
    errorClass : "error"
});

//# sourceMappingURL=all.js.map
//# sourceMappingURL=all.js.map