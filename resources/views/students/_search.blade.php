   
{!! Form::text('search_key', null, ['id' => 'search_key', 'placeholder' => 'Tìm kiếm theo tên, địa chỉ, mã sinh viên...']) !!}

{!! Form::button('Tìm', ['class' => 'btn', 'id' => 'search_button', 'onclick' => 'return false;']) !!}
