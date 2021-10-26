<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Academic_year;
use App\Models\Semester;

class CurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $years = Academic_year::with(['semesters'])->get();
        return view('academics.curriculum.index', compact('years'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('academics.curriculum.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create year
        $year = Academic_year::create(array_merge($request->all()));
        //create semesters
        foreach ($request->semester as $key => $sem) {
            $data = new Semester();
            $data->user_id = $request->user_id;
            $data->academic_year_id = $year->id;
            $data->semester = $sem;
            $data->save();
        }

        return back()->with('message', 'Curriculum created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('academics.curriculum.show');
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

    public function semester($id){
        $semesters = Semester::where('academic_year_id', $id)->get();
        return $semesters;
    }
}
