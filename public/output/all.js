
'use strict';

// Search ajax
var search = (function(){       

    // Varriables
    var $list_student = $(".list-student");
    var $search_button = $("#search_button");
    var $search_key = $("#search_key");
    var $ajax_loading = $(".ajax-loading");
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
                $ajax_loading.show();
            },
            error : function() {
                //
            },
            success : function(response) {
                $list_student.html(response);
            }
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
    
    function cacheValue(event) {
        pageIndex = $(event.target).attr("href").split("page=")[1];
        url = 'students/searchAndPaginateAjax?page=' + pageIndex;
        search_key = search.getSearchKey(); 
        if(search_key !== undefined) 
            url += '&search_key=' + search_key;
    }
    
    function paginateAjax(event) {
        event.preventDefault();
        cacheValue(event);
        $.ajax({
            url : url,
            type : 'get',
            dataType: 'html',
            error : function() {
                //
            },
            beforeSend : function(xhr) {
                (pageIndex === undefined) ? xhr.abort() : $(".ajax-loading").show();
            },
            success : function(response) {
                $list_student.html(response);
            }
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


var StudentManagement = (function() {
    // variable
    var $filter = $(".sex-filter");
    var $checkbox = $filter.find("li");
    var $body = $('body');
    var $editStudentForm = $('#edit-student-form');
    var $close = $('#close-student-modal');
    var id; // Current Student ID
    var methodRequest; // Method request: PUT for update,  POST for new

    // Bind event
    $checkbox.on('click', filter);
    $body.on('click', '.delete-student', deleteStudent);
    $body.on('click', '.edit-student', editStudent);
    $body.on('click', '#save-student', saveStudent);
    $body.on('click', '#create-student', createStudent);

    function filter(event) {
        if (event.target.tagName === 'LABEL') {
            return;
        }
        dataTable.ajax.reload();
    }
    function getCheckbox() {
        return $checkbox;
    }
    function createStudent() {
        var createUrl = '/students/create';
        $.ajax({
            url : createUrl,
            type : 'GET',
            success : function(response) {
                $editStudentForm.html(response);
                methodRequest = 'POST';
            }
        });
    }

    function deleteStudent(event) {
        event.preventDefault();
        if (!confirm('Are you sure you want to delete'))
            return;

        var deleteUrl = $(".delete-student").attr("data");
        $.ajax({
            'url' : deleteUrl,
            'type' : 'DELETE',
            'headers' : {
                'X-CSRF-Token' : $('#_token').val(),
            },
            success : function() {
                dataTable.ajax.reload(null, false);
            }
        });
    };

    function editStudent(event) {
        event.preventDefault();
        id = $(event.target).attr("data");
        var editUrl = "/students/"+ id +"/edit";

        $.ajax({
            url : editUrl,
            type : 'GET',
            success : function(response) {
                $editStudentForm.html(response);
                methodRequest = "PUT";
            }
        });
    } 

    function saveStudent() {
        var data = $editStudentForm.serialize();
        var saveUrl;
        if (methodRequest === 'PUT')
            saveUrl = '/students/'+ id;
        if (methodRequest === 'POST')
            saveUrl = '/students';
        $.ajax({
            url : saveUrl,
            type : 'PUT',
            data : data,
            headers : {
                'X-CSRF-Token' : $('#_token').val()
            },
            beforeSend : function() {
                this.type = methodRequest;
            },
            success : function(response) {
                switch(response.status) {
                    case 0:
                        $editStudentForm.html(response.html);
                        break;
                    case 1:
                    default:
                        dataTable.ajax.reload(null, false);
                        $close.trigger('click');
                }
            }
        });
    }

    return {
        getCheckbox : getCheckbox
    };

})();
//
var dataTable = $('#mytable').DataTable({
    processing : true,
    serverSide : true,
    ajax : {
        url : '/students/ajax',
        type : 'post',
        headers : {
            'X-CSRF-Token' : $('#_token').val()
        },
        data : function(param) {
            var filter = [];
            var $checkbox = StudentManagement.getCheckbox();
            $checkbox.each(function(){
                if ($(this).find('input').prop("checked")) {
                    filter.push($(this).find('input').val());
                }
            });
            param.filter = filter;
        }
    },
    columnDefs: [{
        targets: -1,
        data: null,
        render: function(data) {
            var template = "<a href='#' data='"+ data +"' class='edit-student' data-toggle='modal' data-target='#myModal'>Edit |</a>"
                         + "<a href='#' data='"+ data +"' class='delete-student'> Delete</a>";

            return template;
        }
    }],
    columns : [
        {'data' : 'student_code'},
        {'data' : 'fullname'},
        {'data' : 'birthday'},
        {'data' : 'sex'},
        {'data' : 'address'},
        {'data' : 'id'}
    ],
//        language : {
//            search : '132323'
//        }
});
    
var nameManager = (function(){
    
})();
    
//# sourceMappingURL=all.js.map
//# sourceMappingURL=all.js.map
//# sourceMappingURL=all.js.map
//# sourceMappingURL=all.js.map