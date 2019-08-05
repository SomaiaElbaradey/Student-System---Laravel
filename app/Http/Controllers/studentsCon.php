<?php

namespace App\Http\Controllers;
use App\student;
use App\subject;

use Illuminate\Http\Request;


class StudentsCon extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $avg = Student::avg('degree');
     return view('students.main')->withStudents(Student::all())->withAvg($avg);;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('students.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $student=student::create(['name'=>request('name'),'degree'=>request('degree'),'subjectName'=>request('subjectName')]);
        $subject= subject::create(['subjectName'=>request('subjectName')]);
        //$teacher=Teacher::create(['teacherName'=>request('teacherName')]);
        $student->subjects()->attach($subject);
        //$student->teachers()->attach($teacher);
        return redirect('students');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    
    {
        

        return view('students.view')->withStudent($student);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student) {
        return view('students.edit', compact('student'));
    }
   
   


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student) {
        $student->name = $request->name;
        $student->degree = $request->degree;
        $student->save();
        return redirect()->route('students.index');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student) {

        $student->delete();
        
  
        return redirect('students');
      }
}
