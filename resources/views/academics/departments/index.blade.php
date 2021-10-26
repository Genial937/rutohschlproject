@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Departments</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Departments</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" data-toggle="modal" data-target="#add" class="btn add-btn"><i class="fa fa-plus"></i> Add Department</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Departments</h2>
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
                            <th>Department</th>
                            <th>School</th>
                            <th>action</th>
                        </thead>
                        <tbody>
                            @php($count = 1)
                           @foreach ($departments as $item)
                           <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $item->department }}</td>
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
                    <form action="{{ route('departments.store') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h3>Add Department</h3>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Department Name</label>
                                <input type="text" name="department" class="form-control" required>
                                <input type="hidden" name="user_id" value="1">
                            </div>
                            <div class="form-group">
                                <label for="">School</label>
                                <select name="school_id" id="" class="form-control">
                                    <option value="" selected disabled>Select</option>
                                    @foreach ($schools  as $school)
                                        <option value="{{ $school->id }}">{{ $school->school }}</option>
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
