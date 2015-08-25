@extends('app')

@section('content')
<div class="panel panel-primary manage-name">
    <div class="panel-heading">
        <h4>Heading</h4>
        <div class="col-xs-5 pull-right">
            <input type="text" class="form-control search-name">
        </div>
    </div>
    <div class="panel-body">
        <div class="input-group add-name">
            <input type="text" class="form-control name-input" name="fullname" aria-describedby="basic-addon1">
            <span class="input-group-btn" id="basic-addon1">
                <button class="btn save-name"><i class="fa fa-plus"></i>Save</button>
            </span>
        </div>
        
        <div class="name-list">
            
        </div>
        <!--list name render by js-->
        
<!--        <label class="xs-col-12 label-manager">
            <input type="text" class="hide" placeholder="Type new name">
            <span>testsetest</span>
            <a href="#" class="pull-right delete-name" ><i class="fa fa-trash-o"></i></a>
            <a href="#" class="pull-right edit-name" id=''><i class="fa fa-pencil-square-o"></i></a>
        </label>-->
    </div>
</div>

@stop