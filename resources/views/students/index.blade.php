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
                        <a href="{{ route('students.create') }}" class="btn add-btn"><i class="fa fa-plus"></i> Add Student</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="card">
                <div class="card-header">
                    <h2>All Students</h2>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-hover">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>School</th>
                            <th>Department</th>
                            <th>Course</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @php($count = 1)
                           @foreach ($students as $student)
                           <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->phone }}</td>
                            <td>{{ $student->school }}</td>
                            <td>{{ $student->department }}</td>
                            <td>{{ $student->course }}</td>
                            <td></td>
                        </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
