'use strict';

// Search ajax
var search = (function(){       

    // Varriables
    var $list_student = $(".list-student");
    var $search_button = $("#search_button");
    var $search_key = $("#search_key");
    var url;
    var search_key;

    // Bind Events
    $search_button.on('click', searchAjax);
    $search_key.keypress(enterPress);

    function cacheValue() {
        search_key = $search_key.val();
        url = 'students/searchAndPaginateAjax?search_key=' + search_key;
    }

    function searchAjax() {
        cacheValue();
        $.ajax({
            url : url,
            type : 'get',
            dataType: 'html',
            beforeSend : function() {
                $(".ajax-loading").show();
            },
            error : function() {
                //
            },
            success : function(response) {
                $list_student.html(response);
            }.bind(this)
        });
    }
    function enterPress(e) {
        if (e.which === 13) {
            $search_button.click();
        }
    }

    function getSearchKey() {
        return search_key;
    }

    return {
        getSearchKey : getSearchKey
    };

})();

// Pagination ajax
var pagination = (function(){
    
    // Varriables
    var $list_student = $(".list-student");
    var url;
    var search_key;
    var pageIndex;     
    
    // Bind Events
    $list_student.on('click', '.pagination > li', paginateAjax.bind(this));
    
    function cacheValue() {
        url = 'students/searchAndPaginateAjax?page=' + pageIndex; 
        if(search_key !== undefined) 
            url += '&search_key=' + search_key;
    }
    
    function paginateAjax(e) {
        e.preventDefault();
        pageIndex = $(e.target).attr("href").split("page=")[1];
        search_key = search.getSearchKey();
        cacheValue();
        $.ajax({
            url : url,
            type : 'get',
            dataType: 'html',
            error : function() {
                //
            },
            beforeSend : function(xhr) {
                (pageIndex === undefined) ? xhr.abort() : $(".ajax-loading").show();
            }.bind(this),
            success : function(response) {
                $list_student.html(response);
            }.bind(this)
        });
    }
})();
    

// sticky search
$(".search-box").sticky({ topSpacing: 0 });
//slide up message
$(".alert-success").delay(3000).slideUp();
//confirm delete button
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
    }
});

//# sourceMappingURL=all.js.map
//# sourceMappingURL=all.js.map
//# sourceMappingURL=all.js.map
//# sourceMappingURL=all.js.map