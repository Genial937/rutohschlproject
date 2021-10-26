@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title"> Parents</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active"> Parents</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="{{ route('parents.create') }}" class="btn add-btn"><i class="fa fa-plus"></i> Add Parent</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="card">
                <div class="card-header">
                    <h2>Parents</h2>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-hover">
                        <thead>
                           
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Student</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            
                            @foreach ($parents as $parent)
                            @php
                                $student = App\Models\User::where('id', $parent->student_id)->first();
                            @endphp
                            <tr>
                                
                                <td><a href="">{{ $parent->first_name }} {{ $parent->last_name }}</a></td>
                                <td>{{ $parent->email }}</td>
                                <td>{{ $parent->phone }}</td>
                                <td><a href="">{{ $student->first_name }} {{ $student->last_name }}</a></td>
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
