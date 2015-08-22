
<div class="form-group">
    <label class="control-label col-md-2 col-md-offset-2 required">Mã sinh viên</label>
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
                @if ($errors->has('student_code')) <label class="error">{{ $errors->first('student_code') }}</label> @endif
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-2 col-md-offset-2 required">Họ tên</label>
    <div class="col-md-6">
        <div class="form-group internal">
            <div class="col-md-11">
                <input type="text" class="form-control" id="fullname" name="fullname" value="{{ $student->fullname }}">
                @if ($errors->has('fullname')) <label class="error">{{ $errors->first('fullname') }}</label> @endif
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2 col-md-offset-2 required">Ngày sinh</label>
    <div class="col-md-6">
        <div class="form-group internal">
            <div class="col-md-11">
                <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $student->birthday }}">
                @if ($errors->has('birthday')) <label class="error">{{ $errors->first('birthday') }}</label> @endif
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-2 col-md-offset-2 required">Địa chỉ</label>
    <div class="col-md-6">
        <div class="form-group internal">
            <div class="col-md-11">
                <input type="text" class="form-control" id="address" name="address" value="{{ $student->address }}">
                @if ($errors->has('address')) <label class="error">{{ $errors->first('address') }}</label> @endif
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2 col-md-offset-2">Giới tính</label>
    <div class="col-md-6">
        <div class="form-group internal">
            <div class="col-md-11">
                <select class="form-control" id="sex" name="sex">
                    @foreach($sex as $key => $value)
                        <option value="{{ $key }}" @if ($student->sex == $key) selected @endif>{{ $value }}</option>
                    @endforeach
                </select>
                @if ($errors->has('sex')) <label class="error">{{ $errors->first('sex') }}</label> @endif
            </div>
        </div>
    </div>
</div>

<!--<div class="form-group">
    <div class="col-md-offset-4 col-sm-12 col-md-2">
        <button class="btn btn-custom form-control col-md-4"><i class="fa fa-edit"></i>Save</button>
    </div> 
</div>-->
