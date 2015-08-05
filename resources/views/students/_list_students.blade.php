
{!! link_to_route('students.create', 'Nhập sinh viên mới', [], ['class' => 'btn btn-new']) !!}

<table class="table-striped table list-student-table">
    
    <thead>
        <tr>
            <th>Mã sinh viên</th>
            <th>Họ tên</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
        <tr>
            <td data-label="Mã sinh viên">{{ $student->student_code }}</td>
            <td data-label="Họ tên">
                {!! link_to_route('students.edit', $student->fullname, [$student->id]) !!}
            </td>
            <td data-label="Ngày sinh">{{ date("d-m-Y", strtotime($student->birthday)) }}</td>
            <td data-label="Giới tính">{{ $student->sex }}</td>
            <td data-label="Địa chỉ">{{ $student->address}}</td>
        </tr>
        @endforeach
    </tbody>

</table>

<div class="text-right">
    @include('pagination', ['paginator' => $students])
</div>