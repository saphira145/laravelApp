<div class="form-group">   
    {!! Form::label('student_code', 'Mã sinh viên:') !!}
    {!! Form::text('student_code', null, ['class' => 'form-control']) !!}
    @if ($errors->has('student_code')) <p class="text-danger">{{ $errors->first('student_code') }}</p> @endif
</div>

<div class="form-group">   
    {!! Form::label('fullname', 'Họ tên:') !!}
    {!! Form::text('fullname', null, ['class' => 'form-control']) !!}
    @if ($errors->has('fullname')) <p class="text-danger">{{ $errors->first('fullname') }}</p> @endif
</div>

<div class="form-group">   
    {!! Form::label('birthday', 'Ngày sinh:') !!}
    {!! Form::input('date', 'birthday', null, ['class' => 'form-control']) !!}
    @if ($errors->has('birthday')) <p class="text-danger">{{ $errors->first('birthday') }}</p> @endif
</div>

<div class="form-group">   
    {!! Form::label('sex', 'Giới tính:') !!}
    {!! Form::select('sex', $sex, null, ['class' => 'form-control']) !!}
    @if ($errors->has('sex')) <p class="text-danger">{{ $errors->first('sex') }}</p> @endif
</div>

<div class="form-group">   
    {!! Form::label('address', 'Địa chỉ:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
    @if ($errors->has('address')) <p class="text-danger">{{ $errors->first('address') }}</p> @endif
</div>

{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
