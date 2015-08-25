<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentsController extends Controller
{
    /**
     * Number of student records will be displayed
     */
    CONST PAGE = 2;
    
    /**
     * @var Student 
     */
    protected $student;
 


    public function __construct(Student $student) {
        $this->student = $student;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $students = $this->student->paginate(self::PAGE)->setPath('students');
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('students._form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validate = $this->student->validate($request, ['student_code' => 'required']);
        
        if ($validate->fails()) {
            $html = view('students._form')->withErrors($validate);
            return response()->json([
                'status' => 0,
                'html'  => $html->render()
            ]);
        }
        
        $this->student->create($request->all());
        return response()->json(['status' => 1]);
//        session()->flash("flash_message", "Thêm mới thành công sinh viên " . $request->input("fullname"));
//        return redirect()->route('students.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $student = $this->student->findOrFail($id);
        return view('students._form', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $validator = $this->student->validate($request);
        
        if ($validator->fails()) {
            $student = json_decode(json_encode($request->all()), FALSE);
            $html = view('students._form', compact('student'))->withErrors($validator);
            return response()->json([
                'status' => 0,
                'html' => $html->render()
            ]);
        }
        $this->student->findOrFail($id)->update($request->except('student_code'));
        return response()->json([
            'status' => 1,
            'message' =>'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->student->findOrFail($id)->delete();
//        session()->flash("flash_message", "Xóa thành công sinh viên");
//        return redirect()->route('students.index');
        
    }
    
    /**
     * 
     * @return Response
     */
    public function searchAndPaginateAjax(Request $request) {
        $search_key = $request->input('search_key');
        $page = $request->input('page');
        if ($search_key) {
            $students = $this->student->getSearchResults($search_key, $page, self::PAGE);
        } else {
            $students = $this->student->paginate(self::PAGE)->setPath('students');
        }
        
        return view('students._list_students', compact('students'));
    }
    
    /**
     * Get list students for table data
     * @param Request $request
     * @return type
     */
    public function ajax(Request $request) {
        $order = $request->input('order');
        $search = $request->input('search');
        $limit = (int)$request->input('length');
        $offset = (int)$request->input('start');
        $draw = (int)$request->input('draw');
        $filter = $request->input('filter');
        
        // Get list student with order, search, pagination and filter
        $data = $this->student->getListStudents($limit, $offset, $order, $search, $filter);
        // Escape html for students
        $students = $this->student->escapeHtml($data['students']);
        
        $json = [
            'data' => $students,
            'recordsTotal' => $data['totalRecords'],
            'draw' => $draw,
            'recordsFiltered' => $data['totalRecords']
        ];
        return response()->json($json);
    }
    
    public function listStudents() {
        return view('students.tabledata');
    }
    
    public function nameManager() {
        return view('students.nameManager');
    }
    
    public function studentsName() {
        $fullname = $this->student->select(['fullname', 'id'])->skip(0)->take(20)->orderBy('updated_at', 'desc')->get();
        return response()->json($fullname);
    }
    
    public function saveName(Request $request){
        $fullname = $request->input('fullname');
        $student = $this->student->create(['fullname' => $fullname]);
        return response()->json([
            'data' => ['id' => $student->id, 'fullname' => $fullname],
            'status' => 1,
        ]);
    }
    public function deleteName(Request $request) {
        $id = $request->input('id');
        $this->student->findOrFail($id)->delete();
        return response()->json(['status' => 1]);
    }
    public function editName(Request $request) {
        $id = $request->input('id');
        $fullname = $request->input('fullname');
        $this->student->findOrFail($id)->update(['fullname' => $fullname]);
        return response()->json([
            'status' => 1,
            'fullname' => $fullname
        ]);
    }
}
