{!! Form::open(['route' => 'students.search']) !!}
    <div class="form-group">   
        {!! Form::text('search_key', null, ['class' => 'form-control']) !!}
    </div>
    {!! Form::submit('Tìm', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}