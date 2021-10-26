@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Units</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Units</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" data-toggle="modal" data-target="#add" class="btn add-btn"><i class="fa fa-plus"></i> Add Unit</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Unit</h2>
                </div>
                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success">
                            <a href="javascript:void(0)" data-dismiss="alert" class="close">&times;</a>
                            <p>{{ session('message') }}</p>
                        </div>
                    @endif
                    <table class="table table-sm table-hover">
                        <thead>
                            <th>#</th>
                            <th>Unit</th>
                            <th>Course</th>
                            <th>Department</th>
                            <th>School</th>
                            <th>action</th>
                        </thead>
                        <tbody>
                            @php($count = 1)
                            @foreach ($units as $item)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $item->unit }}</td>
                                    <td>{{ $item->courses->course }}</td>
                                    <td>{{ $item->departments->department }}</td>
                                    <td>{{ $item->schools->school }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal fade" id="add">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="{{ route('units.store') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h3>Add Unit</h3>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Unit Name</label>
                                <input type="text" name="unit" class="form-control" required>
                                <input type="hidden" name="user_id" value="1">
                            </div>
                            <div class="form-group">
                                <label for="">Course</label>
                                <select name="course_id" id="" class="form-control">
                                    <option value="" selected disabled>Select</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->course }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Department</label>
                                <select name="department_id" id="" class="form-control">
                                    <option value="" selected disabled>Select</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->department }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">School</label>
                                <select name="school_id" id="" class="form-control">
                                    <option value="" selected disabled>Select</option>
                                    @foreach ($schools as $school)
                                        <option value="{{ $school->id }}">{{ $school->school }}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                            <div class="form-group">
                                <label for="">Year</label>
                                <select name="academic_year_id" id="" class="form-control" onchange="getSemester(this.value)">
                                    <option value="" selected disabled>Select</option>
                                    @foreach ($years as $year)
                                        <option value="{{ $year->id }}">{{ $year->year }}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                            <div class="form-group">
                                <label for="">Semester</label>
                                <select name="semester_id" id="semesters" class="form-control">
                                    <option value="" selected disabled>Select</option>
                                    @foreach ($semesters as $semester)
                                        <option value="{{ $semester->id }}">{{ $semester->semester }}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" data-dismiss="modal" class="btn btn-danger">Cancel</a>
                            <button class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
