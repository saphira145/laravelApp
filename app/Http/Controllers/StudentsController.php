<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Symfony\Component\HttpFoundation\Response;

class StudentsController extends Controller
{
    /**
     * Number of student records will be displayed
     */
    CONST PAGE = 10;
    
    /**
     * @var \App\Student 
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
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(StudentRequest $request)
    {
        $this->student->create($request->all());
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
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
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(StudentRequest $request, $id)
    {
        $this->student->findOrFail($id)->update($request->all());
        return redirect()->route('students.index');
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
        return redirect()->route('students.index');
    }
    
    /**
     * Search students
     * 
     * @return Response
     */
    public function search(Request $request) {
        $seachKey = $request->input('search_key');
        $collection = $this->student->search($seachKey);
        $students = new LengthAwarePaginator($collection, count($collection), self::PAGE);
        return view('students.index', compact('students'));
    }
}
