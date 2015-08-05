
<div class="form-group">
    <label class="control-label col-md-2 col-md-offset-2">Mã sinh viên</label>
    <div class="col-md-6">
        <div class="form-group internal">
            <div class="col-md-6">
                {!! Form::text('student_code', null, ['class' => 'form-control']) !!}
                @if ($errors->has('student_code')) <p class="text-danger">{{ $errors->first('student_code') }}</p> @endif
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-2 col-md-offset-2">Họ tên</label>
    <div class="col-md-6">
        <div class="form-group internal">
            <div class="col-md-9">
                {!! Form::text('fullname', null, ['class' => 'form-control']) !!}
                @if ($errors->has('fullname')) <p class="text-danger">{{ $errors->first('fullname') }}</p> @endif
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2 col-md-offset-2">Giới tính</label>
    <div class="col-md-6">
        <div class="form-group internal">
            <div class="col-md-11">
                {!! Form::select('sex', $sex, null, ['class' => 'form-control']) !!}
                @if ($errors->has('sex')) <p class="text-danger">{{ $errors->first('sex') }}</p> @endif
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-2 col-md-offset-2">Ngày sinh</label>
    <div class="col-md-6">
        <div class="form-group internal">
            <div class="col-md-5">
                {!! Form::input('date', 'birthday', null, ['class' => 'form-control']) !!}
                @if ($errors->has('birthday')) <p class="text-danger">{{ $errors->first('birthday') }}</p> @endif
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-2 col-md-offset-2">Địa chỉ</label>
    <div class="col-md-6">
        <div class="form-group internal">
            <div class="col-md-11">
                {!! Form::text('address', null, ['class' => 'form-control']) !!}
                @if ($errors->has('address')) <p class="text-danger">{{ $errors->first('address') }}</p> @endif
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-sm-2">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-custom form-control col-md-4']) !!}
    </div>
</div>
        
        
        
<!--        <div class="form-group">   
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
        </div>-->

        
        

