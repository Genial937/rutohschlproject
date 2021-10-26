@extends('layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Exams</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Exams</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="{{ route('exams.create') }}" class="btn add-btn"><i class="fa fa-plus"></i> Add
                            Exam</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Exams</h2>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-hover">
                        <thead>
                            <th>#</th>
                            <th>Exam Title</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>School</th>
                            <th>Academic Year</th>
                            <th>Semester</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                            @php($count = 1)
                            @foreach ($exams as $exam)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $exam->exam_title }}</td>
                                    <td>{{ date('M d, Y', strtotime($exam->exam_start_date)) }}</td>
                                    <td>{{ date('M d, Y', strtotime($exam->exam_end_date)) }}</td>
                                    <td>{{ $exam->schools->school }}</td>
                                    <td>{{ $exam->years->year }}</td>
                                    <td>{{ $exam->semesters->semester }}</td>
                                    <td>
                                        @if ($exam->status === 'pending')
                                            <a href="#" data-toggle="modal" data-target="#status{{ $exam->id }}"
                                                class="btn btn-primary btn-sm">{{ $exam->status }}</a>
                                        @elseif($exam->status === 'completed')
                                            <a href="#" data-toggle="modal" data-target="#status{{ $exam->id }}"
                                                class="btn btn-success btn-sm">{{ $exam->status }}</a>
                                        @elseif($exam->status === 'postponed')
                                            <a href="#" data-toggle="modal" data-target="#status{{ $exam->id }}"
                                                class="btn btn-info btn-sm">{{ $exam->status }}</a>
                                        @else
                                            <a href="#" data-toggle="modal" data-target="#status{{ $exam->id }}"
                                                class="btn btn-danger btn-sm">{{ $exam->status }}</a>
                                        @endif
                                    </td>

                                    <div class="modal fade" id="status{{ $exam->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{ route('exams.update', $exam->id) }}" method="POST">
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update Status</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="radio" name="status" value="pending"> Pending <br>
                                                        <input type="radio" name="status" value="completed"> Completed <br>
                                                        <input type="radio" name="status" value="postponed"> Postponed <br>
                                                        <input type="radio" name="status" value="cancelled"> Cancelled
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="#" data-dismiss="modal" class="btn btn-danger">Cancel</a>
                                                        <button class="btn btn-success">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
