@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Curriculum</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Curriculum</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="{{ route('curriculum.create') }}" class="btn add-btn"><i class="fa fa-plus"></i> Create Curriculum</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">School Curriculum</h2>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-hover">
                        <thead>
                            <th>#</th>
                            <th>Year</th>
                            <th>Semesters</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @php($count = 1)
                            @foreach ($years as $year)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $year->year }}</td>
                                    <td>
                                        <ul>
                                            @foreach ($year->semesters as $item)
                                                <li>{{ $item->semester }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
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
