@extends('app')

@section('content')

<div id='un-assign'>
    <div class="element ui-state-default publisher" id="1">publisher 1</div>
    <div class="element ui-state-default editor " id="2">publisher 2</div>
    <div class="element ui-state-default operator" id="3">publisher 3</div>
</div>

<div id="publisher" style="font-size:0">
    
    <div class="element ui-state-default publisher" id="4">publisher 4</div>
    <div class="element ui-state-default publisher" id="5">publisher 5</div>
    <div class="element ui-state-default publisher" id="6">publisher 6</div>
    
    <div id="editor">
        <div class="element ui-state-default editor" id="7">Editor 7</div>
        <div class="element ui-state-default editor" id="8">Editor 8</div>
        <div class="element ui-state-default editor" id="9">Editor 9</div>

        <div id="operator">
            <div class="element ui-state-default operator" id="10">operator 10</div>
            <div class="element ui-state-default operator" id="11">operator 11</div>
        </div>    
    </div>
</div>


@stop