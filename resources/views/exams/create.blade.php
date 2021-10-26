@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Exams</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Exams</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="{{ route('exams.index') }}" class="btn add-btn"><i class="fa fa-plus"></i> All Exams</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="card">
                <div class="card-header">
                    <h2>Add Exam</h2>
                </div>
                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success">
                            <a href="javascript:void(0)" data-dismiss="alert" class="close">&times;</a>
                            <p>{{ session('message') }}</p>
                        </div>
                    @endif
                    <form action="{{ route('exams.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Exam Title</label>
                                    <input type="text" class="form-control" name="exam_title" required>
                                    <input type="hidden" name="user_id" value="1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Start date</label>
                                    <input type="date" class="form-control" name="exam_start_date" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">End Date</label>
                                    <input type="date" class="form-control" name="exam_end_date" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">School</label>
                                    <select name="school_id" id="" class="form-control" required>
                                        <option value="" selected disabled>Select</option>
                                        @foreach ($schools as $school)
                                            <option value="{{ $school->id }}">{{ $school->school }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Academic Year</label>
                                    <select name="academic_year_id" id="" class="form-control" onchange="getSemester(this.value)" required>
                                        <option value="" selected disabled>Select</option>
                                        @foreach ($years as $year)
                                            <option value="{{ $year->id }}">{{ $year->year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Semester</label>
                                    <select name="semester_id" id="semesters" class="form-control" required>
                                        <option value="" selected disabled>Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
