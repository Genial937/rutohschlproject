<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Unit;
use App\Models\Exam;
use App\Models\Exam_student;
use App\Models\Exam_marks;
use AfricasTalking\SDK\AfricasTalking;

class ResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $exams = Exam::all();
        $search = null;
        return view('results.index', compact('exams','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = User::where('role', 'Student')->get();
        $exams = Exam::all();
        $search = null;
        $message = '';
        return view('results.create', compact('students','exams','search','message'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //store exam student
        //check if that result exist
       
        $check = Exam_student::where('user_id', $request->student_id)->where('exam_id', $request->exam_id)->first();
        if ($check) {
            $students = User::where('role', 'Student')->get();
            $exams = Exam::all();
            $search = null;
            $message = 'The result for that exam already exists!';
            return view('results.create', compact('students','exams','search','message'));
        } else {
          $exam =  Exam_student::create([
               'user_id' => $request->student_id,
               'exam_id' => $request->exam_id
           ]);

            //store marks plus units
            foreach ($request->unit_id as $key => $unit) {
                $score = $request->marks[$key];
                $result = new Exam_marks();
                $result->exam_student_id = $exam->id;
                $result->unit_id = $unit;
                $result->marks = $score;
                $result->save();
            }
        }

        $students = User::where('role', 'Student')->get();
        $exams = Exam::all();
        $search = null;
        $message = 'Results added successfully!';
        return view('results.create', compact('students','exams','search','message'));
        
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Exam_student::where('id', $id)->with(['students','results','exams'])->first();
        return view('results.show', compact('result'));
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

    public function search(Request $request){
        $student_id = $request->student_id;
        $exam_id = $request->exam_id;
        $student = User::where('id', $student_id)->first();
        $exam = Exam::where('id', $exam_id)->first();
        $school_id = $exam->school_id;
        $year = $exam->academic_year_id;
        $semester = $exam->semester_id;
        $course = $student->course_id;
        $units = Unit::where('school_id', $school_id)->where('academic_year_id', $year)->where('semester_id', $semester)->where('course_id', $course)->get();
        $search = $units;
        $message = '';
        return view('results.create', compact('units','search','student','exam','message'));
    }

    public function results(Request $request){
        $results = Exam_student::where('exam_id',$request->exam_id)->with(['students','results','exams'])->get();
        $search = $results;
        $exam = Exam::findOrFail($request->exam_id);
        //dd($results);
        return view('results.index', compact('results','search','exam'));
    }

    public function send_sms(Request $request, $id){
        $result = Exam_student::where('id', $id)->with(['students','results','exams'])->first();
        //get results together
        $student = $result->students->first_name.' '.$result->students->last_name;
        $exam = $result->exams->exam_title;
        $results = "";
        foreach ($result->results as $key => $mark) {
            $unit = Unit::findOrFail($mark->unit_id);
            $results .= "['".$unit->unit."' = '".$mark->marks."'],";
            // $score = [
            //     'Unit' => $unit->unit,
            //     'Score' => $mark->marks
            // ];
            // $results[] = $score;
        }

        
        // $scores = implode(",",$results);

        $message = 'Dear '.$student.' your '.$exam.' result is as follows: '.$results;
        $phone = $result->students->phone;
        //dd($phone, $message);
        $sms = $this->use_africa($phone, $message);

        if($sms){
            return "success";
        }

        //send sms
       
    }

    private function dispatch_sms($phone, $message){
        $url="https://bulk.api.mobitechtechnologies.com/api/sendsms";
            $ch = curl_init($url);
            $data = array(
                'api_key' => '60ab4a7759bf9',
                'username' => 'peakanddale',
                'sender_id' => 'AIC_NANDI',
                'message' => $message,
                'phone' => $phone,
            );
            //dd($data);
            $payload = json_encode($data);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Accept:application/json'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
            $result = curl_exec($ch);
            curl_close($ch);
            dd($result);
            return $result;
    }

    private function use_africa($phone,$message){
        $username = 'Thadeus'; // use 'sandbox' for development in the test environment
        $apiKey   = '5e0a291b75721efcd3d97e70de1c31242bbf7964cc968d47e20ff0eab311c532'; // use your sandbox app API key for development in the test environment
        $AT       = new AfricasTalking($username, $apiKey);

       // Get one of the services
      $sms      = $AT->sms();

     // Use the service
       $result   = $sms->send([
    'to'      => $phone,
    'message' => $message
      ]);
      return $result;
    }
}
