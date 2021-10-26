@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Students</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Students</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="{{ route('students.index') }}" class="btn add-btn"><i class="fa fa-plus"></i> All
                            Students</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Add Student</h2>
                </div>
                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success">
                            <a href="javascript:void(0)" data-dismiss="alert" class="close">&times;</a>
                            <p>{{ session('message') }}</p>
                        </div>
                    @endif
                    <form action="{{ route('students.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">First Name</label>
                                    <input type="text" name="first_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input type="text" name="last_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">National ID</label>
                                    <input type="text" name="national_id" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">School</label>
                                    <select name="school_id" id="" class="form-control" required>
                                        <option value="" selected disabled>Select</option>
                                        @foreach ($schools as $item)
                                            <option value="{{ $item->id }}">{{ $item->school }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Department</label>
                                    <select name="department_id" id="" class="form-control" required>
                                        <option value="" selected disabled>Select</option>
                                        @foreach ($departments as $item)
                                            <option value="{{ $item->id }}">{{ $item->department }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Course</label>
                                    <select name="course_id" id="" class="form-control" required>
                                        <option value="" selected disabled>Select</option>
                                        @foreach ($courses as $item)
                                            <option value="{{ $item->id }}">{{ $item->course }}</option>
                                        @endforeach
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
