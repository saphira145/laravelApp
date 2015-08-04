{!! link_to_route('students.create', 'Nhap sinh vien moi', [], ['class' => 'btn btn-primary']) !!}
<table class="table-striped table list-student-table">
    <caption>Hệ thống quản lý sinh viên</caption>
    <tr>
        <th>Mã sinh viên</th>
        <th>Họ tên</th>
        <th>Ngày sinh</th>
        <th>Giới tính</th>
        <th>Địa chỉ</th>
    </tr>
    @foreach ($students as $student)
    <tr>
        <td>{{ $student->student_code }}</td>
        <td>
            {!! link_to_route('students.edit', $student->fullname, [$student->id]) !!}
        </td>
        <td>{{ date("d-m-Y", strtotime($student->birthday)) }}</td>
        <td>{{ $student->sex }}</td>
        <td>{{ $student->address}}</td>
    </tr>
    @endforeach

</table>