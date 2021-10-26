@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">System Admins</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">System Admin</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="{{ route('admin.create') }}" class="btn add-btn"><i class="fa fa-plus"></i> Add Admin</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Admins</h2>
                </div>
                <div class="card-body">
                   <table class="table table-sm table-hover">
                       <thead>
                           <th>#</th>
                           <th>Name</th>
                           <th>Phone</th>
                           <th>Email</th>
                           <th>Role</th>
                           <th>Action</th>
                       </thead>
                       <tbody>
                           @php($count = 1)
                           @foreach ($admins as $admin)
                               <tr>
                                   <td>{{ $count++ }}</td>
                                   <td>{{ $admin->first_name }} {{ $admin->last_name }}</td>
                                   <td>{{ $admin->phone }}</td>
                                   <td>{{ $admin->email }}</td>
                                   <td>{{ $admin->role }}</td>
                                   <td>
                                       <a href="" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                                       <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
                                   </td>
                               </tr>
                           @endforeach
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
@endsection
