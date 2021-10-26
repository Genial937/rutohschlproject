@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Roles</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Roles</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#add" class="btn add-btn"><i class="fa fa-plus"></i> Add Role</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Roles</h2>
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
                            <th>Role</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @php($count = 1)
                            @foreach ($roles as $item)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $item->name }}</td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="modal fade" id="add">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="{{ route('roles.store') }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h3>Add Role</h3>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Role Name</label>
                                    <input type="text" name="name" class="form-control" required>
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
    </div>
@endsection
