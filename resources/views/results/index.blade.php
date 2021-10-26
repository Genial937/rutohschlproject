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
                        @if ($search === null)
                        <a href="{{ route('results.create') }}" class="btn add-btn"><i class="fa fa-plus"></i> Add
                            Result</a>
                        @else
                        <a href="{{ route('results.index') }}" class="btn add-btn"><i class="fa fa-chevron-left"></i> Back</a>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="card">
                <div class="card-header">
                    @if ($search === null)
                    <form action="{{ route('exams.results') }}" class="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <select name="exam_id" id="" class="form-control">
                                        <option value="" selected disabled>Select Exam</option>
                                        @foreach ($exams as $exam)
                                            <option value="{{ $exam->id }}">{{ $exam->exam_title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </div>                       
                    </form>
                    @else
                        <h2 class="card-title">{{ $exam->exam_title }} results</h2>
                    @endif
                </div>
                @if ($search != null)
                <div class="card-body">
                    <table class="table table-sm table-hover">
                        <thead>
                            <th>Student</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                           @foreach ($results as $result)
                           <tr>
                            <td>{{ $result->students->first_name }} {{ $result->students->last_name }}</td>
                            <td><a href="/single/result/{{ $result->id }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a></td>
                           </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>

    
@endsection
