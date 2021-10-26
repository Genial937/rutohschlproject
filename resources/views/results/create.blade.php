@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Results</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Results</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="{{ route('results.index') }}" class="btn add-btn"><i class="fa fa-plus"></i> All Results</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Add Result</h2>
                </div>
                <div class="card-body">
                    @if ($message)
                        <div class="alert alert-success">
                            <a href="#" data-dismiss="alert" class="close">&times;</a>
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @if ($search === null)
                    <form action="{{ route('exams.search') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Student</label>
                                    <select name="student_id" id="" class="form-control">
                                        <option value="" selected disabled>Select</option>
                                        @foreach ($students as $student)
                                            <option value="{{ $student->id }}">{{ $student->first_name }} {{ $student->last_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Exam</label>
                                    <select name="exam_id" id="" class="form-control">
                                        <option value="" selected disabled>Select</option>
                                        @foreach ($exams as $exam)
                                            <option value="{{ $exam->id }}">{{ $exam->exam_title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-primary pull-right">Next</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @else
                        <form action="{{ route('results.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="student_id" value="{{ $student->id }}"> 
                            <input type="hidden" name="exam_id" value="{{ $exam->id }}">
                            <table class="table table-sm table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="2">Student Name: {{ $student->first_name }} {{ $student->last_name }}</th> 
                                    </tr>
                                    <tr>
                                        <th colspan="2">Exam: {{  $exam->exam_title  }}</th>
                                    </tr>
                                    <tr>
                                        <th>Unit</th>
                                        <th>Marks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($units as $unit)
                                    <tr>
                                        <td>{{ $unit->unit }}</td>
                                        <td>
                                            <input type="text" name="marks[]" class="form-control">
                                            <input type="hidden" name="unit_id[]" value="{{ $unit->id }}">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <hr>
                            <div class="form-group">
                                <button class="btn btn-dark pull-right">Save</button>
                            </div>
                        </form>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection
