@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Academics</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Academics</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="{{ route('curriculum.index') }}" class="btn add-btn"><i class="fa fa-eye"></i> All Academics</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Add Curriculum</h2>
                </div>
                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success">
                        <a href="javascript:void(0)" data-dismiss="alert" class="close">&times;</a>
                        <p>{{ session('message') }}</p>
                    </div>
                    @endif
                    <form action="{{ route('curriculum.store') }}" method="POST">
                        @csrf
                        @livewire('curriculum')
                        <input type="hidden" name="user_id" value="1">
                        <div class="form-group text-right">
                            <button class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
