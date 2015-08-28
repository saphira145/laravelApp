@extends('app')

@section('content')

<div id='un-assign'>
    <div class="element ui-state-default publisher">publisher 1</div>
    <div class="element ui-state-default publisher">publisher 2</div>
    <div class="element ui-state-default publisher">publisher 3</div>
</div>

<div id="publisher" style="font-size:0">
    
    <div class="element ui-state-default publisher">publisher 4</div>
    <div class="element ui-state-default publisher">publisher 5</div>
    <div class="element ui-state-default publisher">publisher 6</div>
    
    <div id="editor">
        <div class="element ui-state-default editor">Editor 7</div>
        <div class="element ui-state-default editor">Editor 8</div>
        <div class="element ui-state-default editor">Editor 9</div>

        <div id="operator">
            <div class="element ui-state-default operator">operator 10</div>
            <div class="element ui-state-default operator">operator 11</div>
        </div>    
    </div>
</div>


@stop