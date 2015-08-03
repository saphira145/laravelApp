{{-- Form::open(['route' => 'students.search']) --}}
    <div class="form-group">   
        {!! Form::text('search_key', null, ['class' => 'form-control', 'id' => 'search_key']) !!}
    </div>
    {!! Form::submit('Tìm', ['class' => 'btn btn-primary', 'id' => 'search_button']) !!}
{{-- Form::close() --}}