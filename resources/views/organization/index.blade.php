@extends('app')

@section('content')

<div class="" type='un-assigned' id="un-assigned">
    <div class="element ui-state-default publisher" id="1">
        <i class="fa fa-user"></i>
        <span>publisher 1</span>
    </div>
    <div class="element ui-state-default editor" id="1">
        <i class="fa fa-user"></i>
        <span>publisher 1</span>
    </div><div class="element ui-state-default publisher" id="1">
        <i class="fa fa-user"></i>
        <span>publisher 1</span>
    </div>
    <div class="element ui-state-default editor" id="1">
        <i class="fa fa-user"></i>
        <span>publisher 1</span>
    </div>
    <div class="element ui-state-default publisher" id="1">
        <i class="fa fa-user"></i>
        <span>publisher 1</span>
    </div><div class="element ui-state-default publisher" id="1">
        <i class="fa fa-user"></i>
        <span>publisher 1</span>
    </div><div class="element ui-state-default operator" id="1">
        <i class="fa fa-user"></i>
        <span>publisher 1</span>
    </div><div class="element ui-state-default publisher" id="1">
        <i class="fa fa-user"></i>
        <span>publisher 1</span>
    </div><div class="element ui-state-default editor" id="1">
        <i class="fa fa-user"></i>
        <span>publisher 1</span>
    </div>
    <div class="element ui-state-default publisher" id="1">
        <i class="fa fa-user"></i>
        <span>publisher 1</span>
    </div>
    <div class="element ui-state-default operator" id="1">
        <i class="fa fa-user"></i>
        <span>publisher 1</span>
    </div>
    
</div>

<div class="group-container">
    
    <div class="publisher-group group" type="publisher" style="font-size:0">
        <div class="group-heading">
            <span>Publisher 1</span>
            <a href="#" class="edit pull-right"><i class="fa fa-times"></i></a>
            <a href="#" class="edit pull-right"><i class="fa fa-pencil"></i></a>
        </div>
        <div class="group-body">
            <div class="element ui-state-default publisher" id="1">
                <i class="fa fa-user"></i>
                <span>publisher 4</span>
            </div>
            <div class="element ui-state-default publisher" id="2">
                <i class="fa fa-user"></i>
                <span>publisher 5</span>
            </div>
            <div class="element ui-state-default publisher" id="3">
                <i class="fa fa-user"></i>
                <span>publisher 6</span>
            </div>

            <div class="editor-group group" type="editor">
                <div class="group-heading">
                    <span>Editor 1</span>
                    <a href="#" class="edit pull-right"><i class="fa fa-times"></i></a>
                    <a href="#" class="edit pull-right"><i class="fa fa-pencil"></i></a>
                </div>
                <div class="group-body">
                    <div class="element ui-state-default editor" id="4">
                        <i class="fa fa-user"></i>
                        <span>publisher 7</span>
                    </div>
                    <div class="element ui-state-default editor" id="5">
                        <i class="fa fa-user"></i>
                        <span>publisher 8</span>
                    </div>


                    <div class="operator-group group" type="operator">
                        <div class="group-heading">
                            <span>Editor 1</span>
                            <a href="#" class="edit pull-right"><i class="fa fa-times"></i></a>
                            <a href="#" class="edit pull-right"><i class="fa fa-pencil"></i></a>
                        </div>
                        <div class="group-body">
                            <div class="element ui-state-default operator" id="6">
                                <i class="fa fa-user"></i>
                                <span>publisher 9</span>
                            </div>
                            <div class="element ui-state-default operator" id="7">
                                <i class="fa fa-user"></i>
                                <span>publisher 10</span>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</div>


<!--<div class="group" id="2" style="font-size:0">
    
    <div class="element ui-state-default publisher" id="8">
        <i class="fa fa-user"></i>
        <span>publisher 4</span>
    </div>
    <div class="element ui-state-default publisher" id="9">
        <i class="fa fa-user"></i>
        <span>publisher 5</span>
    </div>
    <div class="element ui-state-default publisher" id="10">
        <i class="fa fa-user"></i>
        <span>publisher 6</span>
    </div>
    
    <div class="editor-group">
        <div class="element ui-state-default editor" id="11">
            <i class="fa fa-user"></i>
            <span>publisher 7</span>
        </div>
        <div class="element ui-state-default editor" id="12">
            <i class="fa fa-user"></i>
            <span>publisher 8</span>
        </div>
        

        <div class="operator-group">
            <div class="element ui-state-default operator" id="13">
                <i class="fa fa-user"></i>
                <span>publisher 9</span>
            </div>
            <div class="element ui-state-default operator" id="14">
                <i class="fa fa-user"></i>
                <span>publisher 10</span>
            </div>
        </div>    
    </div>
</div>-->

@stop