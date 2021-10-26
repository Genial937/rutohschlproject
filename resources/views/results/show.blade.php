@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Results</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Results</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="{{ route('results.index') }}" class="btn add-btn"><i class="fa fa-plus"></i>  Back</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header text-center">
                            <div class="row">
                                <div class="col-md-8">
                                    <h2 class="card-title">{{ $result->exams->exam_title }}</h2>
                                </div>
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-primary" onclick="sendResult({{ $result->id }})">Send Result to Student</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-success" id="message">
                                <a href="#" data-dismiss="alert" class="close">&times;</a>
                                <p>Results have been send as SMS!</p>
                            </div>
                            <table class="table table-sm table-hover">
                                <thead class="bg-primary text-white text-center">
                                    <tr >
                                        <th colspan="2">{{ $result->students->first_name }} {{ $result->students->last_name }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Unit</th>
                                        <th>Marks</th>
                                    </tr>
                                   @foreach ($result->results as $mark)
                                    @php
                                        $unit_name = App\Models\Unit::where('id', $mark->unit_id)->first();
                                    @endphp
                                   <tr>
                                    <td>{{ $unit_name->unit }}</td>
                                    <td>{{ $mark->marks }}</td>
                                </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        #message{
            display: none;
        }
    </style>
@endsection
