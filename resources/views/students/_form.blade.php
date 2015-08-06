
<div class="form-group">
    <label class="control-label col-md-2 col-md-offset-2">Mã sinh viên</label>
    <div class="col-md-6">
        <div class="form-group internal">
            <div class="col-md-11">
                <input type="text" id="student_code" name="student_code" 
                    class="form-control required" placeholder="Nhập mã sinh viên" 
                    @if (isset($student))
                        value="{{ $student->student_code }}" 
                    @endif
                    @if (Route::currentRouteName() === 'students.edit')
                        disabled
                    @endif 
                >
                @if ($errors->has('student_code')) <p class="text-danger">{{ $errors->first('student_code') }}</p> @endif
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-2 col-md-offset-2">Họ tên</label>
    <div class="col-md-6">
        <div class="form-group internal">
            <div class="col-md-11">
                {!! Form::text('fullname', null, ['class' => 'form-control required', 'placeholder' => 'Nhập tên sinh viên']) !!}
                @if ($errors->has('fullname')) <p class="text-danger">{{ $errors->first('fullname') }}</p> @endif
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2 col-md-offset-2">Ngày sinh</label>
    <div class="col-md-6">
        <div class="form-group internal">
            <div class="col-md-11">
                {!! Form::input('date', 'birthday', null, ['class' => 'form-control required','placeholder'=>'Nhập ngày sinh']) !!}
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
                {!! Form::text('address', null, ['class' => 'form-control required', 'placeholder' => 'Nhập Địa chỉ']) !!}
                @if ($errors->has('address')) <p class="text-danger">{{ $errors->first('address') }}</p> @endif
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
    <div class="col-md-offset-4 col-sm-12 col-md-2">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-custom form-control col-md-4']) !!}
    </div>
</div>
