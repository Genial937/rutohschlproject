<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Department;
use Spatie\Permission\Models\Role;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::all();
        $departments = Department::all();
        $courses = Course::all();
        $students = User::where('users.role', 'Student')
        ->join('schools', 'schools.id', '=', 'users.school_id')
        ->join('departments', 'departments.id', '=', 'users.department_id')
        ->join('courses', 'courses.id', '=', 'users.course_id')
        ->get(['*', 'users.id as student_id']);
        
        return view('students.index', compact('schools','departments','courses','students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = School::all();
        $departments = Department::all();
        $courses = Course::all();
        $roles = Role::all();
        return view('students.create', compact('schools','departments','courses', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create(array_merge($request->all(),
    [
        'password' => Hash::make($request->national_id),
        'role' => 'Student' 
    ]));

    //asssign role
    $user->assignRole('Student');
    return back()->with('message','Student created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('students.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
