
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
    
var nameManager = (function() {
    var $manageName = $(".manage-name");
    var $nameList = $manageName.find(".name-list");
    var $addName = $(".add-name");
    var $body = $("body");    
    var data = [];
    var limit = 20;
    var offset = 0;
    
    // Bind Events
    $body.on('click', '.save-name', saveName);
    $body.on('click','.delete-name', deleteName);
    $body.on('click', '.edit-name', editName);
    $body.on('keyup', '.search-name', searchName);
    $body.on('click', '.cancel-name', toggleFocus);
    
    //Get Fullname List
    getNameList();
    
    function getNameList() {
        var url = '/students/getName';
        $.ajax({
            type : 'POST',
            url : url,
            data : {
                limit : limit,
                offset : offset
            },
            headers : {
                'X-CSRF-Token' : $('#_token').val()
            },
            beforeSend : function() {
                $nameList.addClass('relative-pos blur-loading');
            },
            success : function(response) {
                data = data.concat(response);
                renderList(response);
                offset +=limit;
                $(window).bind('scroll', bindScroll);
            },
            complete : function() {
                $nameList.removeClass('relative-pos blur-loading');
            }
        });
    }
    
    function renderList(data) {
        for(var length=data.length, i=0; i < length; i++) {
            var element = render(data[i]);
            $nameList.append(element);
        }
    }
    function bindScroll() {
        if ($(window).height() + $(window).scrollTop() > $(document).height() - 100) {
            loadMore();
        }
    }
    function loadMore() {
        getNameList();
        $(window).unbind('scroll');
    }
    function searchName(event) {
        var $labelManager = $('.label-manager');
        var searchKey = $(event.target).val();
        var result = processSearchData(searchKey, data);
        $labelManager.remove();
        renderList(result);
    }
    function processSearchData(searchKey, data) {
        var result = [];
        for(var i=0, length=data.length; i<length; i++) {
            if (data[i].fullname.toLowerCase().indexOf(searchKey.toLowerCase()) > -1) {
                result.push(data[i]);
            }
        }
        return result;
    }
    
    function toggleFocus(event) {
        event.preventDefault();
        var $element = $(event.target).parent().parent();
        var $nameLabel = $element.find('span');
        var $editInput = $element.find('input');
        var $cancel = $element.find('.cancel-name');
        
        $element.toggleClass("focus-edit");
        $nameLabel.toggleClass('hide');
        $cancel.toggleClass('hide');
        $editInput.toggleClass('hide').focus();
    }
    function editName(event) {
        event.preventDefault();
        var $element = $(event.target).parent().parent();
        var $nameLabel = $element.find('span');
        var $editInput = $element.find('input');
        
        // Focus input when on edit mode
        toggleFocus(event);

        var id = $(event.target).parent('a').attr('id'); 
        
        if (!$element.find("input").hasClass("hide")) {
            $editInput.val($nameLabel.text());
        }

        if($element.find("input").hasClass("hide")) {
            var url = "/students/editName";
            var fullname = $editInput.val();
            
            $.ajax({
                url : url,
                type : 'PUT',
                headers : {
                    'X-CSRF-Token' : $('#_token').val()
                },
                data : {
                    id : id,
                    fullname : fullname
                },
                beforeSend : function() {
                    $nameList.addClass('relative-pos blur-loading');
                },
                success : function(response) {
                    if (response.status === 1) {
                        $nameLabel.text(response.fullname);
                        refreshData(id, fullname, 'edit');
                    }
                },
                complete : function() {
                    $nameList.removeClass('relative-pos blur-loading');
                }
            });
        }
        
    }
    function deleteName(event) {
        event.preventDefault();
        var url = '/students/deleteName';
        var id = $(event.target).parent('a').attr('id');
        $.ajax({
            url : url,
            type : 'DELETE',
            data : {
                id : id
            },
            headers : {
                'X-CSRF-Token' : $('#_token').val()
            }, 
            beforeSend : function() {
                $nameList.addClass('relative-pos blur-loading');
            },
            success : function(response) {
                if (response.status === 1) {
                    $(event.target).parent().parent().remove();
                    $(event.target).parent('.label-manager').remove();
                    refreshData(id, null, 'delete');
                }
            },
            complete : function() {
                $nameList.removeClass('relative-pos blur-loading');
            }
        });
    }
    function saveName() {
       var $nameInput = $addName.find("input");
       var fullname = $nameInput.val();
       var url = '/students/saveName';
       $.ajax({
            url : url,
            type : 'POST',
            data : {
                fullname : fullname
            },
            headers : {
                'X-CSRF-Token' : $('#_token').val()
            },
            beforeSend : function() {
                $nameList.addClass('relative-pos blur-loading');
            },
            success: function(response) {
                if (response.status === 1) {
                    var element = render(response.data);
                    $nameList.prepend(element);
                    refreshData(response.data.id, response.data.fullname, 'create');
                }
            },
            complete : function() {
                $nameList.removeClass('relative-pos blur-loading');
            }
       });
    }
    
    function refreshData(id, fullname, action) {
        switch(action) {
            case 'edit' :
                for(var i=0, length=data.length; i<length; i++) {
                    if (data[i].id == id) {
                        data[i].fullname = fullname;
                        break;
                    }
                }
                break;
            case 'delete' :
                for(var i=0, length=data.length; i<length; i++) {
                    if (data[i].id == id) {
                        data.splice(i, 1);
                        break;
                    }
                }
                break;
            case 'create' :
            default :
                data.unshift({id : id, fullname : fullname});
                
        }
    }
    function render(data) {
        var template = '<label class="xs-col-12 label-manager">'
                        + '<input type="text" id="editInput" class="hide" placeholder="Type new name">'
                        + '<span>'+ data.fullname +'</span>'
                        + '<a href="#" class="pull-right delete-name" id='+ data.id +'><i class="fa fa-trash-o"></i></a>'
                        + '<a href="#" class="pull-right cancel-name hide"><i class="fa fa-ban"></i></a>'
                        + '<a href="#" class="pull-right edit-name" id='+ data.id +'><i class="fa fa-pencil-square-o"></i></a>'
                     + '</label>';
        return template;              
    }
})();


$('.element').draggable({

    helper: "clone",
    revert: 'invalid',
    start : function() {
        
    },
    drag: function () {
        
    },
    stop: function (event, ui) {

    }
});

$("#publisher").droppable({
    tolerance : 'fit',
    accept: '.publisher',
    greedy : true,
    drop: function (event, ui) {
        ui.draggable.detach().prependTo($(this));
    },
    over : function() {

    }

});
$("#editor").droppable({
    tolerance : 'fit',
    accept: '.editor',
    greedy : true,
    
    drop: function (event, ui) {
        ui.draggable.detach().prependTo($(this));
    },
    

});

$('#operator').droppable({
    tolerance : 'fit',
    accept: '.operator',
    greedy : true,
    drop: function (event, ui) {
        ui.draggable.detach().prependTo($(this));
    },
    over : function() {
    }

});

$("#un-assign").droppable({
    tolerance : 'fit',
    accept: '.element',
    greedy : true,
    drop: function (event, ui) {
        ui.draggable.detach().prependTo($(this));
    }

});
$('#publisher, #editor, #operator').sortable();

var $editor = $("#editor");
var editor;
var editorChildLength = $editor.children(".editor").length;
$editor.find(".editor").each(function(index) {
    var obj =  {  } 
})



    
